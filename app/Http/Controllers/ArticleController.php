<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records=Article::paginate(8);
        return view('article.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
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
            'header'=>'required',
            'content'=>'required',
            'image'=>'required',
        ];

        $this->validate($request,$rules);
        // return $request;
        $article=new Article();
        // if ($request->hasFile('img')) {
            $image = $request->file('image');
            $name ='img'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/articles');
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);
            $article->img_path= $name;
        // }
        $article->header=$request->header;
        $article->content=$request->content;
        $article->save();
        flash()->success('تم الاضافه');
        return redirect()->route('article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model=Article::findOrFail($id);
        return view('article.show',compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model=Article::findOrFail($id);
        return view('article.edit',compact('model'));
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
            'header'=>'required',
            'content'=>'required',
            'image'=>'required',
        ];

        $this->validate($request,$rules);
        // return $request;
        $article=Article::findOrFail($id);
        // if ($request->hasFile('img')) {
            $image = $request->file('image');
            $name =$article->img_path;
            $destinationPath = public_path('/images/articles');
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);
        // }
        $article->header=$request->header;
        $article->content=$request->content;
        $article->save();
        flash()->success('تم النعديل');
        return redirect()->route('article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::find($id)->delete();
        flash()->success('تم الحذف');
        return redirect()->route('article.index');
    }
}
