<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use File;
use Validator;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee=Employee::all();
        return response()->json($employee);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $employee=new Employee();

        //applying validation
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email', //email validation
        ]);

        //check for validation
        if($validator->fails())
        {
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        //getting data from text feilds
        $employee->name=$request->input('name');
        $employee->email=$request->input('email');
       
        //image upload
        $file=$request->file('image');        
        $extension=$file->getClientOriginalExtension();
        $filename=time(). '.' .$extension;
        $file->move('ApiImage/',$filename);
        $employee->image=$filename;
        $employee->save();
        return response()->json($employee);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee=Employee::find($id);

        //checking for valid ID
        if(is_null($employee))
        {
            return response()->json(['message'=>'Record Not Found']);
        }
        return response()->json($employee);
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
        $employee=Employee::find($id);

        //checking for Valid ID
        if(is_null($employee))
        {
           return response()->json(['message'=>'Not Found']);
       }
        
       //checking text feild if they have any data
        if($request->input('name'))
        {
            $employee->name=$request->input('name');
        }
        
        
        if($request->input('email'))
        {
            $employee->email=$request->input('email');
        }
        
        //checking if they have any image file
        if($request->hasfile('image')) 
        {             
            $file=$request->file('image');            
            $extension=$file->getClientOriginalExtension();
            $filename=time(). '.' .$extension;
            $file->move('ApiImage/',$filename);
            $employee->image=$filename;
        }

       $employee->save();
        //$employee->update($request->all());
        return response()->json($employee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee=Employee::find($id);
        
        //checking for valid ID
        if(is_null($employee))
        {
            return response()->json(['message'=>'Record not Found']);
        }
        
        //File::delete('/path/to/image/1614257163.png');
        //unlink(public_path() .  '/ApiImage/' . $employee->file );
        $employee->delete();
        return response()->json(['message'=>'Data Deleted successfully']);
    }
}
