<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Governorate;
class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = City::with('governorate')->paginate(15);
        return view('city.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $governorates=Governorate::get();
        return view('city.create');
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
            'governorate'=>'required',
        ];
        $this->validate($request,$rules);

        $city=City::create(['name'=>$request->name,'governorate_id'=>$request->governorate]);
        $city->save();

        flash()->success('تمت الاضافه');
        return redirect()->route('city.index');
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

        $model=City::findOrFail($id);
        // return $model;
        return view('city.edit',compact('model'));

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
        // return $request;
        $rules=[
            'name'=>'required',
            'governorate'
        ];

        $this->validate($request,$rules);

        $city=City::findOrFail($id);
        $city->name=$request->name;
        $city->governorate_id=$request->governorate;
        $city->save();
        flash()->success('تم التعديل');
        return redirect()->route('city.index');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record=City::findOrFail($id);
        $record->delete();
        flash()->success('تم الحذف');
        return redirect()->route('city.index');
    }
}
