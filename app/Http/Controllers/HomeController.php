<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->middleware('auth');

        $usersCount = User::all()->count();
        $projectsCount = Project::all()->count();
        $categoriesCount = Category::all()->count();




        return view('admin.tables', compact(
            'usersCount',
            'projectsCount',
            'categoriesCount'
        ));

    }

    public function welcome()
    {
        return view('home');
    }
}
