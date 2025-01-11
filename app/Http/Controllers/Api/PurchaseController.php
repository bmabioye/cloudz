<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Resource;


class PurchaseController extends Controller
{
    // List all purchases for the authenticated user
    public function list(Request $request)
    {
        $purchases = Purchase::where('user_id', $request->user()->id)
            ->with('resource') // Assuming a relationship with the Resource model
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return response()->json([
            'success' => true,
            'message' => 'User purchases fetched successfully',
            'data' => $purchases,
        ], 200);
    }

    // Show details of a specific purchase
    public function show(Request $request, $id)
    {
        $purchase = Purchase::where('id', $id)
            ->where('user_id', $request->user()->id)
            ->with('resource') // Assuming a relationship with the Resource model
            ->first();

        if (!$purchase) {
            return response()->json([
                'success' => false,
                'message' => 'Purchase not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Purchase details fetched successfully',
            'data' => $purchase,
        ], 200);
    }
}
