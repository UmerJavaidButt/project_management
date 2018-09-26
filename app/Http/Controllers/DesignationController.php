<?php

namespace App\Http\Controllers;

use App\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
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
        return view ('designations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $designation = new \App\Designation;
        $designation->designation = $request->get('designation');

        $designation->save();
        return redirect()->route('designation/view')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function show(Designation $designation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $designation = \App\Designation::find($id);
        return view('designations.edit', compact('designation', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $designation = \App\Designation::find($id);
        $designation->designation = $request->get('designation');

        $designation->save();
        return redirect()->route('designation/view')->with('success', 'Information has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $designation = \App\Designation::find($id);

        $designation->delete();
        return redirect('admin/dashboard')->with('success', 'Information has been deleted');
    }

    public function view(){
        $designations = \App\Designation::all();
        return view('designations.view', compact('designations'));
    }
}
