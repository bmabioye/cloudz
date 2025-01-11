<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resource;

class UserResourceController extends Controller
{
    public function index(Request $request)
    {
        // $resources = Resource::where('status', 'active')
        //     ->paginate(10); // Adjust pagination limit as needed

        // return response()->json($resources, 200);

        $resources = Resource::active()->paginate(10);

        return response()->json([
            'data' => $resources,
        ], 200);
    }

    public function show($id)
    {
        $resource = Resource::active()->findOrFail($id);

        if (!$resource) {
            return response()->json(['error' => 'Resource not found.'], 404);
        }
        
        // Check user access
        if ($resource->is_premium && !auth()->user()->hasAccessToResource($resource)) {
            return response()->json([
                'error' => 'Unauthorized access to premium resource.'
            ], 403);
        }

        return response()->json([
            'data' => $resource,
        ], 200);
    }

    public function getPurchasedResources(Request $request)
    {
        $user = $request->user(); // Get the authenticated user

        $resources = Purchase::with('resource')
            ->where('user_id', $user->id)
            ->get()
            ->map(function ($purchase) {
                return [
                    'id' => $purchase->resource->id,
                    'title' => $purchase->resource->title,
                    'description' => $purchase->resource->description,
                    'price_paid' => $purchase->price_paid,
                    'download_link' => url('/resources/' . $purchase->resource->id . '/download'),
                ];
            });

        return response()->json($resources, 200);
    }

}
