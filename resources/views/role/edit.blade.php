@extends('layouts.admin')
{{-- @inject('model','App\Models\Governorate') --}}

@section('title')
Role
@endsection

@section('header')
Edit Role
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
    {!! Form::model($model,['action' => ['RoleController@update',$model->id] ,
                            'method'=>'put']) !!}
        @include('role.form')
    {!! Form::close() !!}
@endsection