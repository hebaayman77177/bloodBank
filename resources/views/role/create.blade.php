@extends('layouts.admin')
@inject('model','App\Models\Role')

@section('title')
Role
@endsection

@section('header')
Create Role
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
    {!! Form::model($model,['action' => ['RoleController@store'] ]) !!}
        @include('role.form')
    {!! Form::close() !!}
@endsection