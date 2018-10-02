<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;
use DB;
use Session;

class StatusController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){
    	$statuses = Status::where('is_deleted', '0')->get();
    	return view('status.view', compact('statuses'));
    }

    public function create(){
    	return view('status.create');
    }

    public function edit($id){

    	$status = Status::find($id);
    	return view('status.edit', compact('status', 'id'));
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

    public function delete($id){
        DB::beginTransaction();
        try
        {
            //$data = $request->all();
            $existStatus = Status::where('id', $id)->first();
            if($existStatus->is_deleted == 0){
                $existStatus->is_deleted = 1;
                $existStatus->save();
            }

            DB::commit();
            Session::flash('update', 'Status deleted Successfully');
            return redirect()->route('status/view')->with('update', 'Status Successfully Deleted');
        } catch (Exception $e) {
            DB::rollback();
            return back()->with('error_messages', 'Error in deleting Status');
        }
    }
}
