@extends('layouts.main')

@section('title','Contact')

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
                    <input type="text" name="firstname"  id="first" class="form-control">
                </div>

                <div class="form-group">
                    <label for="last">Last Name</label>
                    <input type="text" name="lastname"  id="last" class="form-control">
                </div>

                <div class="form-group">
                    <label for="gender">Gender</label>
                    <input type="text" name="gender" id="gender" class="form-control">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control">
                </div>

                <!-- <div class="form-group">
                    <label for="image">Image</label>
                    <input type="text" name="image" id="image" class="form-control">
                </div> -->

                <div>
                    <label for="image">Image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input">
                            <label for="" class="custom-file-label">Choose File</label>
                        </div>
                    </div>
                </div>
                <br><br>

                <button type="submit" class="btn btn-primary">Add New Employee</button>
            </form>
        </div>
    </div>
</div>
@endsection