<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KitchenController extends Controller
{
    public function create()
	{
    	return view('kitchen');
    }
}
