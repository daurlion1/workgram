<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function index()
    {

        $projects = Project::orderBy('created_at', 'desc')->with(['implementer','creator','category'])->get();


        return view('admin.project.index', compact('projects'));
    }
}
