<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $events = Calendar::all()->map(function ($event) {
            return [
                'start' => Carbon::parse($event->start)->format('Y-m-d H:i:s'),
                'end' => Carbon::parse($event->end)->format('Y-m-d H:i:s'),
                'title' => $event->title,
                'description' => $event->description,
            ];
        });

        return view('calendars.calendar', ['events' => $events]);
    }

    public function create()
    {
        return view('calendars.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'start' => 'required|date',
            'end' => 'required|date|after:start',
            'title' => 'required',
            'description' => 'required',
        ]);

        $event = new Calendar();
        $event->start = Carbon::parse($validated['start'])->format('Y-m-d H:i:s');
        $event->end = Carbon::parse($validated['end'])->format('Y-m-d H:i:s');
        $event->title = $validated['title'];
        $event->description = $validated['description'];
        $event->save();

        return redirect()->route('calendars.index');
    }

    public function show(string $id)
    {
        $event = Calendar::findOrFail($id);
        return view('calendars.show', compact('event'));
    }

    public function edit(string $id)
    {
        $event = Calendar::findOrFail($id);
        return view('calendars.edit', compact('event'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'start' => 'required|date',
            'end' => 'required|date|after:start',
        ]);

        $event = Calendar::findOrFail($id);
        $event->update($request->all());
        return redirect()->route('calendars.index');
    }

    public function destroy(string $id)
    {
        $event = Calendar::findOrFail($id);
        $event->delete();
        return redirect()->route('calendars.index');
    }
}
