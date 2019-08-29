@extends('layouts.admin')

@section('title')
User
@endsection
@section('header')
Users
@endsection

@section('content')

@include('flash::message')

<a  href='{{ url('user/create') }}' class='btn btn-success'>Add New User</a>
    <table class="table">
        <thead class="thead-light">
            <tr>
            <th scope="col">#</th> 
            <th scope="col">Name</th>
            <th scope="col">Roles</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($records as $record)
                <tr>
                    <th scope="col">{{$loop->index}}</th> 
                    <th scope="col">{{$record->name}}</th>
                    <th scope="col">
                        @foreach ($record->roles()->get() as $per)
                        <span class='btn btn-default'>{{$per->name}}</span>
                        @endforeach
                    </th>
                    <th scope="col"><a type="button" href="{{url(route('user.edit',$record->id))}}" class="btn btn-primary" >Edit</a></th>
                    <th scope="col">
                        <form action="{{ url(route('user.destroy', $record->id)) }}" method="POST">
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