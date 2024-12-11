<?php

namespace App\Http\Controllers;

use App\Models\OrganizationMember;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function index()
    {
        $members = OrganizationMember::all();
        return view('organization.index', compact('members'));
    }

    public function create()
    {
        return view('organization.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'department' => 'required',
            'image' => 'required|image',
        ]);

        $imagePath = $request->file('image')->store('public/images');

        OrganizationMember::create([
            'name' => $validated['name'],
            'position' => $validated['position'],
            'department' => $validated['department'],
            'image' => $imagePath,
        ]);

        return redirect()->route('organization.index');
    }
}
