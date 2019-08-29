<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Governorate;

class GovernorateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $records=Governorate::paginate(20);
        return view('governorate.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('governorate.create');
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
            'name'=>'required'
        ];

        $this->validate($request,$rules);

        Governorate::create(['name'=>$request->name]);
        flash()->success('success');
        return redirect()->route('governorate.index');
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
        $model=Governorate::findOrFail($id);
        // return $model;
        return view('governorate.edit',compact('model'));
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
            'name'=>'required'
        ];

        $this->validate($request,$rules);

        $governorate=Governorate::findOrFail($id);
        $governorate->name=$request->name;
        $governorate->save();
        flash()->success('تم التعديل');
        return redirect()->route('governorate.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record=Governorate::findOrFail($id);
        $record->delete();
        flash()->success('تم الحذف');
        return redirect()->route('governorate.index');
    }
}
