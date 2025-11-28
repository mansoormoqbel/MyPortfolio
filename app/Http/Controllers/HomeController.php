<?php

namespace App\Http\Controllers;

//App\Http\Controllers\HomeController

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        $pro=Project::where('is_published',true)->get();
         $service=Service::where('is_active',true)->get();
        /* dd($pro, $service); */
         return view('welcome', compact('pro','service'));
    }
}
