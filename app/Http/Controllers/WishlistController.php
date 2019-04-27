<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function create()
	{
    	return view('wishlist');
    }
}
