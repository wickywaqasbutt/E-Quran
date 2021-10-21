<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Property;
use Auth;

class PropertyController extends Controller
{
	public function index()
	{
	$pro = Property::all();
	return view('index')->with('pros', $pro);
	}

	public function role(Request $request)
	{
		if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 2]))
		{
    		return 2;
		}
		else if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 1]))
		{
    		return 1;
		}
		else
		{
			$request->session()->regenerate();
			return 0;
		}
	}
}