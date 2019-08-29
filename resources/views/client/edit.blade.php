@extends('layouts.admin')
{{-- @inject('model','App\Models\Governorate') --}}

@section('title')
Client
@endsection

@section('header')
Edit Client
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
    {!! Form::model($model,['action' => ['ClientController@update',$model->id] ,
                            'method'=>'put']) !!}
        @include('client.form')
    {!! Form::close() !!}
@endsection