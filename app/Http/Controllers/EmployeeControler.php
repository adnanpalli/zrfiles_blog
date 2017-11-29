<?php

namespace App\Http\Controllers;
use App\Employee;

use Illuminate\Http\Request;

class EmployeeControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("employee.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
        'first_name' => 'required|max:64',
        'last_name' => 'required|max:64',
        'email' => 'required|email|max:255',
        'designation' => 'required|max:255',
        'date_of_birth' => 'required|date',
        'date_of_join' => 'required|date',
        'nationality' => 'required',
        'contact_no' => 'required',
        ]);

        $emp = new Employee();
        $emp->emp_no = $request->emp_no;
        $emp->first_name = $request->first_name;
        $emp->last_name = $request->last_name;
        $emp->email = $request->email;
        $emp->designation = $request->designation;
        $emp->date_of_birth = $request->date_of_birth;
        $emp->date_of_join = $request->date_of_join;
        $emp->nationality = $request->nationality;
        $emp->contact_no = $request->contact_no;

        $emp->save();

        $request->session()->flash('success', 'Employee created successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
