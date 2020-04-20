@extends('layouts.main')

@section('title','Edit A Employee')

@section('content')
<div class="row">
    <div class="col">
        <div class="wrapper" style=" width:500px; max-width:500px; margin:20px auto; ">
            <h1 class="text-center">Add New Employee</h1>
            <hr>

            @if ($errors->any())
            <div class="alert  alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if(session('msg'))
            <div class="alert alert-success">
                {{ session('msg') }}
            </div>
            @endif

            <form action=" " method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="first">First Name</label>
                    <input type="text" name="firstname" value="{{ $employee->first_name }}"  id="first" class="form-control">
                </div>

                <div class="form-group">
                    <label for="last">Last Name</label>
                    <input type="text" name="lastname" value="{{ $employee->last_name }}"  id="last" class="form-control">
                </div>

                <div class="form-group">
                    <label for="gender">Gender</label>
                    <input type="text" name="gender" value="{{ $employee->gender }}" id="gender" class="form-control">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" value="{{ $employee->email }}" id="email" class="form-control">
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" value="{{ $employee->phone }}" id="phone" class="form-control">
                </div>

                <!-- <div class="form-group">
                    <label for="image">Image</label>
                    <input type="text" name="image" id="image" class="form-control">
                </div> -->

                <div>
                    <label for="image">Image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file"  name="image" class="custom-file-input">
                            <label for="" class="custom-file-label">Choose File</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <!-- <label for="phone">Phone</!--> 
                    <!-- <input type="text" name="phone" value="{{ $employee->phone }}" id="phone" class="form-control"> -->
                    <img src="{{ asset('uploads/employee/' . $employee->image ) }}" width="50"; height="50px"; alt="">
                </div>
                
                <br><br>
                <a href="{{ route('employee.show', $employee->id) }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Update Employee</button>
            </form>
        </div>
    </div>
</div>
@endsection