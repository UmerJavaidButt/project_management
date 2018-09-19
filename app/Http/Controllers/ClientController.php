<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Clients;
use App\Project;
use DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $client = Clients::all();
        // return view ('clients.index', array('clients' => $client));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$project = Project::find($id);
        return view ('clients.create');
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
            $client = new \App\Clients;

            $client->name = $request->get('name');
            $client->email = $request->get('email');
            $client->number = $request->get('number');
            $client->whatsapp = $request->get('whatsapp');
            $client->website = $request->get('website');
            $client->business = $request->get('business');
            $client->address = $request->get('address');
            $client->country = $request->get('country');
            $client->description =  $request->get('description');

            $client->save();
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
        $client = \App\Clients::find($id);
        return view('clients.edit', compact('client', 'id'));
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
            $client = Clients::find($id);

            $client->name = $request->get('name');
            $client->email = $request->get('email');
            $client->number = $request->get('number');
            $client->whatsapp = $request->get('whatsapp');
            $client->website = $request->get('website');
            $client->business = $request->get('business');
            $client->address = $request->get('address');
            $client->country = $request->get('country');
            $client->description =  $request->get('description');

            $client->save();
            DB::commit();

            return redirect('admin')->with('success', 'Information has been added');
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
        $client = \App\Clients::find($id);
        $client->delete();
        return redirect('admin')->with('success','Information has been  deleted');
    }

     public function views()
    {
        $clients = Clients::all();
        return view('clients.view',compact('clients'));
    }
}
