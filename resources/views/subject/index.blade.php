@extends('layout.main')
@section('content')
<div class="container mt-3 pt-5">
{{--    <h2>Subjects <a class="btn btn-info" href="/subject-create">New Subject</a></h2>--}}
    <h2>Subjects <a class="btn btn-info" href="{{route('subject.create')}}">New Subject</a></h2>
    <table id="myTable" class="table">
        <thead>
        <tr>
            <th>Id</th>

            <th>Subject Name</th>
            <th>Class</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($subjects as $subject)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$subject->subject_name}}</td>
            <td>{{$subject->school_class->name}}</td>
            <td>
                <form action="{{ route('subject.destroy',['subject'=>$subject->id]) }}" method="POST">
                    <a href="{{route('subject.edit',['subject'=>$subject->id])}}" class="btn btn-sm btn-info">Edit</a>
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
