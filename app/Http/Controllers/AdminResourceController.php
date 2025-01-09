<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resource;
use App\Models\Category;

class AdminResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::with('category')->paginate(10);
        return view('admin.resources.index', compact('resources'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.resources.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'file' => 'required|file',
            'category_id' => 'required|exists:categories,id',
        ]);

        $filePath = $request->file('file')->store('resources');

        Resource::create(array_merge($validated, ['file_path' => $filePath]));

        return redirect()->route('resources.index')->with('success', 'Resource added successfully!');
    }

    public function edit(Resource $resource)
    {
        $categories = Category::all();
        return view('admin.resources.edit', compact('resource', 'categories'));
    }

    public function update(Request $request, Resource $resource)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('resources');
            $resource->update(array_merge($validated, ['file_path' => $filePath]));
        } else {
            $resource->update($validated);
        }

        return redirect()->route('resources.index')->with('success', 'Resource updated successfully!');
    }

    public function destroy(Resource $resource)
    {
        $resource->delete();
        return redirect()->route('resources.index')->with('success', 'Resource deleted successfully!');
    }
}
