<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DeleteClientRequest;
use App\ClientPortal;
use App\Area;
use App\Status;
use DB;

class DeleteRequestController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
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
              'status' => 0,
              ]);
            DB::commit();
            return 1;
        } 
        catch(Exception $e){
            DB::rollback($e);
            return -1;
        }
    }

    public function deleteClientRequest(){
    	//dd(route('approveRequest'));
        $deleteRequests = DeleteClientRequest::where('status', 0)->get()->count();
        $requests = DeleteClientRequest::with('client')->where('status', 0)->get();
        
        // /dd($requests);
        // echo"<pre>";
        // print_r($requests);
        // die();

        return view('requests.delete_client_requests', compact('deleteRequests', 'requests', 'areas', 'status'));
    }

    public function approveRequest(){
    	DB::beginTransaction();
        try
        {
    	
	    	$id = $_GET['id'];
	    	//dd($id);
	    	$existClient = ClientPortal::find($id);

	    	if(empty($existClient)){
	    		return redirect()->back();
	    	}

	    	ClientPortal::find($id)->update([
	    		'delete_bit' => 2,
	    		]);
	    	DB::commit();

	    	DeleteClientRequest::where('client_id', $id)->update([
	    		'status' => 1,
	    		]);

	    	DB::commit();
	    	return 1;
	    } catch(Exception $e){
	    	DB::rollback();
	    	return redirect()->back();
	    }
    }

    public function declineRequest(){
    	DB::beginTransaction();
        try
        {
    	
	    	$id = $_GET['id'];
	    	//dd($id);
	    	$existClient = ClientPortal::find($id);

	    	if(empty($existClient)){
	    		return redirect()->back();
	    	}

	    	ClientPortal::find($id)->update([
	    		'delete_bit' => 0,
	    		]);
	    	DB::commit();

	    	$request = DeleteClientRequest::where('client_id', $id);
	    	$request->delete();

	    	DB::commit();
	    	return 1;
	    } catch(Exception $e){
	    	DB::rollback();
	    	return redirect()->back();
	    }
    }
}
