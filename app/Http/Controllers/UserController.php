<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->user()->can('show-users')){
            return view('views.errors.404');
        }
        $records=User::paginate(20);
        return view('user.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
            'password'=>'required',
            'email'=>'required',
            'role_list'=>'required|array',
        ];

        $this->validate($request,$rules);

        $user=User::create($request->all());
        $user->roles()->attach($request->role_list);

        flash()->success('تم الاضافه');
        return redirect()->route('user.index');
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
        $model=User::findOrFail($id);
        // return $model;
        return view('user.edit',compact('model'));
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
            'password'=>'required',
            'email'=>'required',
            'role_list'=>'required|array',
        ];

        $this->validate($request,$rules);

        $user=User::findOrFail($id);
        $user->roles()->sync($request->role_list);
        $user->update($request->all());
        flash()->success('تم التعديل');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->roles()->detach($request->role_list);
        $user->delete();
        flash()->success('تم الحذف');
        return redirect()->route('user.index');
    }
}
