@extends('layouts.admin')
{{-- @inject('model','App\Models\Governorate') --}}

@section('title')
Article
@endsection

@section('content')
<div class="jumbotron text-right">
    <h1>{{$model->header}}</h1>
    <br>
    <img src={{$model->full_img_path}} alt="article photo" style="height:300px ">
    <br>
    <br>
    <p>{{$model->content}}</p>
    
    <form action="{{ url(route('article.destroy', $model->id)) }}" method="POST" style="display:inline-block;margin:0px;">
        @method('DELETE')
        @csrf
        <button class="btn btn-danger" style="display:inline-block">مسح</button>
    </form>
    <a href="{{url(route('article.edit',$model->id))}}" class="btn btn-primary" role="button">تعديل</a>

</div>
@endsection