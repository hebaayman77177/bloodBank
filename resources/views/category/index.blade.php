@extends('layouts.admin')

@section('title')
Category
@endsection
@section('header')
Categories
@endsection

@section('content')

@include('flash::message')

<a  href='{{ url('category/create') }}' class='btn btn-success'>Add New Category</a>
    <table class="table">
        <thead class="thead-light">
            <tr>
            <th scope="col">#</th> 
            <th scope="col">Name</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($records as $record)
                <tr>
                    <th scope="col">{{$loop->index}}</th> 
                    <th scope="col">{{$record->name}}</th>
                    <th scope="col"><a type="button" href="{{url(route('category.edit',$record->id))}}" class="btn btn-primary" >Edit</a></th>
                    <th scope="col">
                        <form action="{{ url(route('category.destroy', $record->id)) }}" method="POST">
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