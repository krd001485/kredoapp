<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Classroom;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{

private $teacher;
const LOCAL_STORAGE_FOLDER = 'public/images/';


public function __construct(User $teacher, Classroom $class){
    $this->teacher = $teacher;
    $this->class = $class;
    
}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $teachers = User::where('role_id', 2)->withTrashed()->latest()->get();
        return view('admin.teachers.display')->with('teachers', $teachers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->teacher->avatar = $this->saveImage($request);
        $this->teacher->name = $request->name;
        $this->teacher->email = $request->email;
        $this->teacher->password = Hash::make($request->password);
        $this->teacher->role_id = 2;

        $this->teacher->save();

        return redirect()->back()->with('teacher-added', '  Teacher added successfully');
    }

    public function saveImage($request)
    {
        $avatar_name = time() . '.' . $request->avatar->extension();


        $request->avatar->storeAs(self::LOCAL_STORAGE_FOLDER, $avatar_name);
        return $avatar_name;
    }

    public function bookedClasses(){
        $classes = Classroom::withTrashed()->where('teacher_id', Auth::id())->get();

        return view('users.teachers.classes.index')
        ->with('classes', $classes);
    }

    public function endClass($class_id){
        $class = Classroom::findOrFail($class_id);
        $class->status = 'ended';
        $class->save();

        $class->delete();

        return redirect()->back()->with('class-end', 'Class has been ended');
    }

    public function cancelClass($class_id){
        $class = Classroom::findOrFail($class_id);
        $class->status = 'vacant';
        $class->delete();

        return redirect()->back()->with('class-cancel', 'Class has been canceled');
    }

    public function rescheduleClass($class_id){
        $class = Classroom::onlyTrashed()->findOrFail($class_id);
        $class->status ='vacant';
        $class->restore();

        return redirect()->back()->with('class-reschedule', 'Class has been rescheduled');

    }

    public function getTeacherCount(){

    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
