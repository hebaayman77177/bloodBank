<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPass;
use App\Models\Governorate;
use App\Models\Article;
use App\Models\Category;
use App\Models\AC;
use App\Models\BloodType;
use App\Models\Client;
use App\Models\Contact;
use App\Models\bloodTypeClient;
use App\Models\DonationRequest;
use App\Models\Token;
use App\Shared\ApiHelper;
use App\Models\ClientDonationRequest;

class MainController extends Controller
{
   
    public function clientEdit(Request $request){
        $client=$request->user();
        $client->update($request->all());
        return ApiHelper::apiResponse($client);
    }

    public function governorates(){
        $governorates=Governorate::get();
        return ApiHelper::apiResponse($governorates);
    }

    public function cities(Request $request){
        $validator=validator()->make($request->all(),[
            'id' =>'required'
        ]);
        if($validator->fails()){
            return ApiHelper::apiResponse($validator->errors(),0,'fails');
        }

        $cities=Governorate::find($request->id)->cities()->get();
        return ApiHelper::apiResponse($cities);
    }

    public function bloodTypes(){
        $bloodTypes=BloodType::all();
        return ApiHelper::apiResponse($bloodTypes);
    }

    public function article(Request $request){

        $validator=validator()->make($request->all(),[
            'id' =>'required'
        ]);
        if($validator->fails()){
            return ApiHelper::apiResponse($validator->errors(),0,'fails');
        }

        $article=Article::find($request->id);
        return ApiHelper::apiResponse($article);
    }

    public function articles(Request $request){

        $articles=Article::where(function ($query) use($request){
             //?$request->name:'')    
             if($request->has('name'))
             {
                $query->where(function($query) use($request){
                    $query->where('header', 'LIKE', $request->name);
                    $query->orWhere('content', 'LIKE', $request->name);
                });
             }       

             if($request->has('category_id'))
             {
                $query->where('category_id', $request->category_id);
             }

             // cat & (header || content)
             // header || content & cat
        })->paginate(5);
        return ApiHelper::apiResponse($articles);
        // ->paginate(5);

        // if($id !='null'){
        //     $article=Article::find($id);
        //     return ApiHelper::apiResponse($article);
        // }
        // if($name !='null'){
        //     $articles=Article::whereRaw('header LIKE ?',[$name])->get();
        //     // return 'name';
        //     return ApiHelper::apiResponse($articles);
        // }
        // if($category !='null'){
        //     $cat=Category::where('name','like',$category)->get()->first(); 
        //     $articles=$cat->articles()->get();
        //     return ApiHelper::apiResponse($articles);
        // }
        // $articles=Article::all();
        // return ApiHelper::apiResponse($articles);
    }
    
    public function categories(){
        $categories=Category::all();
        return ApiHelper::apiResponse($categories);
    }

    public function contactUs(Request $request){

        $validator=validator()->make($request->all(),[
            'title' =>'required',
            'content' =>'required'
        ]);
        if($validator->fails()){
            return ApiHelper::apiResponse($validator->errors(),0,'fails');
        }

        $client=$request->user();
        $contact=$client->contacts()->create($request->all());
        return ApiHelper::apiResponse($contact);

    }

    public function notifications(Request $request){
        $client=Client::find($request->id);
        $notifications=$client->donationRequests()->paginate(5);
        return ApiHelper::apiResponse($notifications);
    }

    public function notificationSettings(Request $request){

        $client=$request->user();

        $bloodTybes=$request->bloodTypes;//expect id list
        $governorates=$request->governorates;//expect id list
        
        $client=$client->bloodTypesForDonation()->sync($bloodTybes);
        $client=$request->user();
        $client=$client->governoratesForDonation()->sync($governorates);
        
        $donations=DonationRequest::whereIn('blood_type_id',$bloodTybes)
                                    ->whereIn('governorate_id',$governorates)
                                    ->pluck('id')
                                    ->toArray();
        // return $donations;
        $client=$request->user();
        $client->donationRequests()->sync($donations);
        return ApiHelper::apiResponse([]);

    }

    public function favArticles(Request $request){
        $client=$request->user();
        $favs=$client->articles()->paginate(5);
        return ApiHelper::apiResponse($favs);

    }

