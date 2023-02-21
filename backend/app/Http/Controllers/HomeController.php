<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;

class HomeController extends Controller
{
    private $class;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Classroom $class)
    {
        $this->middleware('auth');
        $this->class = $class;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $all_classes = Classroom::withTrashed()->latest()->get();
        return view('users.home')->with('all_classes', $all_classes);
    }
}
