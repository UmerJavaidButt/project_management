<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;
use DB;
use App\DeleteClientRequest;
use Session;

class StatusController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){
        $deleteRequests = DeleteClientRequest::where('status', 0)->get()->count();
    	$statuses = Status::where('is_deleted', '0')->get();
    	return view('status.view', compact('statuses', 'deleteRequests'));
    }

    public function create(){
        $deleteRequests = DeleteClientRequest::where('status', 0)->get()->count();
    	return view('status.create', compact('deleteRequests'));
    }

    public function store(Request $request){
        DB::beginTransaction();
        try
        {
            $data = $request->all();

            Status::create([
                'name' => $data['name'],
                'label_color' => $data['color'],
                'status' => 1,
                'is_deleted' => 0,
            ]);

            DB::commit();
            Session::flash('update', 'Data Saved Successfully');
            return back()->with('update', 'Data Successfully Saved');
        } catch (Exception $e) {
            DB::rollback();
            return back()->with('error_messages', 'Error in Saving data');
        }
    }

    public function edit($id){
        $deleteRequests = DeleteClientRequest::where('status', 0)->get()->count();
    	$status = Status::find($id);
    	return view('status.edit', compact('status', 'id', 'deleteRequests'));
    }

    public function update(Request $request, $id){
    	DB::beginTransaction();
        try
        {
            $data = $request->all();
            $existStatus = Status::where('id', $id)->first();
            $existStatus->name = $data['name'];
            $existStatus->save();

            DB::commit();
            Session::flash('update', 'Status Updated Successfully');
            return back()->with('update', 'Status Successfully Saved');
        } catch (Exception $e) {
            DB::rollback();
            return back()->with('error_messages', 'Error in Saving Status');
        }
    }

    public function changeStatus($id){
    	DB::beginTransaction();
        try
        {
            //$data = $request->all();
            $existStatus = Status::where('id', $id)->first();
            if($existStatus->status == 1){
            	$existStatus->status = 0;
            }elseif ($existStatus->status == 0) {
            	$existStatus->status = 1;
            }

            $existStatus->save();

            DB::commit();
            Session::flash('update', 'Status Changed Successfully');
            return back()->with('update', 'Status Successfully Changed');
        } catch (Exception $e) {
            DB::rollback();
            return back()->with('error_messages', 'Error in Changing Status');
        }
    }

    public function delete(){
        DB::beginTransaction();
        try
        {
            $id = $_GET['id'];
            $existStatus = Status::where('id', $id)->first();
            if($existStatus->is_deleted == 0){
                $existStatus->is_deleted = 1;
                $existStatus->save();
            }

            DB::commit();
            Session::flash('update', 'Status deleted Successfully');
            return 1;
        } catch (Exception $e) {
            DB::rollback();
            return back()->with('error_messages', 'Error in deleting Status');
        }
    }
}
