<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use App\Mail\Verifikasi;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class SignupController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'born_place' => 'required',
            'born_date' => 'required',
        ]);

        $user = User::create([
            'name'=> $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password'))
        ]);

        $user->Profile = Profile::create([
            'user_id' => $user->id,
            'born_place' => $request->get('born_place'),
            'born_date' => $request->get('born_date')
        ]);
      
        return redirect('/home');
    }
}
