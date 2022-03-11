<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Hash;
use Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $rules = array(
            'email' => 'required|string|email',
            'password'  => 'required|string|min:8',
        );       
        $cek = Validator::make($request->all(),$rules);
        if ($cek->fails()) {
            $errorString = implode(",",$cek->messages()->all());
            return redirect()->route('login')->with('warning',$errorString);
        }else {
            if (Auth::attempt($request->only('email','password'))) {
                $user = User::where('email',$request->email)->first();
                $roles = $user->getRoleNames();
                if ($roles[0] == 'admin') {
                    return redirect()->route('dashboard');
                }else {
                    return redirect()->route('index');
                }
            }else {
                return redirect()->route('login')->with('warning',"Email/Password Salah");
            }
        }
    }


    public function Register(Request $request)
    {
        $rules = array(
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        );
    
        $cek= Validator::make($request->all(),$rules);
            if ($cek->fails()) {
                $errorString = implode(",",$cek->messages()->all());
                return redirect()->route('register')->with('warning',$errorString);
            } else {
                // creating user from register
                $user = User::create([
                    'name' => $request->name,
                    'password' => bcrypt($request ->password),
                    'email' => $request->email,
                ]);

                $user->assignRole('user');
                $role = 'user';

                if (Auth::attempt($request->only('email','password'))) {
                // Langsung direct ke login agar sekaligus two authentication
                    return redirect()->route('login');
                }else {
                    return redirect()->route('register')->with('warning','ada kesalahan');
                }
            }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('primary','anda sudah logout');
    }
}
