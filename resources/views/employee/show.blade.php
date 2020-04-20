@extends('layouts.main')

@section('title','Show Employee')

@section('content')

<div class="row justify-content-center" style="margin: 20px 0";>
    <div class="col-md-4">   
        <div class="card">
            <div class="card-body">
               <p><strong>First Name</strong> {{ $employee->first_name }}</p>
               <p><strong>Last Name</strong> {{ $employee->last_name }}</p>
               <p><strong>Gender</strong> {{ $employee->gender }}</p>
               <p><strong>Email</strong> {{ $employee->email }}</p>
               <p><strong>Phone</strong> {{ $employee->phone }}</p>
               <p><strong>Image</strong> <img src="{{ asset('uploads/employee/' . $employee->image ) }}" width="100px"; height="100px"; alt=""></p>
                <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-primary">Edit</a>

                <!-- //for delete -->
                <a
                 href="#"
                 onclick="event.preventDefault(); document.getElementById('delete-form').submit();"
                 class="btn btn-danger">Delete</a>

                <form id="delete-form" action="{{ route('employee.destroy', $employee->id ) }}" 
                    method="post" style="display: none">
                    @csrf
                    @method('delete')

                </form>
            </div>
        </div>
    </div>
</div>

@endsection