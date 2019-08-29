@extends('layouts.admin')

@section('title')
Client
@endsection
@section('header')
Clients
@endsection
<?php
    use App\Models\BloodType;
    use App\Models\City;
?>

@section('content')

@include('flash::message')

<a  href='{{ url('client/create') }}' class='btn btn-success'>Add New Client</a>
    <table class="table">
        <thead class="thead-light">
            <tr>
            <th scope="col">#</th> 
            <th scope="col">Name</th>
            {{-- <th scope="col">Password</th> --}}
            <th scope="col">email</th>
            <th scope="col">DOB</th>
            <th scope="col">Blood type</th>
            <th scope="col">Date of last Donation</th>
            <th scope="col">City</th>
            <th scope="col">Phone</th>
            <th scope="col">Status</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($records as $record)
                <tr>
                    <th scope="col">{{$loop->index}}</th> 
                    <th scope="col">{{$record->name}}</th>
                    {{-- <th scope="col">{{$record->password}}</th> --}}
                    <th scope="col">{{$record->email}}</th>
                    <th scope="col">{{$record->date_of_birth}}</th>
                    <th scope="col">{{BloodType::find($record->blood_type_id)->name}}</th>
                    <th scope="col">{{$record->date_of_last_donation}}</th>
                    <th scope="col">{{City::find($record->city_id)->name}}</th>
                    <th scope="col">{{$record->phone}}</th>
                    <th scope="col">not approved</th>
                    <th scope="col"><a type="button" href="{{url(route('client.edit',$record->id))}}" class="btn btn-primary" >Edit</a></th>
                    <th scope="col">
                        <form action="{{ url(route('client.destroy', $record->id)) }}" method="POST">
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