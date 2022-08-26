@extends('layout.main')
@section('content')
<div class="container mt-3 pt-5">
    <h2>Class <a class="btn btn-info" href="{{route('class.create')}}">New Class</a></h2>
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Class Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sclasses as $sclass)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$sclass->name}}</td>
            <td>
                <a href="{{route('class.edit',['id'=>$sclass->id])}}" class="btn btn-sm btn-info">Edit</a>
                <a href="{{route('class.del',['id'=>$sclass->id])}}" class="btn btn-sm btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
