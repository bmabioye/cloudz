<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Coupon;

class AdminPlanController extends Controller
{
    public function index()
    {
        $plans = Plan::paginate(10);
        // $plans = Plan::active()->paginate(10);
        return view('admin.plans.index', compact('plans'));
    }

    public function create()
    {
        $coupons = Coupon::all(); // Retrieve all coupons
        return view('admin.plans.create', compact('coupons'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'duration_months' => 'required|integer|min:1',
            'features' => 'nullable|string', // Accept as string temporarily
            'coupon_id' => 'nullable|exists:coupons,id',

        ]);

         // Convert the comma-separated string to an array
        $validated['features'] = $request->input('features') 
        ? explode(',', $request->input('features')) 
        : [];

        Plan::create($validated);

        return redirect()->route('admin.plans.index')->with('success', 'Plan added successfully!');
    }

    public function edit(Plan $plan)
    {
        $coupons = Coupon::all(); // Retrieve all coupons
        return view('admin.plans.edit', compact('plan', 'coupons'));
    }

    public function update(Request $request, Plan $plan)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'duration_months' => 'required|integer|min:1',
            'features' => 'nullable|string', // Accept as string temporarily
            'coupon_id' => 'nullable|exists:coupons,id',
        ]);

        $validated['features'] = $request->input('features') 
        ? explode(',', $request->input('features')) 
        : [];

        $plan->update($validated);

        return redirect()->route('admin.plans.index')->with('success', 'Plan updated successfully!');
    }

    public function destroy(Plan $plan)
    {
        $plan->update(['status' => Plan::STATUS_DISABLED]);
        // $plan->delete();
        return redirect()->route('admin.plans.index')->with('success', 'Plan Softly deleted successfully!');
    }

    public function enable(Plan $plan)
    {
        $plan->update(['status' => Plan::STATUS_ACTIVE]);

        return redirect()->route('admin.plans.index')->with('success', 'Plan enabled successfully!');
    }

    public function toggleStatus(Plan $plan)
    {
        $plan->status = $plan->status === 'active' ? 'disabled' : 'active';
        $plan->save();

        return redirect()->route('admin.plans.index')->with('success', 'Plan status updated successfully!');
    }
}
