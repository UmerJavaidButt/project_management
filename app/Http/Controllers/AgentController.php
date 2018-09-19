<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AgentController extends Controller
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
        return view ('agents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $agent = new \App\Agent;

            $agent->name = $request->get('name');
            $agent->email = $request->get('email');
            $agent->number =  $request->get('number');
            $agent->address = $request->get('address');
            $agent->country = $request->get('country');
            if ($request->get('whatsapp')) {
                $agent->whatsapp = $request->get('whatsapp');   
            }
            $agent->share = $request->get('share');
            $agent->description = $request->get('description');

            $agent->save();
            DB::commit();

            return redirect('admin')->with('success', 'Information has been added');
        } catch(Exception $e){
            DB::rollback();
        }
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
        $agent = \App\Agent::find($id);
        return view('agents.edit', compact('agent', 'id'));
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
        DB::beginTransaction();
        try{
            $agent = \App\Agent::find($id);

            $agent->name = $request->get('name');
            $agent->email = $request->get('email');
            $agent->number =  $request->get('number');
            $agent->address = $request->get('address');
            $agent->country = $request->get('country');
            if ($request->get('whatsapp')) {
                $agent->whatsapp = $request->get('whatsapp');   
            }
            $agent->share = $request->get('share');
            $agent->description = $request->get('description');

            $agent->save();
            DB::commit();

            return redirect('admin')->with('success', 'Information has been updated successfully');
        } catch(Exception $e){
            DB::rollback();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agent = \App\Agent::find($id);
        $agent->delete();
        return redirect('admin')->with('success','Information has been  deleted');
    }

     public function view()
    {
        $agents = \App\Agent::all();
        return view('agents.view',compact('agents'));
    }
}
