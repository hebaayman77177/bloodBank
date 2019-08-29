@extends('layouts.admin')
@inject('model','App\Models\Governorate')

@section('title')
User
@endsection

@section('header')
Create User
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
    {!! Form::model($model,['action' => ['UserController@store'] ]) !!}
        @include('user.form')
    {!! Form::close() !!}
@endsection