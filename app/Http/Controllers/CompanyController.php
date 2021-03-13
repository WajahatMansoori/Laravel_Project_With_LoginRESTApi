<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Login;
use Validator;
class CompanyController extends Controller
{
    public function GetRegistered(Request $request)
    {
        $login=new Login();
        $login->name=$request->input('name');
        $login->email=$request->input('email');
        $login->password=$request->input('password');
        $login->code=rand(120254,456655);
        $login->save();

        return response()->json(['Alert'=>'Registered Successfully','Access Token'=>$login->code]);
    }

    public function GetLogin(Request $request)
    {
        $con=mysqli_connect('localhost','root','','laravelcruddb');
        $login=Login::get();
        $login->email=$request->input('email');
        $login->password=$request->input('password');
        $login->code=$request->input('code');
        
        $Query="SELECT *from logins where email='$login->email' && password='$login->password' && code='$login->code'";
        $RunQuery=mysqli_query($con,$Query);
        $data=mysqli_fetch_array($RunQuery);
        $TotalRow=mysqli_num_rows($RunQuery);

        if($TotalRow==1)
        {
            session_start();
            $_SESSION['username']=$login->email;
            return response()->json(['Alert'=>'Login Successfully','Admin'=>$_SESSION['username']]);
        }
        else
        {
            return response()->json(['Alert'=>'UnAuthorize User','Msg'=>'Check your credentials once again']);
        }
    }

    public function Logout()
    {
        session_start();
        session_destroy();
        return response()->json(['Alert'=>'Logout Successfully']);
    }

    public function AddCompanyRecord(Request $request)
    {
        session_start();
        try
        {
            if($_SESSION['username']!=null)
            {
               $company=new Company();
               $validator=validator::make($request->all(),[
                'name'=>'required',
                'email'=>'required|email',
                'designation'=>'required',
               ]);
               if($validator->fails())
               {
                   return response()->json(['Alert'=>'Validation error','Msg'=>'Please RE-enter Input Feilds']);
               }
               $company->name=$request->input('name');
               $company->email=$request->input('email');
               $company->designation=$request->input('designation');
               $company->save();
               return response()->json(['Alert'=>'Employee Record Addedd Successfully','Admin'=>$_SESSION['username']]);
            }
        }
        catch(\Exception $e)
        {
            return response()->json(['Alert'=>'UnAuthorize User','Msg'=>'Please First Login Your Account']);
        }
    }
}
