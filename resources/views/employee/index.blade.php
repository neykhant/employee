@extends('layouts.main')

@section('title','Home')

@section('content')

<div class="row">
    <div class="col">
        <h1>List of Employee</h1>
        <hr>

        @if(session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
        @endif

        @if(session('secondary'))
        <div class="alert alert-secondary">
            {{ session('secondary') }}
        </div>
        @endif

        <a href="{{ asset('/contact') }}" class="btn btn-primary">Add New Employee</a>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>first name</th>
                    <th>last name</th>
                    <th>gender</th>
                    <th>email</th>
                    <th>phone</th>
                    <th>image</th>
                </tr>
            </thead>

            <tbody>
                @foreach( $employees as $employee )
                <tr>
                    <td><a href="{{ route('employee.show', $employee->id ) }}">{{ $employee->id }}</a></td>
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->last_name }}</td>
                    <td>{{ $employee->gender }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <!-- <td>{{ $employee->image }}</td> -->
                    <td><img src="{{ asset('uploads/employee/' . $employee->image ) }}" width="100px" ; height="100px" ; alt="image"></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection