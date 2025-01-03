<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Member;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    // Display all members
    public function index()
    {
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    // Show the form for creating a new member
    public function create()
    {
        return view('members.create');
    }

    // Store a newly created member
    public function store(Request $request)
    {
        $path = $request->file('photo')->storePublicly('photos', 'public');

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'angkatan' => 'required|string|max:15',
            'jurusan' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $member = new Member();
        $member->full_name = $validated['full_name'];
        $member->role = $validated['role'];
        $member->angkatan = $validated['angkatan'];
        $member->jurusan = $validated['jurusan'];
        $member->photo = $path;
        $member->save();

        return redirect()->route('members.index')->with('status', 'Member added successfully.');
    }

    // Display the member's details
    public function show(string $id)
    {
        $member = Member::findOrFail($id);
        return view('members.show', compact('member'));
    }

    // Show the form to edit a member
    public function edit(string $id)
    {
        $member = Member::findOrFail($id);
        return view('members.edit', compact('member'));
    }

    // Update a member's details
    public function update(Request $request, string $id)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'angkatan' => 'required|string|max:15',
            'jurusan' => 'required|string|max:255',
        ]);

        $member = Member::findOrFail($id);
        $member->update($request->all());
        return redirect()->route('members.index');
    }

    // Delete a member
    public function destroy(string $id)
    {
        $member = Member::findOrFail($id);
        $member->delete();
        return redirect()->route('members.index')->with('status', 'Member deleted successfully.');
    }

    // Show profile only for approved members
    public function showProfile()
    {
        $user = Auth::user();
        if ($user->status == 'approved') {
            return view('member.profile', compact('user'));
        } else {
            return redirect()->route('login')->with('error', 'You need to be approved first.');
        }
    }
}
