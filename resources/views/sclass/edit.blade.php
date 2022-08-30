@extends('layout.main')
@section('content')
<div class="container mt-3 pt-5">
    <h2>Update Class</h2>
    <form method="POST" action="{{route('schoolClass.update',$schoolClass->id)}}">
        @csrf
        @method('put')
        <div class="mb-3 mt-3">
            <label for="subject" class="form-label">Class:</label>
            <input type="text" class="form-control" id="subject" placeholder="Enter subject name" name="name" value="{{$schoolClass->name}}">
            @error('name')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
