<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi input termasuk domain email
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required', 
                'string', 
                'lowercase', 
                'email', 
                'max:255', 
                'regex:/^[a-zA-Z0-9._%+-]+@student\.umn\.ac\.id$/', 
                'unique:' . User::class
            ],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [
            'email.regex' => 'The email must belong to the domain @student.umn.ac.id.',
        ]);

        // Membuat pengguna baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Memicu event Registered
        event(new Registered($user));

        // Kirim email konfirmasi
        Mail::raw(
            'Congratulations! You have successfully registered with your UMN student email.',
            function ($message) use ($user) {
                $message->to($user->email)
                        ->subject('Registration Successful');
            }
        );

        // Login otomatis setelah registrasi
        Auth::login($user);

        // Redirect ke dashboard
        return redirect(route('dashboard', absolute: false));
    }
}