<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Classroom;

class BookingController extends Controller
{
    //

    private $class;
    private $classroom;

    public function __construct(Classroom $class, Classroom $classroom){
        $this->class = $class;
        $this->classroom = $classroom;
    }

    public function index(){
        $all_class = Classroom::all();
        return view('users.teachers.booking.index')->with('all_class', $all_class);
    }

    public function teacherBookClass($classID){
        $class = $this->classroom->findOrFail($classID);
        $class->teacher_id = Auth::id();
        $class->save();

        return redirect()->back()->with('book-success', ' Class successfully booked');
    }

     public function studentBookClass($classID){
        $class = $this->classroom->findOrFail($classID);
        $class->student_id = Auth::id();
        $class->status = 'booked';
        $class->save();

        return redirect()->back()->with('book-success', ' Class successfully booked');
    }
}
