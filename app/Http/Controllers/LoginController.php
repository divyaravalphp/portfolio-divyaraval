<?php

namespace App\Http\Controllers;

use App\Models\ProjectsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    public function login(){
        if (session()->has('loggedInUser')) {
            $projects = ProjectsModel::all(); 
            return view('dashboard', compact('projects'));
        } else {
            return view('login');
        }        
    }
    public function loginUser(Request $request){
        $request->validate([
            'useremail' => 'required|email',
            'userpassword' => 'required|string',
        ]);

        $user = \App\Models\RegUserModel::where('useremail', $request->useremail)->first();

        if ($user && \Illuminate\Support\Facades\Hash::check($request->userpassword, $user->userpassword)) {
            // Authentication passed
            $request->session()->put('loggedInUser', $user->id);
            $request->session()->put('loggedInUserName', $user->username);
            $request->session()->put('loggedInUserEmail', $user->useremail);
            return redirect('/dashboard');
        } else {
            return back()->withErrors(['loginError' => 'Invalid email or password.'])->withInput();
        }
    }
}
