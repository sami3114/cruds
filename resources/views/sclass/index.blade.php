@extends('layout.main')
@section('content')
<div class="container mt-3 pt-5">
    <h2>Class <a class="btn btn-info" href="{{route('schoolClass.create')}}">New Class</a></h2>
    <table id="myTable" class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Class Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($schoolClasses as $schoolClass)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$schoolClass->name}}</td>
            <td>
            <form action="{{ route('schoolClass.destroy',['schoolClass'=>$schoolClass->id]) }}" method="POST">
                <a href="{{route('schoolClass.edit',['schoolClass'=>$schoolClass->id])}}" class="btn btn-sm btn-info">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
