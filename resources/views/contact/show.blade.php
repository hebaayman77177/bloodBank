@extends('layouts.admin')

@section('title')
Contacts
@endsection

<?php
    use App\Models\BloodType;
    use App\Models\City;
?>

@section('content')


<div class="container">
    <div class="jumbotron">
        <h3>{{ucfirst($record->title)}}</h3>
        <h5>from:{{$record->client()->first()->name}}</h5>
        <h5>email:{{$record->client()->first()->email}}</h5>
        {{-- <h5>title:{{$record->title}}</h5> --}}
        <p>{{$record->content}}</p>
    </div>
</div>

 
@endsection