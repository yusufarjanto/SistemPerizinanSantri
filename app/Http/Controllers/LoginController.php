<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect('/');
        }else{
            return view('login');
        }
    }
    public function action_login(Request $request)
    {
        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
            return redirect('/');

        }else{
            session::flash('error', 'MAKANYA MASUKIN YANG BENARRR!!! (╯°□°）╯︵ ┻━┻');
            return redirect('login');
        }
        
    }
    public function action_logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
