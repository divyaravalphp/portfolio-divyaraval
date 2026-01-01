<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\RegUserModel;
use Illuminate\Support\Facades\Validator;       
class UserController extends Controller
{
    public function register(){
        return view('registration');
    }
    public function createUser(Request $request){
       
       // dd($request->all());
        // Validate the incoming request data
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'useremail' => 'required|string|email|max:255|unique:reg_user_models',
            'userpassword' => 'required|string|min:8',
        ]); 
        // Create a new user instance and save to the database
        $user = new \App\Models\RegUserModel();
        $user->username = $validatedData['username'];
        $user->useremail = $validatedData['useremail'];
        $user->userpassword = Hash::make($validatedData['userpassword']);
        $res = $user->save();
 
        //return back()->with('success', 'User registered successfully!');
        return redirect('/login')->with('success', 'User registered successfully!');

    }
}
