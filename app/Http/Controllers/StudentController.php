<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students=Student::all();

        return view('student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sclasses=SchoolClass::all();
        return view('student.create',compact('sclasses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'pwd' => 'required',
            'phone' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $student=new Student();
        $student->name=$request->name;
        $student->email=$request->email;
        $pwd=Hash::make($request->pwd);
        $student->password=$pwd;
        $student->phone=$request->phone;
        $student->school_class_id=$request->sclass;
        $student->gender=$request->gender;
        $student->birthday=$request->birthday;
        $student->address=$request->address;
        $path = $request->file('image')->store('public/images');
        $student->photo=$path;

        $student->save();

        return redirect()->route('student')->with('success','Post has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student=Student::where('id',$id)->first();
        $sclasses=SchoolClass::all();
        return view('student.edit',compact('student','sclasses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student=Student::findOrFail($id);
        $student->name=$request->name;
        $student->email=$request->email;
        $student->password=$request->pwd;
        $student->phone=$request->phone;
        $student->school_class_id=$request->sclass;
        $student->gender=$request->gender;
        $student->birthday=$request->birthday;
        $student->address=$request->address;

        if($request->hasFile('image')){
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path = $request->file('image')->store('public/images');
            $student->photo=$path;
        }
        $student->save();

        return redirect()->route('student')->with('success','Student has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student=Student::findOrFail($id);
        $student->delete();
        return redirect()->route('student');
    }
}
