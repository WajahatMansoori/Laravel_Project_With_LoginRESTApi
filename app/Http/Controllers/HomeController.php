<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
class HomeController extends Controller
{
    public function Index()
    {
        //return view('Home.Index',['std1'=>'Ali','std2'=>'Amir','std3'=>'huma']);
        //$CountryArray=array('Pakistan','India','England','UAE');
        $CountryArray['Country']=['Pakistan','England','UAE'];
        return view('Home.Index',$CountryArray);
    }

    public function AboutUs()
    {
        $Name="PHP Developer";
        return view('Home.AboutUs')->with('Designation',$Name);
    }

    public function ContactUs()
    {
        $Name="Wajahat";
        $Des="Php Developer";
        $Sal="39000/-";
        return view('Home.ContactUs',compact('Name','Des','Sal'));
    }

    public function GetArray()
    {
        $MyArray['Students']=['name1'=>'Ali','name2'=>'Junaid','name3'=>'Hina'];
        return view('Home.Arrayview',$MyArray);
    }

    public function MyForm()
    {
        return view('Home.Myform');
    }

    public function GetData(Request $req )
    {
        //print_r($req->all());
        $data['FormData']=$req->all();
        return view('Home.PrintData',$data);
    }

    public function BladeForm()
    {
        return view('Home.BladeForm');
    }

    public function GetBladeForm(Request $req)
    {
        $data['MyFormData']=$req->all();
        return view('Home.PrintBladeData',$data);
    }

    public function EmployeeMethod()
    {
        $emp=new Employee();
        $emp->id=1;
        $emp->name="Wajahat";
        $emp->age=22;

        print($emp->id."<br>");
        print($emp->name."<br>");
        print($emp->age."<br>");
    }
}
