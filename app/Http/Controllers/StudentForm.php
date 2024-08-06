<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentForm extends Controller
{
    public function viewForm(){
        $students = Student::all();
        // return view('student-reg',['students'=> $students]);
        // dd($students);
        return view('student-reg', compact('students'));
    }

    public function addStudent(Request $request){
        // dd($request->all());

        $request->validate([
            'name' => 'required|string|max:255|unique:students,name',
            'email' => 'required|email|unique:students,email',
            'phone' => 'unique:students,phone',
            'address' => 'string',
            'gender' => 'required|string',
            'department' => 'required|string',
            'joined_date' => 'required|date',
        ], [
            'name.unique' => 'The name has already been taken.',
            'email.unique' => 'The email has already been taken.',
            'phone.unique' => 'The phone number has already been taken.'
        ]);

        Student::create($request->all());
        
        // return redirect('/')->with('message','Successfully updated');
        //also access home route using the route name
        return redirect()->route('home')->with('message','Successfully updated');

    }

    // app/Http/Controllers/StudentController.php
        public function deleteStudent($id)
            {
            $student = Student::findOrFail($id);
            $student->delete();
            return redirect()->route('home')->with('message', 'Student successfully removed');
            }

}
