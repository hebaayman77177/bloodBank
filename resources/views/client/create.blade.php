@extends('layouts.admin')
@inject('model','App\Models\Governorate')

@section('title')
Client
@endsection

@section('header')
Create Client
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
    {!! Form::model($model,['action' => ['ClientController@store'] ]) !!}
        @include('client.form')
    {!! Form::close() !!}
@endsection