<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\User;
use App\Models\Subscription;

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
        // auth()->user()->subscriptions()->create([
        //     'plan_id' => $plan->id,
        //     'started_at' => now(),
        //     'expires_at' => now()->addMonths($plan->duration_months),
        // ]);

        Subscription::create([
            'user_id' => auth()->id(),
            'plan_id' => $plan->id,
            'start_date' => now(),
            'end_date' => now()->addMonths($plan->duration_months),
        ]);

        return redirect()->route('fastcert.resources')->with('success', 'Successfully subscribed to ' . $plan->name);
    }

    public function getActiveSubscription(Request $request)
    {
        $user = $request->user(); // Get the authenticated user

        $subscription = Subscription::with('plan')
            ->where('user_id', $user->id)
            ->where('status', 'active')
            ->first();

        if (!$subscription) {
            return response()->json(['message' => 'No active subscription'], 404);
        }

        return response()->json([
            'plan_name' => $subscription->plan->name,
            'features' => json_decode($subscription->plan->features, true),
            'price' => $subscription->plan->price,
            'end_date' => $subscription->end_date,
        ], 200);
    }

}
