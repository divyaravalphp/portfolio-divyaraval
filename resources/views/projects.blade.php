@extends('layouts.app')
@section('title','Add Projects')
@section('content')
 

    <div class="bg-white  rounded-xl shadow-md w-full  text-center">
@if (!@empty($projects) ) 
<h1 class="text-center text-4xl text-teal-800 font-bold">Edit Project</h1>
    
       <form method="post" action="/updateProject/{{ $projects->id }}" class=" items-center justify-center space-x-2">
        <input type="hidden" name="id" value="{{ $projects->id }}">
 @else
        
      <h1 class="text-center text-4xl text-teal-800 font-bold">Add Project</h1>
    
       <form method="post" action="/addProject" class=" items-center justify-center space-x-2">
  @endif
            @csrf

       <div class="mt-12 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-12    ">
          <div class="sm:col-span-6">
          <label for="company_name" class="block text-sm/6 font-medium text-gray-900"> Company Name</label>
          <div class="mt-2">
            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
            
              <input value="@if (!@empty($projects)) {{ $projects->company_name }}@endif" id="company_name" type="text" name="company_name" placeholder="Company Name" class="block min-w-0 grow bg-white py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" />
            </div>
          </div>
        </div>

        <div class="sm:col-span-6">
          <label for="designation" class="block text-sm/6 font-medium text-gray-900">Designation</label>
          <div class="mt-2">
            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
            
              <input value="@if (!@empty($projects)) {{ $projects->designation }}@endif" id="designation" type="text" name="designation" placeholder="Designation" class="block min-w-0 grow bg-white py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" />
            </div>
          </div>
        </div>

        <div class="sm:col-span-6">
          <label for="project_name" class="block text-sm/6 font-medium text-gray-900"> Project Name</label>
          <div class="mt-2">
            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
            
              <input value="@if (!@empty($projects)) {{ $projects->project_name }}@endif" id="project_name" type="text" name="project_name" placeholder="Project Name" class="block min-w-0 grow bg-white py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" />
            </div>
          </div>
        </div>

        <div class="sm:col-span-6">
          <label for="project_link" class="block text-sm/6 font-medium text-gray-900"> Project Link</label>
          <div class="mt-2">
            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
            
              <input value="@if (!@empty($projects)) {{ $projects->project_link }}@endif" id="project_link" type="url" name="project_link" placeholder="Project Link" class="block min-w-0 grow bg-white py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" />
            </div>
          </div>
        </div>
              </div>
              <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
          <label for="start_date" class="block text-sm/6 font-medium text-gray-900">Start Date</label>
          <div class="mt-2">
            <input value="@if (!@empty($projects)){{ old('start_date', $projects->start_date)  }}@endif"     id="start_date" type="date" name="start_date"  class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
          </div>
        </div>

        <div class="sm:col-span-3">
          <label for="end_date" class="block text-sm/6 font-medium text-gray-900">End Date</label>
          <div class="mt-2">
            <input  value="@if (!@empty($projects)){{ old('end_date', $projects->end_date)  }}@endif" 
            id="end_date" type="date" name="end_date"  class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
          </div>
        </div>
              </div>

           <div class="col-span-full">
          <label for="project_desc" class="block text-sm/6 font-medium text-gray-900">Description</label>
          <div class="mt-2">
            <textarea  id="project_desc" name="project_desc" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">@if (!@empty($projects)) {{ $projects->project_desc }}@endif</textarea>
          </div>
          <p class="mt-3 text-sm/6 text-gray-600">Write a few sentences about Project.</p>
        </div>

            <button type="submit" class=" bg-teal-600 text-white px-4 py-2 rounded hover:bg-teal-700">@if (!@empty($projects)) Edit Project  @else Add Project @endif</button>
    </div>
        </form>
        @endsection