<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\WebBaseController;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends WebBaseController
{
    public function index()
    {

        $projects = Project::with(['creator','category'])->orderBy('created_at', 'desc')->get();
//        $projects = Project::with(['implementer','creator','category'])->orderBy('created_at', 'desc')->get();


        return view('admin.project.index', compact('projects'));
    }
}
