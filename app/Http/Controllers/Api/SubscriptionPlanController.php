<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;

class SubscriptionPlanController extends Controller
{
    public function index(Request $request)
    {
        $plans = Plan::active()->paginate(10); // Fetch active plans with pagination

        return response()->json([
            'success' => true,
            'data' => $plans,
        ], 200);
    }
        public function store(Request $request)
        {
            $validated = $request->validate([
                'plan_id' => 'required|exists:plans,id',
            ]);
    
            $plan = Plan::active()->find($validated['plan_id']);
    
            if (!$plan) {
                return response()->json(['success' => false, 'message' => 'Invalid or inactive plan'], 404);
            }
    
            $startDate = Carbon::now();
            $endDate = $startDate->copy()->addMonths($plan->duration_months);
    
            $subscription = Subscription::create([
                'user_id' => Auth::id(),
                'plan_id' => $plan->id,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'status' => 'active',
            ]);
    
            return response()->json([
                'success' => true,
                'message' => 'Subscription created successfully',
                'data' => $subscription,
            ], 201);
        }


        public function cancel($id)
        {
            $subscription = Subscription::where('id', $id)
                ->where('user_id', Auth::id())
                ->where('status', 'active')
                ->first();

            if (!$subscription) {
                return response()->json(['success' => false, 'message' => 'Active subscription not found'], 404);
            }

            $subscription->cancel();

            return response()->json([
                'success' => true,
                'message' => 'Subscription canceled successfully',
                'data' => $subscription,
            ], 200);
        }

        public function list(Request $request)
        {
            $subscriptions = Subscription::where('user_id', $request->user()->id)
                ->with('plan') // Assuming a relationship with the Plan model
                ->orderBy('created_at', 'desc')
                ->paginate(10);

            return response()->json([
                'success' => true,
                'message' => 'User subscriptions fetched successfully',
                'data' => $subscriptions,
            ], 200);
        }

}