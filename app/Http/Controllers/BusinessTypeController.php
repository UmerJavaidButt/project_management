<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusinessType;
use DB;
use Session;

class BusinessTypeController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$businesstypes = BusinessType::where('is_deleted', '=', '0')->get();
    	return view('businesstype.view', compact('businesstypes'));
    }

    public function create(){
    	return view('businesstype.create');
    }

    public function store(Request $request){

    	DB::beginTransaction();
        try
        {
        	$data = $request->all();

            BusinessType::create([
            	'name' => $data['name'],
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

    	$businesstype = BusinessType::find($id);
    	return view('businesstype.edit', compact('businesstype', 'id'));
    }

    public function update(Request $request, $id){
    	DB::beginTransaction();
        try
        {
            $data = $request->all();
            $existBusinessType = BusinessType::where('id', $id)->first();
            $existBusinessType->name = $data['name'];
            $existBusinessType->save();

            DB::commit();
            Session::flash('update', 'Business Type Updated Successfully');
            return back()->with('update', 'Business Type Successfully Saved');
        } catch (Exception $e) {
            DB::rollback();
            return back()->with('error_messages', 'Error in Saving Business Type');
        }
    }

    public function changeStatus($id){

        DB::beginTransaction();
        try
        {
            //$data = $request->all();
            $existBusinessType = BusinessType::where('id', $id)->first();
            if($existBusinessType->status == 1){
                $existBusinessType->status = 0;
            }elseif ($existBusinessType->status == 0) {
                $existBusinessType->status = 1;
            }

            $existBusinessType->save();

            DB::commit();
            Session::flash('update', 'Business Type Status changed Successfully');
            return back()->with('update', 'Business Type Status Successfully Changed');
        } catch (Exception $e) {
            DB::rollback();
            return back()->with('error_messages', 'Error in Changing Business Type Status');
        }
    }

    public function delete()
    {

        DB::beginTransaction();
        try
        {
            $id = $_GET['id'];
            //echo ($id);
            //die();

            $existBusinessType = BusinessType::where('id', $id)->first();
                if($existBusinessType->is_deleted == 0){
                    $existBusinessType->is_deleted = 1;
                    $existBusinessType->save();
                }

                DB::commit();
                return 1;
        } catch (Exception $e) {
            DB::rollback();
            return response()->json([
                'data' => [
                  'msg' => 'Error',

                ]
              ]);
        }
    }
}
