<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\ClientPortal;
use App\Area;
use App\BusinessType;
use App\Status;
use App\DeleteClientRequest;
use DB;

class ClientPortalController extends Controller
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
        //dd(route('deleteRequest') );
        //dd(route('delete/businesstype') );
        $clients = ClientPortal::where('delete_bit', 0)->get();
        $areas = Area::all();
        $businesstypes = BusinessType::all();
        $status = Status::all();
        $deleteRequests = DeleteClientRequest::where('status', 0)->get()->count();
        return view('client_portal.portal', compact('clients', 'areas', 'businesstypes', 'status', 'deleteRequests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
                'title' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'business_type' => 'required',
                'area' => 'required',
                'status' => 'required',
        ])->validate();

        DB::beginTransaction();
        try
        {
            $data = $request->all();

            ClientPortal::create([
                'title' => $data['title'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'website' => $data['website'],
                'business_type' => $data['business_type'],
                'area_id' => $data['area'],
                'description' => $data['description'],
                'status' => $data['status'],
                'delete_bit' => 0,
            ]);

            DB::commit();
            //Session::flash('update', 'Data Saved Successfully');
            return response()->json([
                'data' => [
                  'msg' => 'success',

                ]
              ]);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json([
                'data' => [
                  'msg' => 'error',

                ]
              ]);
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
    public function edit()
    {
        DB::beginTransaction();
        try
        {  
            $id = $_GET['id'];
            $existClient = ClientPortal::find($id);        
         
            if(empty($existClient))
            {
                return "Client Does not exist";
            }

            
            return $existClient;
                
        } 
        catch(Exception $e){
            DB::rollback($e);
            return redirect()->back()->with('message', 'Error occured while deleting!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        DB::beginTransaction();
        try
        {
            $data = $request->all();

            ClientPortal::where('id', '=', $data['id'])->update([
                'title' => $data['title'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'website' => $data['website'],
                'business_type' => $data['business_type'],
                'area_id' => $data['area'],
                'description' => $data['description'],
                'status' => $data['status'],
            ]);

            DB::commit();
            //Session::flash('update', 'Data Saved Successfully');
            return response()->json([
                'response' => [
                  'msg' => 'success',

                ]
              ]);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json([
                'response' => [
                  'msg' => 'success',

                ]
              ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        DB::beginTransaction();
        try
        {
            $id = $_GET['id'];  
            $existClient = ClientPortal::find($id);        
         
            if(empty($existClient))
            {
                return "Client Does not exist";
            }

            ClientPortal::find($id)->update([
                'delete_bit' => 2,
            ]);
            DB::commit();
            return 1;
        } 
        catch(Exception $e){
            DB::rollback($e);
            return redirect()->back()->with('message', 'Error occured while deleting!');
        }
    }

    public function deleteRequest(Request $request){
      DB::beginTransaction();
        try
        {  
            $data = $request->all();
            
            $existClient = ClientPortal::find($data['id']);        
         
            if(empty($existClient))
            {
                return "Client Does not exist";
            }

            ClientPortal::find($data['id'])->update([
                'delete_bit' => 1,
            ]);
            DB::commit();

            DeleteClientRequest::create([
              'client_id' => $data['id'],
              'reason' => $data['reason'],
              ]);
            DB::commit();
            return 1;
        } 
        catch(Exception $e){
            DB::rollback($e);
            return -1;
        }
    }

    public function getClientDetails(){
      $id = $_GET['id'];

      $clientDetails = ClientPortal::with('businesstype','area','status')->where('id', $id)->get()->first();
      return $clientDetails;
    }
}
