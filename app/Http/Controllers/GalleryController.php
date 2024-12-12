<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $category = null;

        if ($request->has('category')) {
            $categorySlug = $request->query('category');
            $category = Category::where('slug', $categorySlug)->firstOrFail();
            $galleries = Gallery::where('category_id', $category->id)->get();
        } else {
            $galleries = Gallery::all();
        }

        return view('pages.galleries.index', [
            'title' => 'Gallery',
            'notification' => Contact::where('status', 'Pending')->get(),
            'pendings' => Contact::where('status', 'Pending')->get(),
            'galleries' => $galleries,
            'categories' => Category::all(),
            'currentCategory' => $category
        ]);
    }

    public function create()
    {
        return view('pages.galleries.create', [
            'title' => 'Create Gallery',
            'notification' => Contact::where('status', 'Pending')->get(),
            'pendings' => Contact::where('status', 'Pending')->get(),
            'categories' => Category::all()
        ]);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();

            // Get the category name
            $category = Category::find($request->category_id);
            $categoryName = $category->name;

            // Define the storage path
            $storagePath = 'public/uploads/' . $categoryName;

            // Store the file in the storage folder with the category name
            $filePath = $file->storeAs($storagePath, $filename);

            // Remove 'public/' from the file path for storing in the database
            $dbPath = str_replace('public/', 'storage/', $filePath);

            Gallery::create([
                'user_id' => $request->user_id,
                'category_id' => $request->category_id,
                'title' => $request->title,
                'path' => $dbPath,
            ]);
        }

        return redirect()->route('gallery.index')->with('status', 'Images uploaded successfully');
    }

    public function user_show(Category $category)
    {
        $previousCategory = Category::where('id', '<', $category->id)->orderBy('id', 'desc')->first();
        $nextCategory = Category::where('id', '>', $category->id)->orderBy('id', 'asc')->first();

        return view('pages.galleries.user_show', [
            'title' => $category->name,
            'notification' => Contact::where('status', 'Pending')->get(),
            'pendings' => Contact::where('status', 'Pending')->get(),
            'galleries' => $category->galleries,
            'categories' => Category::all(),
            'currentCategory' => $category,
            'previousCategory' => $previousCategory,
            'nextCategory' => $nextCategory,
        ]); 
    }


    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();

        return redirect()->back()->with('status', 'Image deleted successfully');
    }

    public function user_index()
    {
        return view('pages.galleries.user_index', [
            'title' => 'Gallery',
            // 'galleries' => Gallery::where('user_id', Auth::id())->get(),
            'categories' => Category::all()
        ]);
    }
}