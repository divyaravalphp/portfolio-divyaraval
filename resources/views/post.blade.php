@extends('layouts.app')
@section('title','Posts')
@section('content')
 

    <div class="bg-white  rounded-xl shadow-md w-full  text-center">
 
           <a href="/importPosts"  class="px-4 py-2 bg-blue-500 text-white
                           rounded-md shadow hover:bg-blue-700
                           focus:outline-none">Import Posts</a>
      <h1 class="text-center text-4xl text-teal-800 font-bold">Add Post</h1>
 
       <form enctype="multipart/form-data" method="post" action="/addPosts" class=" items-center justify-center space-x-2">
        @csrf 
       <div class="mt-12 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-12    ">
          <div class="sm:col-span-6">
          <label for="user_id" class="block text-sm/6 font-medium text-gray-900"> User Id</label>
          <div class="mt-2">
            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
            
              <input  id="user_id" type="number" name="user_id" placeholder="User ID" class="block min-w-0 grow bg-white py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" />
            </div>
          </div>
        </div>

        <div class="sm:col-span-6">
          <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
          <div class="mt-2">
            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
            
              <input  id="title" type="text" name="title" placeholder="Title" class="block min-w-0 grow bg-white py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" />
            </div>
          </div>
        </div>

       
         <div class="sm:col-span-6">
          <label for="file" class="block text-sm/6 font-medium text-gray-900">File</label>
          <div class="mt-2">
            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
            
              <input  id="file" type="file" name="file" placeholder="File" class="block min-w-0 grow bg-white py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" />
            </div>
          </div>
        </div>
          {{-- <div class="sm:col-span-3">
          <label for="updated_at" class="block text-sm/6 font-medium text-gray-900">Date</label>
          <div class="mt-2">
            <input value=""     id="updated_at" type="date" name="updated_at"  class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
          </div>
        </div> --}}
          
     

           <div class="col-span-full">
          <label for="body" class="block text-sm/6 font-medium text-gray-900"><Body>
            
          </Body></label>
          <div class="mt-2">
            <textarea  id="body" name="body" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"></textarea>
          </div>
          <p class="mt-3 text-sm/6 text-gray-600">Write a few sentences about Post.</p>
        </div>
       </div>
            <button type="submit" class=" bg-teal-600 text-white px-4 py-2 rounded hover:bg-teal-700">Add Post</button>
    </div>
        </form>
        @endsection