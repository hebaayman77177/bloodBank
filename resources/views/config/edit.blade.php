@extends('layouts.admin')
{{-- @inject('model','App\Models\Governorate') --}}

@section('title')
Settings
@endsection

@section('header')
Settings
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
    {!! Form::model($model,['action' => ['ConfigController@update',$model->id] ,
                            'method'=>'put']) !!}
        @include('config.form')
    {!! Form::close() !!}
@endsection