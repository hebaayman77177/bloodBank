<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Config;

class ConfigController extends Controller
{
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id=1)
    {
        $model=Config::findOrFail($id);
        // return $model;
        return view('config.edit',compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id=1)
    {
        Config::findOrFail($id)->update($request->all());
        flash()->success('تم التعديل');
        return redirect()->route('config.edit',1);
    }

}
