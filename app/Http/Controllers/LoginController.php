<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('pages.login');
    }

    public function postLogin(Request $request)
    {
       // Validate the form data
       $this->validate($request, [
        'email' => 'required',
        'password' => 'required'
    ]);
      // Attempt to log the user in
      // Passwordnya pake bcrypt
    if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
        $request->session()->put('login',TRUE);
        
        // if successful, then redirect to their intended location
        return redirect()->intended('/dashboard');
    } else if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
        $request->session()->put('login',TRUE);
        
        return redirect()->intended('/dashboard');
    } else {
        
        return redirect()->back()->with('gagal','Gagal Login');
    }
}

    public function logout()
{
    if (Auth::guard('admin')->check()) {
        Auth::guard('admin')->logout();
        Session::flush();
    
    } elseif (Auth::guard('user')->check()) {
        Auth::guard('user')->logout();
        Session::flush();
    }
    return redirect('/login');

}


    public function register(){
    	//validation
    	return view('pages.register');
    }
    public function regis(Request $request){
    	//validation
        $validateData = $request-> validate([
            'name' => 'required',
            'email1' =>'required|email',
            'pass' => 'required',
            'konPass' => 'required',
            'level'=>'required',
        ]);
        // //insert datake table kamar
        if($request->pass == $request->konPass){
            if ($request->level == "Admin") {
                DB::table('admin')->insert([
                'name' => $request->name,
                'email' => $request->email1,
                'password'=> Hash::make($request->pass),
                
            ]);
            } else if ($request->level == "User" ) {
                DB::table('users')->insert([
                'name' => $request->name,
                'email' => $request->email1,
                'password'=> Hash::make($request->pass),
                
            ]);
            }
            
            // return $request->all();
            return redirect('login');
        } else {
            return redirect('register')->with('gagal', 'Password & konfirmasi password tidak sesuai');
        }
    }
}
