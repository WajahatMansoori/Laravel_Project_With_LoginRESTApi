<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Login;
use App\Models\Student;
use Validator;
use Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class LoginController extends Controller
{
    public function Registered(Request $request)
    {
        $login=new Login();
        $login->name=$request->input('name');
        $login->email=$request->input('email');
        $login->password=$request->input('password');

        $login->code=rand(10203,12563);
        //$login->password=Hash::make($resquest->input('password'));
        $login->save();
        return response()->json(['Alert'=>'Registered Sucessfully','Admin'=>$login->name,'code'=>$login->code]);
    }
    

    public function CheckLogin(Request $request)
    {
        //$test=Login::all();
        //$test->password=$request->input
        $con=mysqli_connect('localhost','root','','laravelcruddb');
        
        $login=Login::get();
        
        $login->name=$request->input('name');

        $login->email=$request->input('email');
        $login->password=$request->input('password');

        //$login->password= Hash::check('plain-text', $request->input('password'));
        // $passQuery="SELECT *from logins where name='$login->name'";
        // $RunPass=mysqli_query($con,$passQuery);
        // $GetPass=mysqli_fetch_array($RunPass);

        // $OriginalPass=$GetPass['password'];
        
        $Query="SELECT *from logins where email='$login->email' && password='$login->password'";
       $run=mysqli_query($con,$Query);
        $data=mysqli_fetch_array($run);
       //$name=$data['name'];
        $TotalRow=mysqli_num_rows($run);
       
       // $total=DB::select("SELECT *from logins where email='$login->email' && password='$login->password'");
        
        if($TotalRow==1)
        {
            session_start();
            //$name1=DB::select("SELECT name from logins where email='$login->email'");
           // $_SESSION['username']=$login->name;
            $_SESSION['username']=$login->email;
            //echo $_SESSION['username'];
            return response()->json(['Alert'=>'Login Successfully','Welcome'=>$_SESSION["username"]]);
        }

        return response()->json(['Alert'=>'Login Failed','Msg'=>'Invalid Username or Password']);
    }

    public function AddStudent(Request $request)
    {
        try
        {
            session_start();
            $name=$_SESSION['username'];
            if($name!=null)
            {
                $std=new Student();
                $validator=Validator::make($request->all(),[
                    'Name'=>'required',
                    'Email'=>'required|email', //email validation
                    'Age'=>'required',
                ]);

                if($validator->fails())
                {
                    return response()->json(['Alert'=>'Validation error']);
                }
                $std->Name=$request->input('Name');
                $std->Email=$request->input('Email');
                $std->Age=$request->input('Age');
                $std->save();

                return response()->json(['Alert'=>'Record inserted Successfully','By Admin'=>$_SESSION['username']]);
            }            
        }
        catch(\Exception $e)
        {
            return response()->json(['Alert'=>'UnAuthorize User']);
        }
        
    }

    public function UpdateStudent(Request $request,$id)
    {
        try
        {
            session_start();
            if($_SESSION['username']!=null)
            {
                $std=Student::find($id);
               
                if(is_null($std))
                {
                    return response()->json(['Alert'=>'No Record Found']);
                }

                if($request->input('Name'))
                {
                    $std->Name=$request->input('Name');
                }

                if($request->input('Email'))
                {
                    $std->Email=$request->input('Email');
                }
                if($request->input('Age'))
                {
                    $std->Age=$request->input('Age');
                }
                $std->save();

                return response()->json(['Alert'=>'Data Updated Sucessfully','By Admin'=>$_SESSION['username']]);
            }    
        }
        catch(\Exception $e)
        {
            return response()->json(['Alert'=>'UnAuthorize User']);
        }
        
    }

    public function DeleteStudent($id)
    {
        try
        {
            session_start();
            if($_SESSION['username']!=null)
            {
                $std=Student::find($id);
                if(is_null($std))
                {
                    return response()->json(['Alert'=>'No Record Found']);
                }
                $std->delete();
                return response()->json(['Alert'=>'Data Deleted Sucessfully','By Admin'=>$_SESSION['username']]);
            }
        }
        catch(\Exception $e)
        {
            return response()->json(['Alert'=>'UnAuthorize User']);
        }
    }

    public function ShowStudent($id)
    {
        try
        {
            session_start();
            if($_SESSION['username']!=null)
            {
                $std=Student::find($id);
                if(is_null($std))
                {
                    return response()->json(['Alert'=>'No Records Found']);
                }
                return response()->json($std);
            }
        }
        catch(\Exception $e)
        {
            return response()->json(['Alert'=>'UnAuthorize User']);
        }
    }

    public function ForgetPassword(Request $request)
    {
        session_start();
        if($_SESSION['username']!=null)
        {
            $code=rand(1000,9999);
            $subject="Forget Password";

            $email=$_SESSION['username'];
            

            // $check=DB::table('logins')->where('email',$email)->first();
            // if($check)
            // {
            //     DB::table('logins')->where('email',$email)->delete();
            // }

         

            // Mail::send('email', ['name' => $_SESSION['username'], 'verification_code' => $code],
            // function($mail) use ($email,$subject)
            // {
            //     $mail->from(getenv('FROM_EMAIL_ADDRESS'),'FROM LOGIN APP');
            //     $mail->to($email);
            //     $mail->subject($subject);
            // });
        }
    }

    public function Logout()
    {
        session_start();
        session_destroy();
        return response()->json(['Alert'=>'Logout Successfully']);
    }

    
}
