<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function create()
	{
    	return view('contact');
    }

   	public function mail( ContactRequest $request)
	{
    	return view('contact');
    }
}
