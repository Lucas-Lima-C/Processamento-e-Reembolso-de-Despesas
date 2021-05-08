<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PendingController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    } 
    
    public function index() {
        return view('pending');
    }
}
