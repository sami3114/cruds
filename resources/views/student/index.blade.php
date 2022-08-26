@extends('layout.main')
@section('content')
<div class="container mt-3 pt-5">
{{--    <h2>Subjects <a class="btn btn-info" href="/subject-create">New Subject</a></h2>--}}
    <h2>Student <a class="btn btn-info" href="{{route('student.create')}}">New Student</a></h2>
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Class</th>
            <th>Gender</th>
            <th>Birthday</th>
            <th>Address</th>
            <th>photo</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{$loop->index+1}}</td>
            <th>{{$student->name}}</th>
            <th>{{$student->email}}</th>
            <th>{{$student->phone}}</th>
            <th>{{$student->school_class->name}}</th>
            <th>{{$student->gender}}</th>
            <th>{{$student->birthday}}</th>
            <th>{{$student->address}}</th>
            <th><img src="{{ Storage::url($student->photo) }}" height="75" width="75" alt="" /></th>
{{--            <th><img src="{{asset('/images/'.$student->photo)}}" width="100px"></th>--}}
            <td>
                <a href="{{route('student.edit',['id'=>$student->id])}}" class="btn btn-sm btn-info">Edit</a>
                <a href="{{route('student.del',['id'=>$student->id])}}" class="btn btn-sm btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
