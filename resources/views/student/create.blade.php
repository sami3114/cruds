@extends('layout.main')
@section('content')
<div class="container mt-3 pt-5">
    <h2 class="pb-3"> Add Student</h2>
    @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif
    <form method="POST" action="{{route('student.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{ old('name') }}">
                @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ old('email') }}">
                @error('email')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="pwd" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" value="{{ old('password') }}">
                @error('pwd')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="phone" class="col-sm-2 col-form-label">Phone No:</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="phone" placeholder="Enter phone number" name="phone" value="{{ old('phone') }}">
                @error('phone')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Class</label>
            <div class="col-sm-10">
                <select class="form-select" name="school_class_id">--}}
                    @foreach($sclasses as $sclass)
                        <option value="{{$sclass->id}}">{{$sclass->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Gender</label>
            <div class="col-sm-10">
                <select class="form-select" name="gender">
                    <option value="male" selected>Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Birthday</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="subject" name="birthday" value="{{ old('birthday')}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="5" id="address" name="address">{{old('address')}}</textarea>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Student Image</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="subject" name="photo">
                @error('photo')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
