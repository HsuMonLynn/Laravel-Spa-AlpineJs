<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class StudentController extends Controller
{   
    public function index()
    {   
        return view('student-create');
    }

    public function store(Request $request)
    {
        $request->session()->put('name', $request->name);
        $request->session()->put('selectHobbie', $request->selectHobbie);
        $request->session()->put('gender', $request->gender);
        $request->session()->put('fav', $request->fav);
        $request->session()->put('matrial', $request->matrial);

        return redirect()->route('students.about')->with('success', 'Thank you!
        Your Form Data has been successfully sent.');

    }

    public function about()
    {
        $name = session()->get('name');
        $hobbies = session()->get('selectHobbie');
        $gender = session()->get('gender');
        $favs = session()->get('fav');
        $matrial = session()->get('matrial');
        return view('student-show',
        compact('name','hobbies','gender','favs','matrial'));
    }
}
