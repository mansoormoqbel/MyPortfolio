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
        $pro=Project::all();
         $service=Service::all();
        /* dd($pro, $service); */
         return view('welcome', compact('pro','service'));
    }
}
