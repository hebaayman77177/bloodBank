@extends('layouts.admin')

@section('title')
Article
@endsection
@section('header')
Articles
@endsection

@section('content')

@include('flash::message')

<a  href='{{ url('article/create') }}' class='btn btn-success'>Add New Article</a>
<br>
<br>
<div class="row" >
    @foreach($records as $record)
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail text-right" style="overflow: hidden;height:390px;">
        <img src="{{url($record->full_img_path)}}" alt="article photo" style="height:200px">
        <div class="caption">
            <h3 style="height: 70px">{{$record->header}}</h3>
            {{-- <p >{{$record->fixed_size_content}}</p> --}}
            
                <form action="{{ url(route('article.destroy', $record->id)) }}" method="POST" style="display:inline-block;margin:0px;">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger" style="display:inline-block">مسح</button>
                </form>
                <a href="{{url(route('article.edit',$record->id))}}" class="btn btn-primary" role="button">تعديل</a>
                <a href="{{url(route('article.show',$record->id))}}" class="btn btn-default" role="button">اظهار</a> 
        </div>
    </div>
    </div>    
    @endforeach
</div>
@endsection

