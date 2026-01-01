<?php

namespace App\Http\Controllers;

use App\Models\ProjectsModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
class ProjectController extends Controller
{
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function newProject(){
        return view('projects');
    }
    
    protected function dateFieldName(): Attribute
        {
            return Attribute::make(
                get: fn ($value) => Carbon::parse($value)->format('Y-m-d'),
            );
        }
     public function addProject(Request $request){   // echo "<pre>";print_r($request->all());exit;
        // Validate the incoming request data
        $validatedData = $request->validate([
            'company_name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'project_name' => 'required|string|max:255',
            'project_link' => 'required|url|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'project_desc' => 'required|string',
        ]);
 
        // Create a new project instance and save to the database
        $project = new ProjectsModel();
        $project->company_name = $validatedData['company_name'];
        $project->designation = $validatedData['designation'];   
        $project->project_name = $validatedData['project_name'];
        $project->project_link = $validatedData['project_link'];
        $project->start_date = $validatedData['start_date'];
        $project->end_date = $validatedData['end_date'];
        $project->project_desc = $validatedData['project_desc'];
        $res = $project->save();
        $request->session()->put('showMsg','Project Added successfully!');
         return redirect('/dashboard');
         
    }
    public function editProject($id){
        $projects = ProjectsModel::find($id); 
        return view('projects', compact('projects'));
    }
    public function updateProject(Request $request, $id){
        
        $validatedData = $request->validate([
            'company_name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'project_name' => 'required|string|max:255',                
            'project_link' => 'required|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'project_desc' => 'required|string',
        ]);
 
        $project = ProjectsModel::find($id);
        $project->company_name = $validatedData['company_name'];
        $project->designation = $validatedData['designation'];
        $project->project_name = $validatedData['project_name'];
        $project->project_link = $validatedData['project_link'];
        $project->start_date = $validatedData['start_date'];
        $project->end_date = $validatedData['end_date'];
        $project->project_desc = $validatedData['project_desc'];
        $res = $project->save();
        
        $request->session()->put('showMsg','Project Updated successfully!'); 
        return redirect('/dashboard');
    }
    public function deleteProject(Request $request, $id){
        $project = ProjectsModel::find($id);
        $res = $project->delete();
        $projects = ProjectsModel::all(); 
        $request->session()->put('showMsg','Project Deleted successfully!');
        return redirect('/dashboard');
    }
}