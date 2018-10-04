<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use DB;
use Session;

class AreaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$areas = Area::where('is_deleted', '=', 0)->get();
    	return view('areas.view', compact('areas'));
    }

    public function create(){
    	return view('areas.create');
    }

    public function store(Request $request){

    	DB::beginTransaction();
        try
        {
        	$data = $request->all();

            Area::create([
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

    	$area = Area::find($id);
    	return view('areas.edit', compact('area', 'id'));
    }

    public function update(Request $request, $id){
    	DB::beginTransaction();
        try
        {
            $data = $request->all();
            $existArea = Area::where('id', $id)->first();
            $existArea->name = $data['name'];
            $existArea->save();

            DB::commit();
            Session::flash('update', 'Area Updated Successfully');
            return back()->with('update', 'Area Successfully Saved');
        } catch (Exception $e) {
            DB::rollback();
            return back()->with('error_messages', 'Error in Saving Area');
        }
    }

    public function changeStatus($id){
    	DB::beginTransaction();
        try
        {
            //$data = $request->all();
            $existArea = Area::where('id', $id)->first();
            if($existArea->status == 1){
            	$existArea->status = 0;
            }elseif ($existArea->status == 0) {
            	$existArea->status = 1;
            }

            $existArea->save();

            DB::commit();
            Session::flash('update', 'Area Updated Successfully');
            return back()->with('update', 'Area Successfully Saved');
        } catch (Exception $e) {
            DB::rollback();
            return back()->with('error_messages', 'Error in Saving Area');
        }
    }

    public function delete(){
        DB::beginTransaction();
        try
        {
            $id = $_GET['id'];
            $existArea = Area::where('id', $id)->first();
            if($existArea->is_deleted == 0){
                $existArea->is_deleted = 1;
                $existArea->save();
            }

            DB::commit();
            Session::flash('update', 'Area deleted Successfully');
            return 1;
        } catch (Exception $e) {
            DB::rollback();
            return back()->with('error_messages', 'Error in deleting Area');
        }
    }
}
