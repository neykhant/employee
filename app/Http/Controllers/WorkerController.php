<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {

        $employee = new Employee();
        $employee->first_name = $request->firstname;
        $employee->last_name = $request->lastname;
        $employee->gender = $request->gender;
        $employee->email = $request->email;
        $employee->phone = $request->phone;

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); //getting image extension
            $filename = time() . ' , ' . $extension;
            $file->move('uploads/employee/', $filename);
            $employee->image = $filename;
        } else {
            return $request;
            $employee->image = '';
        }

        $employee->save();
        //dd($employee->firstname);
        //dd($employee);


        // Employee::create([
        //     'first_name' => 'firstname',
        //     'last_name' => 'lastname',
        //     'gender' => 'gender',
        //     'email' => 'email',
        //     'phone' => 'phone',
        //     'image' => 'image'
        // ]);

        return redirect(route('employee.create'))->with('msg', 'New Employee has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::whereId($id)->firstOrFail();

        return view('employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::whereId($id)->firstOrFail();

        return view('employee.edit', compact('employee'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEmployeeRequest $request, $id)
    {
        $employee = Employee::whereId($id)->firstOrFail();

        $employee->first_name = $request->firstname;
        $employee->last_name = $request->lastname;
        $employee->gender = $request->gender;
        $employee->email = $request->email;
        $employee->phone = $request->phone;

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); //getting image extension
            $filename = time() . ' , ' . $extension;
            $file->move('uploads/employee/', $filename);
            $employee->image = $filename;
        } else {
            return $request;
            $employee->image = '';
        }

        $employee->save();

        return redirect( route('employee.index', $employee->id))->with('msg', "Employee '{$id}' has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::whereId($id)->firstOrFail();
        $employee->delete();
        return redirect(route('employee.index'))->with('secondary', "Employee '{$id}' has been deleted ");

    }
}
