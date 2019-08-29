@extends('layouts.admin')
@inject('model','App\Models\City')

@section('title')
City
@endsection

@section('header')
Create City
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
    {!! Form::model($model,['action' => ['CityController@store'] ]) !!}
        @include('city.form')
    {!! Form::close() !!}
@endsection