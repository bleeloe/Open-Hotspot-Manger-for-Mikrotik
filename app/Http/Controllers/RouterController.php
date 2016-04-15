<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RouterController extends Controller
{
    /**
     * Show Router Config Form
     *
     * @return void
     * @author 
     **/
    public function edit(Request $Request)
    {    	    	
    	return view('router.mikrotik.edit',['data'=>\App\Mikrotik::find(1)]);
    }


    /**
     * Update Router Config
     *
     * @return void
     * @author 
     **/
    public function update(Request $request)
    {    		
        
    	$data = \App\Mikrotik::find(1);
        $data->name = $request->input('name');
    	$data->user = $request->input('user');
    	if ($request->has('pass')) {    		
    		$data->pass = \Crypt::encrypt($request->input('pass'));
    	}    	
        $data->ipaddress = $request->input('ipaddress');
    	$data->port = $request->input('port');
    	$data->is_active = $request->input('is_active');
    	$data->save();
    	return redirect('/router')->with('message','Saved');
    }

}
