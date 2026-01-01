<?php

namespace App\Http\Controllers;
use App\Models\Dashboard;
use App\Models\ProjectsModel;
use App\Models\RegUserModel;
use Illuminate\Http\Request; 
class DashboardController extends Controller
{
    function Dashboard(){
        $projects = ProjectsModel::all(); 
        return view('dashboard', compact('projects'));
    	//return view('dashboard');
    }
    public function Profile(){
        $userDetails = RegUserModel::find(session()->get('loggedInUser'));
       
        return view('profile', compact('userDetails'));
    }
    
   
}
