@extends('layouts.admin')
@inject('model','App\Models\Category')

@section('title')
Category
@endsection

@section('header')
Create Category
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
    {!! Form::model($model,['action' => ['CategoryController@store'] ]) !!}
        @include('category.form')
    {!! Form::close() !!}
@endsection