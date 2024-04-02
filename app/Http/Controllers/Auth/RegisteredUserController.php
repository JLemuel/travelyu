<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        // dd($request->all()); // Dump the request data and die

        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'contact_number' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'in:tourist,travel_agency'],
            'agency_name' => ['nullable', 'string', 'max:255', 'required_if:type,==,travel_agency'],
            'establishment_date' => ['nullable', 'date', 'required_if:type,==,travel_agency'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'file' => ['file', 'mimes:jpg,jpeg,png,pdf,doc,docx', 'max:2048'],
        ]);

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('public/documents');
        }

        $fullName = $request->first_name . ' ' . $request->last_name; // Concatenate first name and last name

        $user = User::create([
            'first_name' => $request->type === 'tourist' ? $request->first_name : null,
            'name' => $fullName,
            'last_name' => $request->type === 'tourist' ? $request->last_name : null,
            'agency_name' => $request->type === 'travel_agency' ? $request->agency_name : null,
            'email' => $request->email,
            'contact_number' => $request->contact_number,
            'type' => $request->type,
            'file_path' => $filePath ?? null,
            'establishment_date' => $request->type === 'travel_agency' ? $request->establishment_date : null,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);


        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
