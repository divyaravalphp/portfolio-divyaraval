@extends('layouts.app')
@section('title','User Profile')
@section('content')
 
  <div class="bg-white  rounded-xl shadow-md w-full  text-center">
    
        <h2 class="text-2xl font-bold text-center text-teal-500 mb-6">User Profile</h2>
         
       

        <form method="post" action="/editUser/{{ $userDetails->id }}" class=" space-y-2">
            @csrf

            <div>
              <label for="username" class="block mb-1 text-gray-600">User Name</label>
              <input value="@if (!@empty($userDetails)) {{ $userDetails->username }}@endif" type="text" id="username" name="username" required placeholder=" User Name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:outline-none focus:ring-teal-500" />
            </div>

             <div>
              <label for="useremail" class="block mb-1 text-gray-600">User Email</label>
              <input readonly type="text" id="useremail" name="useremail" required placeholder="Enter Email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:outline-none focus:ring-teal-500" />
            </div>

            
         
          
            
            <button type="submit" name="register" class=" bg-teal-600 text-white px-4 py-2 rounded hover:bg-teal-700">Update</button>
   
        </form>  </div>
        @endsection