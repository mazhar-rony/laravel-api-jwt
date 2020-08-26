<?php

namespace App\Http\Controllers\Api;

use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $student = Student::all();

        return response()->json($student);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Student::create([
            'class_id' => request('class_id'),
            'section_id' => request('section_id'),
            'name' => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'password' => Hash::make(request('password')),
            'photo' => request('photo'),
            'address' => request('address'),
            'gender' => request('gender'),
        ]);

        return response('inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);

        return response()->json($student);
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
        $student = Student::find($id);

        $student->update([
            'class_id' => request('class_id'),
            'section_id' => request('section_id'),
            'name' => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'password' => Hash::make(request('password')),
            'photo' => request('photo'),
            'address' => request('address'),
            'gender' => request('gender'),
        ]);

        return response('updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);

        unlink($student->photo);// Image deleted from folder

        $student->delete();// Data deleted from DB

        return response('deleted');
    }
}
