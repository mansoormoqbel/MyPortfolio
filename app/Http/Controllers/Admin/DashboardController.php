<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Service;
use App\Models\Contact; // إن وُجِد
//use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $projectsCount = Project::count();
        $servicesCount = Service::count();
        $recentProjects = Project::latest()->limit(5)->get();
        // $contacts = Contact::latest()->limit(5)->get();

        return view('admin.dashboard', compact('projectsCount','servicesCount','recentProjects'));
    }
    
}
