@extends('layouts.admin')
@inject('model','App\Models\Governorate')

@section('title')
Governorate
@endsection

@section('header')
Create Governorate
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
    {!! Form::model($model,['action' => ['GovernorateController@store'] ]) !!}
        @include('governorate.form')
    {!! Form::close() !!}
@endsection