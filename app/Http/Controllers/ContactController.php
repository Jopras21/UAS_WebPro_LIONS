<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('contact.index', [
            'title' => 'Contact'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contact.create', [
            'title' => 'Contact'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        Contact::create($request->all());
        return redirect()->route('contact.index')->with('status', 'Your message has been sent successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $contacts = Contact::orderByDesc('updated_at')->paginate(10);
        return view('contact.show', [
            'title' => 'Contact List',
            'contacts' => $contacts,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contact = Contact::findOrFail($id);
        return view('contact.edit', [
            'contact' => $contact,
            'title' => 'Edit Contact',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $contact = Contact::findOrFail($id);
        $contact->update($request->all());

        return redirect()->route('contact.show')->with('status', 'Contact has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('contact.show')->with('status', 'Contact has been deleted successfully.');
    }

    public function confirm() 
    {
        return view('contact.confirm', [
            'title' => 'Confirm Contact'
        ]);
    }
}