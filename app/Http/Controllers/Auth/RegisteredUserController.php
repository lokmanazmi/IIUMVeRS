<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Applicant;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'type' => 'required|string|max:255',
            'phoneno' => 'required|string|max:255',
        ]);

        Auth::login($user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => $request->type,
            'phoneno' => $request->phoneno,
        ]));
        $user->attachRole($request->role_id); 
        event(new Registered($user));

        if(Auth::user()->hasRole('user')){

      $name = Auth::user()->name;
      $user = Auth::user()->username;
      $email = Auth::user()->email;
      $type = Auth::user()->type;
      $phoneno = Auth::user()->phoneno;

      $applicants = new Applicant([
         'name' =>($name),
         'username' =>($user),
         'email' =>($email),
         'type' =>($type),
         'phoneno' =>($phoneno),
         'status'=>('Pending')
      ]);


         
      $applicants->save();
        }
        elseif(Auth::user()->hasRole('admin')){

            $name = Auth::user()->name;
            $user = Auth::user()->username;
            $email = Auth::user()->email;
            $type = Auth::user()->type;
            $phoneno = Auth::user()->phoneno;

            $admins = new Admin([
                'name' =>($name),
                'username' =>($user),
                'email' =>($email),
                'type' =>($type),
                'phoneno' =>($phoneno),
             ]);
       
       
                
             $admins->save();
        }

        return redirect(RouteServiceProvider::HOME);
    }
}