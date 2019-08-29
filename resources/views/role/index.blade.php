@extends('layouts.admin')

@section('title')
Role
@endsection
@section('header')
Roles
@endsection

@section('content')

@include('flash::message')

<a  href='{{ url('role/create') }}' class='btn btn-success'>Add New Role</a>
    <table class="table">
        <thead class="thead-light">
            <tr>
            <th scope="col">#</th> 
            <th scope="col">Name</th>
            <th scope="col">Display name</th>
            <th scope="col">description</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($records as $record)
                <tr>
                    <th scope="col">{{$loop->index}}</th> 
                    <th scope="col">{{$record->name}}</th>
                    <th scope="col">{{$record->display_name}}</th>
                    <th scope="col">{{$record->description}}</th>
                    <th scope="col"><a type="button" href="{{url(route('role.edit',$record->id))}}" class="btn btn-primary" >Edit</a></th>
                    <th scope="col">
                        <form action="{{ url(route('role.destroy', $record->id)) }}" method="POST">
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