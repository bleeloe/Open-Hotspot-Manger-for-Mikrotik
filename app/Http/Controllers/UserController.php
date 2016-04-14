<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{


	/**
	 * Form Create User
	 *
	 * @return void
	 * @author 
	 **/
	public function create()
	{
		return view('user.create');
	}

	/**
	 * UserCreate
	 *
	 * @return void
	 * @author harylalamentik@gmail.com
	 **/
	public function store(Request $request)
	{		
		$data = new \App\User;
		$data->name = $request->input('name');
		$data->email = $request->input('email');
		$data->password = \Hash::make($request->input('password'));		
		$data->save();
		return redirect('/user/register')->with('message','Saved');
	}

	/**
	 * Display Profile
	 *
	 * @return void
	 * @author harylalamentik@gmail.com
	 **/
	public function profile(Request $request)
	{		
		return view('user.profile',['data' => \App\User::find(Auth::user()->id)]);
	}
	/**
	 * Profile update
	 *
	 * @return void
	 * @author harylalamentik@gmail.com
	 **/
	public function update(Request $request)
	{		
		$data = \App\User::find(Auth::user()->id);
		$data->name = $request->input('name');
		$data->email = $request->input('email');
		if ($request->has('password')) {			
			$data->password = \Hash::make($request->input('password'));
		}			
		$data->save();
		return redirect('/u/profile')->with('message','Saved');
	}
}
