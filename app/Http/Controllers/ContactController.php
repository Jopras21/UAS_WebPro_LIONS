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
            'nim' => 'required',
            'type' => 'required',
            'phone' => 'required',
            'line' => 'required',
            'organization' => 'required',
            'title' => 'required',
            'event_name' => 'required',
            'description' => 'required',
            'date' => 'required|date|after:today',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'location' => 'required',
            'person' => 'required|integer|min:0',   
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        Contact::create($request->all());
        return redirect()->route('contact.index')->with('status', 'Pengajuan telah diterima, harap segera konfirmasi ke LINE kami. Terima kasih.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $onprogresses = Contact::where('status', 'On Progress')->orderByDesc('updated_at')->paginate(10);
        $pendings = Contact::where('status', 'Pending')->orderByDesc('updated_at')->paginate(10);
        $completeds = Contact::where('status', 'Completed')->orderByDesc('updated_at')->paginate(10);
        $canceleds = Contact::where('status', 'Canceled')->orderByDesc('updated_at')->paginate(10);

        return view('contact.show', [
            'title' => 'Services',
            'notification' => Contact::where('status', 'Pending')->get(),
            'pendings' => $pendings,
            'onprogresses' => $onprogresses,
            'canceleds' => $canceleds,
            'completeds' => $completeds,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('contact.edit', [
            'contact' => Contact::findOrFail($id),
            'title' => Contact::findOrFail($id)->event_name,
            'notification' => Contact::where('status', 'Pending')->get(),
            'pendings' => Contact::where('status', 'Pending')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'nim' => 'required',
            'type' => 'required',
            'phone' => 'required',
            'line' => 'required',
            'organization' => 'required',
            'title' => 'required',
            'event_name' => 'required',
            'description' => 'required',
            'date' => 'required|date|after:today',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'location' => 'required',
            'person' => 'required|integer|min:0',   
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $contact = Contact::findOrFail($id);
        $contact->update($request->all());

        return redirect()->route('contact.show', $contact->id)->with('status', $contact->event_name . ' has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function confirm() 
    {
        return view('contact.confirm', [
            'title' => 'Contact'
        ]);
    }

    /**
     * Display the contact us page.
     */
    public function contactUs()
    {
        return view('contact.us', [
            'title' => 'Contact Us',
            'instagram' => 'https://instagram.com/your_account', // Ganti dengan akun Instagram Anda
            'phone' => '+1234567890' // Ganti dengan nomor telepon Anda
        ]);
    }
}