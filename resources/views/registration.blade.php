@extends('layouts.app')
@section('title','Register')
@section('content')
 
 
 
   <div class="bg-white  rounded-xl shadow-md   text-center p-32 max-w-xl">
        <h2 class="text-2xl font-bold text-center text-teal-500 mb-6">Registration</h2>
          @if ($errors->any())
            <div class="alert alert-danger text-color-red">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
       @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif 

        <form method="post" action="/createUser" class=" space-y-2">
            @csrf

            <div>
              <label for="username" class="block mb-1 text-gray-600">User Name</label>
              <input type="text" id="username" name="username" required placeholder=" User Name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:outline-none focus:ring-teal-500" />
            </div>

             <div>
              <label for="useremail" class="block mb-1 text-gray-600">User Email</label>
              <input type="text" id="useremail" name="useremail" required placeholder="Enter Email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:outline-none focus:ring-teal-500" />
            </div>

            <div>
              <label for="userpassword" class="block mb-1 text-gray-600">Password</label>
              <input type="password" id="userpassword" name="userpassword" required placeholder="Enter Password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:outline-none focus:ring-teal-500" />
            </div>
         
          
            
            <button type="submit" name="register" class=" bg-teal-600 text-white px-4 py-2 rounded hover:bg-teal-700">Register</button>
   
        </form>  </div>
        @endsection