<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Classroom;

class AdminController extends Controller
{
    private $class;
    private $totalCount;

    public function __construct(Classroom $class, User $totalCount){
        $this->class = $class;
        $this->totalCount = $totalCount;
    }

    public function index(){
        $all_class = Classroom::all();
        
        $students_count = User::all()->where('role_id','==', 3)->count();
        $teachers_count = User::all()->where('role_id','==', 2)->count();
        
        $webbasic_count = Classroom::all()->where('subject', '==', 'Web Basic')->count();
        $webstandard_count = Classroom::all()->where('subject', '==', 'Web Development Standard')->count();
        $webadvanced_count = Classroom::all()->where('subject', '==', 'Web Development Advanced')->count();
        $webexpert_count = Classroom::all()->where('subject', '==', 'Web Development Expert')->count();
        $designstandard_count = Classroom::all()->where('subject', '==', 'Design Standard')->count();
        $designadvanced_count = Classroom::all()->where('subject', '==', 'Design Advanced')->count();
        return view('admin.index')
        ->with('all_class', $all_class)
        ->with('students_count', $students_count)
        ->with('teachers_count', $teachers_count)
        ->with('webbasic_count', $webbasic_count)
        ->with('webstandard_count', $webstandard_count)
        ->with('webadvanced_count', $webadvanced_count)
        ->with('webexpert_count', $webexpert_count)
        ->with('designstandard_count', $designstandard_count)
        ->with('designadvanced_count', $designadvanced_count);
    }

    public function deactivateStudent($id){
        User::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function activateStudent($id){
        User::onlyTrashed()->findOrFail($id)->restore();

        return redirect()->back();
    }

    public function deactivateTeacher($id){
        User::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function activateTeacher($id){
        User::onlyTrashed()->findOrFail($id)->restore();

        return redirect()->back();
    }

    public function show($id){
        $class = $this->class->findOrFail($id);
        return view('admin.classroom.show')->with('class', $class);
    }

    
    

}
