<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;


class SubscriptionController extends Controller
{
    public function index()
    {
        // Fetch all active subscription plans
        $plans = Plan::where('status', 'active')->get();
        // $plans = Plan::all(); 

        return view('fastcert.subscription', compact('plans'));
    }

    public function subscribe($id)
    {
        $plan = Plan::findOrFail($id);

        if (!$plan->status) {
            abort(404, 'Plan not available');
        }

        // Handle subscription logic (e.g., save to database, payment processing)
        // Example: Simulate subscription
        auth()->user()->subscriptions()->create([
            'plan_id' => $plan->id,
            'started_at' => now(),
            'expires_at' => now()->addMonths($plan->duration_months),
        ]);

        return redirect()->route('fastcert.subscription')->with('success', 'Successfully subscribed to ' . $plan->name);
    }

}
