<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    // Homepage
    public function index() {    	
    	return view('index');
    }
}
