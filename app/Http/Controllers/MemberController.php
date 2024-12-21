<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

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

    public function show(string $id)
    {
        $member = Member::findOrFail($id);
        return view('members.show', compact('member'));
    }

    public function edit(string $id)
    {
        $member = Member::findOrFail($id);
        return view('members.edit', compact('member'));
    }

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

    public function destroy(string $id)
    {
        $member = Member::findOrFail($id);
        $member->delete();
        return redirect()->route('members.index')->with('status', 'Member deleted successfully.');
    }
}
