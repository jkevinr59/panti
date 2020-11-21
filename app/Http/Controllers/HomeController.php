<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function changePassword()
    {
        return view('ganti_password');
    }
    public function updatePassword(Request $request)
    {
        $oldPassword = $request->old_password;
        $newPassword = $request->new_password;
        $user = Auth::user();
        $currentPassword = $user->password;
        if(Hash::check($oldPassword, $currentPassword)){
            $user->password = Hash::make($newPassword);
            $user->save();
            return redirect()->route('home')->with('success','berhasil mengganti password');
        }
        else{
            return redirect()->back()->with('error','password tidak cocok');
        }
    }
}
