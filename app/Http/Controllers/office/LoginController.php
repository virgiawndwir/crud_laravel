<?php

namespace App\Http\Controllers\office;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index(){
        return view('office.auth.login');
    }

    public function login(Request $request){
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // The user is active, not suspended, and exists.
            
            return redirect()->route('admin.dashboard.index');
        }else{
            return response('Username atau password tidak sesuai',401);
        }
    }

    public function logout() {
        session()->flush();
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

}
