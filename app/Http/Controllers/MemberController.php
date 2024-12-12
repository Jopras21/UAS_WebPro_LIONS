<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();

        return view('members.index', ['members' => $members]);
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'joined_at' => 'required|date',
        ]);

        Member::create($validated);

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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email,' . $id,
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'joined_at' => 'required|date',
        ]);

        $member = Member::findOrFail($id);
        $member->update($request->all());

        return redirect()->route('members.index')->with('status', 'Member updated successfully.');
    }

    public function destroy(string $id)
    {
        $member = Member::findOrFail($id);
        $member->delete();
        return redirect()->route('members.index')->with('status', 'Member deleted successfully.');
    }
}