    public function togArticle(Request $request){

        $client=$request->user();
        $articleId=$request->id;
        $client->articles()->toggle($articleId);

        return ApiHelper::apiResponse([]);
    }

    public function donationAdd(Request $request){

        $validator=validator()->make($request->all(),[
            'phone' =>'required',
            'blood_type_id' =>'required',
            'hospital_name' =>'required',
            'num_of_bags' =>'required',
            'governorate_id' =>'required',
        ]);

        // ClientDonationRequest::create(['client_id' => '1','donation_request_id' => '1']);;
        if($validator->fails()){
            return ApiHelper::apiResponse($validator->errors(),0,'fails');
        }

        $donation=DonationRequest::create($request->all());

        //update clientDonationRequest table
        // $governorate=Governorate::where('city_id',$request->governorate_id)
        $notified_clients_ids=Client::where('blood_type_id',$request->blood_type_id)
                                    // ->orWhere('governorate_id',$request->governorate_id)
                                    ->pluck('id')->toArray();
        $donation->clients()->attach($notified_clients_ids);
        $title = 'اشعر جديد';
        $body = 'يوجد اشعار جديد لديك ';
        $data = [
            'donatio_id' => $donation->id
        ];
        $tokens=Token::whereIN('client_id',$notified_clients_ids)
                            ->where('token','!=',null)
                            ->pluck('token')
                            ->toArray();
        // $ret=ApiHelper::notifyByFirebase($title,$body,$tokens,$data);

        return ApiHelper::apiResponse($donation);
    }

    public function donationEdit(Request $request){
        $validator=validator()->make($request->all(),[
            'phone' =>'required',
            'blood_type_id' =>'required',
            'hospital_name' =>'required',
            'num_of_bags' =>'required',
            'governorate_id' =>'required',
        ]);

        if($validator->fails()){
            return ApiHelper::apiResponse($validator->errors(),0,'fails');
        }

        $donation=DonationRequest::find($request->id)->update($request->all());
        return ApiHelper::apiResponse($donation);
    }

    public function donationGet(Request $request){
        $client=$request->user();

        $validator=validator()->make($request->all(),[
            'id' =>'required'
        ]);

        $donation=DonationRequest::find($request->id);
        $client->donationRequests()->updateExistingPivot($request->id, [
            'readed'=>1
        ]);
        return ApiHelper::apiResponse($donation);

    }
    
    public function resetPass(Request $request){
        $client=$request->user();
        $code=rand(0,99999);
        $client->code=$code;
        $client->save();

        Mail::to($client->email)->send(new ResetPass($code));

        return ApiHelper::apiResponse([]);
    }
    public function confirmPass(Request $request){
        $client=$request->user();
        if($client->code==$request->code){
            $client->password=bcrypt($request->password);
            $client->save();
            return ApiHelper::apiResponse([]);
        }else{
            return ApiHelper::apiResponse([]);
        }

    }

    public function canDonate(Request $request){
        return ApiHelper::apiResponse($request->user()->can_donate,0,'wrong code');
    }

    public function numUnreadedDonation(Request $request){
        return ApiHelper::apiResponse($request->user()->num_unreaded_notifications);
    }

    public function isFav(Request $request){
        $res=$request->user()->articles()->where('articles.id',$request->article_id)->get();
        $data= ($res->isEmpty())?FALSE:TRUE;
        return ApiHelper::apiResponse($data);
        
    }

    // public function donationsGet(Request $request){
    //     if($request->id !=null){
    //         $donation=DonationRequest::find($request->id);
    //         return ApiHelper::apiResponse($donation);
    //     }
    //     if($request->blood_type_id !=null){
    //         $donations=DonationRequest::whereRaw('blood_type_id = ?',[$request->blood_type_id])->get();
    //         return ApiHelper::apiResponse($donations);
    //     }
    //     if($request->governorate_id !=null){
    //         $donations=DonationRequest::where('governorate_id',$request->governorate_id)->get(); 
    //         return ApiHelper::apiResponse($donations);
    //     }
    //     $donations=DonationRequest::all();
    //     return ApiHelper::apiResponse($donations);
    // }

    

}
