<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories|max:255',
            'description' => 'nullable',
        ]);

        $category = Category::create($validatedData);

        return redirect()->route('admin.categories')
            ->with('Успех', 'Категория создана');
    }

    public function edit(Category $category)
    {
        return view('admin.categories', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id . '|max:255',
            'description' => 'nullable',
        ]);

        $category->update($validatedData);

        return redirect()->route('admin.categories')
            ->with('Успех', 'Категория изменена');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories')
            ->with('Успех', 'Категория удалена');
    }
}

