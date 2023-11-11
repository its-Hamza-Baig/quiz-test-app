<?php

namespace App\Http\Controllers\Admin;

use auth;
use Mail;
use App\Models\User;
use App\Models\Classes;
use App\Models\Student;
use Illuminate\Support\str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class Addstudentcontroller extends Controller
{
    //

    public function loadStudents(){
        $user_id = auth()->user()->id;
        $studentdata = User::where('admin_id', $user_id)->with('classname')->get();

        $classesList = Classes::where('user_id', $user_id)->get();



        return view('admin.showStudents', compact('studentdata', 'classesList'));
    }

    public function addStudent(Request $request){
        $user_id = auth()->user()->id;
        $classname = Classes::where('id', $request->class_id)->value('class');

        $password = str::random(8);

        User::insert([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($password),
            'role' => 'student',
            'admin_id' => $user_id,
            'class_id' => $request->class_id,
        ]);

        $url = URL::to('/');

        $data['url'] = $url;
        $data['username'] = $request->username;
        $data['email'] = $request->email;
        $data['password'] = $password;
        $data['class'] = $classname;
        $data['tittle'] = "Student Registration Cridentials";

        Mail::send('admin.studentRegistrationMail',['data' => $data],function($message) use ($data){
        $message->to($data['email'])->subject($data['tittle']);
        });


        return back();
    }

    public function deleteStudent(Request $request){
        $studentdelete = User::find($request->id);
        $studentdelete->delete();

        return back()->with('success', 'Student Deleted Successfully.');
    }

    public function loadModel(){
        $userid = auth()->user()->id;
        $classesList = Classes::plunk('class', 'id')->where('user_id', $user_id);

        return view('admin.showStudents', compact('classesList'));
    }
}

