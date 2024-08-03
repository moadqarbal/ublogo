<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.signup');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'firstname' => [
                'required',
                'string',
                'max:255'
            ],
            'lastname' => [
                'required',
                'string',
                'max:255'
            ],
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users', 'username')
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')
            ],
            'website' => [
                'nullable',
                'url',
                'max:255'
            ],
            'password' => [
                'required',
                'min:3',
                'confirmed'
            ]
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        auth()->login($user);

        return redirect('/')->with(['notification_title' => 'Sign In', 'success_message' => 'User Created and logged in successfully!']);
    }


    public function logout(Request $request){

        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with(['notification_title' => 'Sign Out', 'success_message' => 'you have been logged out.']);
    }

        /**
     * Show the form for creating a new resource.
     */
    public function signin()
    {
        return view('users.signin');
    }

    
    public function authenticate(Request $request)
    {
        // Validate the request
        $formFields = $request->validate([
            'email_or_username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Determine if the input is an email or username
        $field = filter_var($formFields['email_or_username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // Find the user based on email or username
        $user = User::where($field, $formFields['email_or_username'])->first();

        if ($user && Hash::check($formFields['password'], $user->password)) {
            // Authenticate the user
            Auth::login($user);
            $request->session()->regenerate();

            return redirect('/')->with(['notification_title' => 'Sign in', 'success_message' => 'You are now connected.']);
        }

        // If authentication fails
        return back()->withErrors([
            'email_or_username' => 'Invalid credentials',
        ])->onlyInput('email_or_username');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}