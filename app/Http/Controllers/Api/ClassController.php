<?php

namespace App\Http\Controllers\Api;

use DB;
use App\Classs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $class = DB::table('classses')->get(); // query builder

        // return response()->json($class);

        return Classs::all();// eloquent
        
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
        $validatedData = $request->validate([
            'class_name' => 'required|unique:classses|max:25'
        ]);

        // $data = array();
        // $data['class_name'] = $request->class_name;

        // DB::table('classses')->insert($data); // query builder

        Classs::create($request->all()); // eloquent

        return response('done');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $show = DB::table('classses')->where('id',$id)->first();// query builder

        // return response()->json($show);

        return Classs::find($id);// eloquent
        
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
        $validatedData = $request->validate([
            'class_name' => 'required|unique:classses|max:25'
        ]);

        // $data = array();
        // $data['class_name'] = $request->class_name;

        // DB::table('classses')->where('id',$id)->update($data); // query builder

        Classs::find($id)->update($request->all()); // eloquent

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
        //DB::table('classses')->where('id',$id)->delete(); // query builder

        Classs::find($id)->delete(); // eloquent

        return response('deleted');
    }
}
