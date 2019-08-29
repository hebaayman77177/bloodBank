@extends('layouts.admin')
{{-- @inject('model','App\Models\Governorate') --}}

@section('title')
Governorate
@endsection

@section('header')
Edit Governorate
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
    {!! Form::model($model,['action' => ['GovernorateController@update',$model->id] ,
                            'method'=>'put']) !!}
        @include('governorate.form')
    {!! Form::close() !!}
@endsection