<?php

namespace App\Http\Controllers;

//namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use DB;

use Illuminate\Http\Request;

class RolesController extends Controller
{
    use RegistersUsers;

    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    public function registerRole(){
    	return view('roles.register_agent');
    }

    public function registerAgent(Request $request){
    	$data = $request->all();

    	DB::beginTransaction();
    	try{
    		User::create([
	            'name' => $data['name'],
	            'email' => $data['email'],
	            'password' => Hash::make($data['password']),
	            'type' => User::AGENT_TYPE,
        	]);

        	DB::commit();
        	return redirect()->route('admin')->with('message', 'Agent Saved Successfully');
    	} catch(Excepton $e)
    	{
    		DB::rollback();
    		return redirect()->route('admin')->with('message', 'Agent Saved Successfully');
    	}
    }
}
