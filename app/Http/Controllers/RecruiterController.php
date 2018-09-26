<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class RecruiterController extends Controller
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
        return view('recruiters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'bail|required|min:5|max:30',
            'email' => 'bail|required|email',
            'number' => 'bail|required|numeric',
            'country' =>'required'
        ]);

        $recruiter = new \App\Recruiter;
        $recruiter->name = $request->get('name');
        $recruiter->email = $request->get('email');
        $recruiter->number = $request->get('number');
        $recruiter->country = $request->get('country');

        $recruiter->save();
        return redirect('admin')->with('success', 'Information has been successfully added');
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
        $recruiter = \App\Recruiter::find($id);
        return view('recruiters.edit', compact('recruiter', 'id'));

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
        $recruiter = \App\Recruiter::find($id);
        $recruiter->name = $request->get('name');
        $recruiter->email = $request->get('email');
        $recruiter->number = $request->get('number');
        $recruiter->country = $request->get('country');

        $recruiter->save();
        return redirect('admin')->with('success', 'Information has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $recruiter = \App\Recruiter::find($id);
     $recruiter->delete();
     return redirect('admin')->with('success', 'Information has been successfully deleted');   
    }

    public function view(){
        $recruiters = \App\Recruiter::all();
        return view('recruiters.view', compact('recruiters'));
    }
}
