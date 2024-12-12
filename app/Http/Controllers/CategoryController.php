<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Contact;

class CategoryController extends Controller
{
    public function index()
    {
        return view('pages.category.index', [
            'title' => 'Categories',
            'notification' => Contact::where('status', 'Pending')->get(),
            'pendings' => Contact::where('status', 'Pending')->get(),
            'categories' => Category::paginate(10)
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name'
        ]);

        Category::create($request->all());

        return redirect()->route('category.index')->with('status', 'New category has been added!');
    }

    public function edit(Category $category)
    {
        
        return view('pages.category.edit', [
            'title' => $category->name,
            'notification' => Contact::where('status', 'Pending')->get(),
            'pendings' => Contact::where('status', 'Pending')->get(),
            'category' => $category
        ]);
    }

    public function update(Request $request, Category $category)
{
    $request->validate([
        'name' => 'required|string|max:255|unique:categories,name,' . $category->id
    ]);

    $category->name = $request->input('name');
    $category->slug = Str::slug($request->input('name'));
    $category->save();

    return redirect()->route('category.index')->with('status', $category->name . ' has been updated!');
}


    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index')->with('status', $category->name . ' has been deleted!');
    }
}