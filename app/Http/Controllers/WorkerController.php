<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;
class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$worker=Worker::all();
        $worker=Worker::latest()->paginate(2);
        //return view('Worker.view')->with('worker',$worker);
        return view('Worker.view',compact('worker'))->with('i',(request()->input('page',1)-1)*2);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Worker.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $worker=new Worker();
        $worker->Name=$request->input('name');
        $worker->Email=$request->input('email');
        //$worker->Image=$request->input('image');

        if($request->hasfile('image'))
        {
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time(). '.' .$extension;
            $file->move('Visa/',$filename);
            $worker->image=$filename;            
        }
        else
        {
            return $request;
            $worker->image='';
        }
        $worker->save();
        //return view('Worker.create')->with('worker',$worker);
        return redirect('/workerview');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $worker=Worker::find($id);
        return view('Worker.show',compact('worker'));
        //return view('Worker.show',$worker);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $worker=Worker::find($id);
        return view('Worker.updateform')->with('worker',$worker);
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
        $worker=Worker::find($id);
        $worker->Name=$request->input('name');
        $worker->Email=$request->input('email');

        if($request->hasfile('image'))
        {
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time(). '.' .$extension;
            $file->move('Visa/',$filename);
            $worker->image=$filename;            
        }
        // else
        // {
        //     return $request;
        //     $worker->image='';
        // }
        $worker->save();
        return redirect('/workerview');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $worker=Worker::find($id);
        $worker->delete();
        return redirect('/workerview')->with('worker',$worker);
    }
}
