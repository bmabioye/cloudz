<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resource;
use App\Models\Category;
use App\Models\Purchase;

class ResourceController extends Controller
{

        public function index()
        {

            $categories = Category::all(); // Fetch all resources categories
            $resources = resource::all(); // Fetch all resources categories
        
            return view('fastcert.resources', compact('categories', 'resources'));
        } 

        public function fetchResources(Request $request)
        {
        $query = Resource::query()->where('status', 'active');

        // Search by title
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Filter by category
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Filter by access (premium or free)
        if ($request->filled('access')) {
            $query->where('is_premium', $request->access === 'premium');
        }

        // Sort results
        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'popularity':
                    $query->orderBy('views', 'desc');
                    break;
                case 'date':
                    $query->orderBy('created_at', 'desc');
                    break;
                default:
                    $query->orderBy('title');
            }
        }

        // Paginate the results
        $resources = $query->paginate(12);

        return response()->json($resources);
    }

    // public function show($id)
    // {
    //     $resource = Resource::findOrFail($id);

    //     if ($resource->is_premium && !auth()->user()->hasAccessTo($resource)) {
    //         return response()->json(['message' => 'You need to purchase or subscribe to access this resource'], 403);
    //     }

    //     return response()->json($resource);
    // }

    public function show($id)
    {
        $resource = Resource::with('category')->findOrFail($id);

        if (!$resource->status) {
            abort(404, 'Resource not found');
        }

        $isPremium = $resource->is_premium;
        $userHasAccess = false;

        if ($isPremium) {
            $user = auth()->user();
            if ($user) {
                // Check if the user has purchased or subscribed
                $userHasAccess = $user->subscriptions()->exists() || 
                                $user->purchases()->where('resource_id', $id)->exists();
            }
        }

        return view('fastcert.show', compact('resource', 'isPremium', 'userHasAccess'));
    }

    public function showPurchasePage($id)
    {
        $resource = Resource::findOrFail($id);
        
        if (!$resource->is_premium) {
            return redirect()->route('fastcert.resources')->with('error', 'This resource is free.');
        }

        return view('fastcert.purchase', compact('resource'));
    }




    public function processPurchase($id)
    {
        $resource = Resource::findOrFail($id);
        
        if (!$resource->is_premium) {
            return redirect()->route('fastcert.resources')->with('error', 'This resource is free.');
        }

        // Logic to handle the purchase (e.g., deduct user credits, store purchase record)

        return redirect()->route('fastcert.resources')->with('success', 'Purchase successful! You now have access to this resource.');
    }


    public function addToCart(Request $request, $id)
    {
        $resource = Resource::findOrFail($id);

        // Retrieve the cart from the session or create a new one
        $cart = session()->get('cart', []);

        // Check if the resource is already in the cart
        if (isset($cart[$id])) {
            return redirect()->back()->with('info', 'This resource is already in your cart.');
        }

        // Add the resource to the cart
        $cart[$id] = [
            'title' => $resource->title,
            'price' => $resource->price,
            'is_premium' => $resource->is_premium,
        ];

        // Save the cart back to the session
        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Resource added to cart successfully!');
    }

    public function viewCart()
    {
        $cart = session()->get('cart', []);

        $total = collect($cart)->sum('price');

        return view('cart.index', compact('cart', 'total'));
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Resource removed from cart!');
    }

    public function getPurchasedResources(Request $request)
    {
        $user = $request->user();
    
        $resources = Purchase::with('resource')
            ->where('user_id', $user->id)
            ->get()
            ->map(function ($purchase) {
                return [
                    'resource_id' => $purchase->resource->id,
                    'title' => $purchase->resource->title,
                    'description' => $purchase->resource->description,
                    'price_paid' => $purchase->price_paid,
                    'download_link' => url('/resources/' . $purchase->resource->id . '/download'),
                ];
            });
    
        if ($resources->isEmpty()) {
            return response()->json([], 200); // Return an empty array
        }
    
        return response()->json($resources, 200);
    }    

}