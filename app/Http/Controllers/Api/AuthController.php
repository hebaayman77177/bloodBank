<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Client;
use App\Models\Token;

class AuthController extends Controller
{

    private function apiResponse($data,$status=1,$message='success'){
        $response=[
            'status'=>$status,
            'message'=>$message,
            'data'=>$data
        ];
        return response()->json($response);
    }

    public function register(Request $request){

        $validator=validator()->make($request->all(),[
            'name'            =>'required',
            'password'        => "required",
            'email'           => "required",
            'date_of_birth'   => "required",
            'city_id'         => "required",
            'phone'           => "required",
            'blood_type_id'      => "required|in:1,2,3,4,5,6"
        ]);

        if($validator->fails()){
            return $this->apiResponse($validator->errors(),0,'fails');
        }


        $request->merge(['password'=>bcrypt($request->password)] );

        $client=Client::create($request->all());
        $client->api_token=str_random(60);
        $client->save();
        $responsClient=[
            'name'              =>$client->name,
            'password'          =>$client->password,
            'email'             =>$client->email,
            'date_of_birth'     =>$client->date_of_birth,
            'date_of_last_donation'=>$client->date_of_last_donation,
            'city_id'           =>$client->city_id,
            'phone'             =>$client->phone,
            'blood_type_id'     =>$client->blood_type_id
        ];
        return $this->apiResponse([
            'api_token'=>$client->api_token,
            'client'=>$responsClient
        ]);
    }

    public function login(Request $request){

        $validator=validator()->make($request->all(),[
            'phone'            =>'required',
            'password'        => "required"
        ]);

        if($validator->fails()){
            return $this->apiResponse($validator->errors(),0,'fails');
        }

        $auth=Auth::guard('api')->validate($request->all());

        $client=Client::where('phone',$request->phone)->get()->first();
        
        if($client){
            if(Hash::check($request->password,$client->password)){
                $responsClient=[
                    'name'              =>$client->name,
                    'password'          =>$client->password,
                    'email'             =>$client->email,
                    'date_of_birth'     =>$client->date_of_birth,
                    'date_of_last_donation'=>$client->date_of_last_donation,
                    'city_id'           =>$client->city_id,
                    'phone'             =>$client->phone,
                    'blood_type_id'     =>$client->blood_type_id
                ];
                return $this->apiResponse([
                    'api_token'=>$client->api_token,
                    'client'=>$responsClient
                ]);
            }else{
                return $this->apiResponse([],0,'not correct data');
            }
        }else{
            return $this->apiResponse([],0,'not correct data');
        }
        return $this->apiResponse($auth);        
    }

    public function registerToken(Request $request){

        $validator=validator()->make($request->all(),[
            'token'            =>'required',
            'type'        => "required"
        ]);

        if($validator->fails()){
            return $this->apiResponse($validator->errors(),0,'fails');
        }

       Token::where('token',$request->token)->delete();

       $request->user()->tokens()->create($request->all());

       return $this->apiResponse([]);           
    }
}
