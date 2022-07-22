<?php

namespace App\Http\Controllers;
use App\mymodel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use function GuzzleHttp\Promise\all;
//use Validator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth;
class mycontroller extends Controller
{

    function reg(Request $req)
    {
        //$this->validate($req,['email'])
        $data = new mymodel();
        $data->email = $req->email;
        if(!$this->unique_email_check($data->email)){
            return ;
        }

        $data->password = Hash::make($req->password);
        $validator = Validator::make(['visitorEmail' => $data->email], [
            'visitorEmail' => 'email',
        ]);
        if ($validator->fails()) {
            dd('Invalid email format!');
        } else {
            $data->save();
            echo "Your email:  ";
            echo $req->email;
            echo " is registered!";
        }

        // returns false, which is not correct
        // $request->validate([
        //   'email' => 'required|email|unique:users,email'
        //]);
        //validation
        // if (validate($req, ['email' => ['required',Rule::unique('user')->ignore($req->id),],])){
        //   echo "already used";
        //}

        //


    }
    function log(Request $req)
    {
//$this->forgot_password();
       // $this->validate($req,
        //["email"=>"required",
         //"password"=>"required"
        //]



        $tobematched = new mymodel();

        $tobematched->email = $req->email;
        $tobematched->password = $req->password;
        $var1 = $tobematched->email;
        $var4 = $tobematched->password;
        $data = mymodel::all();
        $counter = true ;
        foreach ($data as $mydata) {
           if( Auth::attempt([$data[0]->email => $req->email])){
               echo "hmmm";
           }

            $var2 = $mydata->email;
            $var3 = $mydata->password;

            if ($var2 === $var1 ) {
             //   if ($var4 === $var3) {
                    if (Hash::check($var4, $var3)) {
                        // The passwords match...
                        $counter = false;
                        echo "Login Successfull";
                    }

              //  }
            }
//            } else {
//                echo $var2;
//                echo $var1;
//                echo "<br>";
//                echo "Login failed";
//                echo "<br>";
//            }
        }
        if ($counter == true ){
            echo "Login failed";
        }
    }
    function unique_email_check($email){
        $data = mymodel::all();
        foreach ($data as $mydata) {
            if ($mydata->email === $email){
                    echo "Email already exist!";
                return false;
            }
        }
        return true ;
        }
    function forgot_password(){
        ini_set( 'display_errors', 1 );
        error_reporting( E_ALL );
        $from = "abubakrchan555@gmail.com";
        $to = "test@hostinger.com";
        $subject = "Checking PHP mail";
        $message = "PHP mail works just fine";
        $headers = "From:" . $from;
        if(mail($to,$subject,$message, $headers)) {
            echo "The email message was sent.";
        } else {
            echo "The email message was not sent.";
        }
    }

    }

