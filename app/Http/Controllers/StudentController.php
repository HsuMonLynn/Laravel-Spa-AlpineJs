<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{   
    public function index()
    {   
        return view('student-create');
    }

    public function store(Request $request)
    {
        Session::put('name', $request->name);
        Session::put('selectHobbie', $request->selectHobbie);
        Session::put('gender', $request->gender);
        Session::put('fav', $request->fav);
        Session::put('matrial', $request->matrial);

        return redirect()->route('students.about')->with('success', 'Thank you!
        Your Form Data has been successfully sent.');

    }

    public function about()
    {
        $name = Session::get('name');
        $hobbies = Session::get('selectHobbie');
        $gender = Session::get('gender');
        $favs =  Session::get('fav');
        $matrial = Session::get('matrial');

        return view('student-show',
                compact('name','hobbies','gender','favs','matrial'));
    }
}
