@extends('layouts.app')
@section('title','Add Projects')
@section('content')
 

    <div class="bg-white  rounded-xl shadow-md w-full  text-center">

      <h1 class="text-center text-4xl text-teal-800 font-bold">Project List</h1>
      <a href="/newProject"  class="px-4 py-2 bg-blue-500 text-white
                           rounded-md shadow hover:bg-blue-700
                           focus:outline-none"> Add New Project</a> <br>
                
    @if (count($projects) > 0)
    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
    <table class="w-full text-sm text-left rtl:text-right text-body">
  <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
    <tr>
      <th scope="col" class="px-6 py-3 font-medium">Company Name</th>
      <th scope="col" class="px-6 py-3 font-medium">Designation</th>
      <th scope="col" class="px-6 py-3 font-medium">Project Name</th>
      <th scope="col" class="px-6 py-3 font-medium">Link</th>
      <th scope="col" class="px-6 py-3 font-medium">Start Date</th>
      <th scope="col" class="px-6 py-3 font-medium">End Date</th>
      <th scope="col" class="px-6 py-3 font-medium">Description</th> 
      <th scope="col" class="px-6 py-3 font-medium">Action</th>
    </tr>
  </thead>
        <tbody>
          @foreach ($projects as $project)
            <tr scope="col" class="px-6 py-3 font-medium">
            <td class="px-6 py-4">{{ $project->company_name }}</td>
            <td class="px-6 py-4">{{ $project->designation }}</td>
            <td class="px-6 py-4">{{ $project->project_name }}</td>
            <td class="px-6 py-4">{{ $project->project_link }}</td>
            <td class="px-6 py-4">{{ $project->start_date }}</td>
            <td class="px-6 py-4">{{ $project->end_date }}</td>
            <td class="px-6 py-4">{{ $project->project_desc }}</td>
            <td class="px-6 py-4"><a href="/editProject/{{ $project->id }}" class="font-medium text-fg-brand hover:underline">Edit</a> <a href="/deleteProject/{{ $project->id }}" class="font-medium text-fg-brand hover:underline">Delete</a> </td>
          </tr> 
        @endforeach 
        </tbody>
      </table>
    </div>
    @else
        <p>No projects found.</p>
    @endif
@endsection