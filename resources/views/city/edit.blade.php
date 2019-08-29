@extends('layouts.admin')

@section('title')
City
@endsection

@section('header')
Edit City
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::model($model,['action' => ['CityController@update',$model->id] ,
                            'method'=>'put']) !!}
        @include('city.form')
    {!! Form::close() !!}
@endsection