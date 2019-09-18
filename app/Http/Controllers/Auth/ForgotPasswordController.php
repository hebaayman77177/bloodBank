<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use \Illuminate\Http\Request;
use App\Mail\ResetUserPass;
use App\User;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

     /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);
        // dd($request);
        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        // $response = $this->broker()->sendResetLink(
        //     $this->credentials($request)
        // );
        $code=rand(0,99999);

        $user=User::where('email',$request->email)->first();
        $user->code=$code;
        $user->save();
        \Mail::to($user->email)->send(new ResetUserPass($code));
        $user_id=$user->id;
        return  redirect(url('code-form',['user_id'=>$user_id]));
    }

    public function codeForm($user_id){
        return  view('auth.passwords.reset',['user_id'=>$user_id]);
    }
    public function validateCode(Request $request){
        $user=User::find($request->user_id)->first();
        if($request->code==$user->code){
            return view('auth.passwords.newPass',['user_id'=>$user->id]);
        }else{
            return back();
        }   
    }
    public function updatePass(Request $request){
        $rules=[
            'pass'=>'required'
        ];
        $this->validate($request,$rules);
        $user=User::find($request->user_id)->first();
        $user->password=$request->pass;
        $user->save();
        flash()->success('Your password changed successfuly :)');
        return redirect('/login');
    }


    /**
     * Get the response for a successful password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetLinkResponse( $request, $response)
    {
        return view('auth.passwords.reset');
    }

}
