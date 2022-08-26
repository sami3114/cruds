@extends('layout.main')
@section('content')
<div class="container mt-3 pt-5">
    <h2>Update Subject</h2>
    <form method="POST" action="{{route('subject.update',['id'=>$subject->id])}}">
        @csrf
        @method('put')
        <div class="mb-3 mt-3">
            <label for="subject" class="form-label">Subject:</label>
            <input type="text" class="form-control" id="subject" placeholder="Enter subject name" name="name" value="{{$subject->subject_name}}">
            @error('name')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="sclass" class="form-label">Select Class:</label>
            <select class="form-select" name="sclass">
                @foreach($sclasses as $sclass)
                        <option value="{{$sclass->id}}" {{ $sclass->id === $subject->school_class->id ? 'selected' : ''}}>{{$sclass->name}}</option>
                @endforeach
            </select>

        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
