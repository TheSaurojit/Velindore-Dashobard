<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allCategory()
    {
        $categories = Category::all();
        return view('pages.categories.all-categories', compact('categories'));
    }

    public function categoryCreateView()
    {
        return view('pages.categories.create-category');
    }

    public function categoryCreate(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
        ]);

        Category::create($data);

        return redirect()->route('category.all')->with('success', 'Category created successfully.');
    }

    public function updateView(Category $category)
    {
        return view('pages.categories.update-category', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required|string',
        ]);

        $category->update($data);
        
        return redirect()->route('category.all')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.all')->with('success', 'Category deleted successfully.');
    }
}
