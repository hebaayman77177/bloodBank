@extends('layouts.admin')

@section('title')
Contacts
@endsection
@section('header')
Contacts
@endsection
<?php
    use App\Models\BloodType;
    use App\Models\City;
?>

@section('content')

@include('flash::message')
    <table class="table">
        <thead class="thead-light">
            <tr>
            <th scope="col">#</th> 
            <th scope="col">title</th>
            <th scope="col">user</th>
            <th scope="col">email</th>
            {{-- <th scope="col">Password</th> --}}
            <th scope="col">Show</th>
            <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($records as $record)
                <tr>
                    
                    <th scope="col">{{$loop->index}}</th> 
                    <th scope="col">{{$record->title}}</th>
                    <th scope="col">{{$record->client()->first()->name}}</th>
                    <th scope="col">{{$record->client()->first()->email}}</th>
                    <th scope="col">
                        <a href="{{url(route('contact.show',$record->id))}}" class="btn btn-default" role="button">Show</a>
                    </th>
                    <th scope="col">
                        <form action="{{ url(route('contact.destroy', $record->id)) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection