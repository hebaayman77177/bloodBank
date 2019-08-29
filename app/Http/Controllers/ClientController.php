<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records=Client::paginate(20);
        return view('client.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'name'=>'required',
            // 'password'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'date_of_birth'=>'required',
            'date_of_last_donation'=>'required',
            'status'=>'required',
            'blood_type_id'=>'required',
            'city_id'=>'required',
        ];

        $this->validate($request,$rules);

        Client::create($request->all());
        flash()->success('تم الاضافه');
        return redirect()->route('client.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model=Client::findOrFail($id);
        // return $model;
        return view('client.edit',compact('model'));
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
        $rules=[
            'name'=>'required',
            // 'password'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'date_of_birth'=>'required',
            'date_of_last_donation'=>'required',
            'status'=>'required',
            'blood_type_id'=>'required',
            'city_id'=>'required',
        ];

        $this->validate($request,$rules);

        Client::findOrFail($id)->update($request->all());
        flash()->success('تم التعديل');
        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client::find($id)->delete();
        flash()->success('تم الحذف');
        return redirect()->route('client.index');
    }
}
