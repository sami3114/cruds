@extends('layout.main')
@section('content')
<div class="container mt-3 pt-5">
    <h2>Add Subject</h2>
    <form method="POST" action="{{route('subject.store')}}">
        @csrf
        <div class="mb-3 mt-3">
            <label for="subject" class="form-label">Subject:</label>
            <input type="text" class="form-control" id="subject" placeholder="Enter class name" name="subject_name">
            @error('subject_name')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="sclass" class="form-label">Select Class:</label>
            <select class="form-select" name="school_classes_id">
                @foreach($sclasses as $sclass)
                <option value="{{$sclass->id}}">{{$sclass->name}}</option>
                @endforeach
            </select>

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
