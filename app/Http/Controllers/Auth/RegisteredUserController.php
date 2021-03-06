<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'forename' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],     
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'username' => $request->username,
            'forename' => $request->forename,
            'surname' => $request->surname,
            'email' => $request->email, 
            'password' => Hash::make($request->password),
        ]);
        $user->attachRole($request->role_id);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }


    public function delete(User $user){
        
        $user->delete();

        return redirect('dashboard/manageusers');
    }

    public function edit(User $user){

        return view('auth.edit', compact('user'));
    }

    public function update(User $user){

        $data = request()->validate([
             'Username' => 'required|max:255',
             'Forename' => 'required|max:255',
             'Surname' => 'required|max:255',
             'Email' => 'required|max:255',
         ]);

        $user->update([
             'username' => $data['Username'],
             'forename' => $data['Forename'],
             'surname' => $data['Surname'],
             'email' => $data['Email'],       
         ]);
        
        return redirect('dashboard/manageusers');
    }

    public function changePassword(){
        return view('auth.change-password');
    }

    public function updatePassword(){

        $user = Auth::user();
      
        $data = request()->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user->update([
            'password' => Hash::make(request()->password),
        ]);

        return redirect('dashboard');
    }

    
}
