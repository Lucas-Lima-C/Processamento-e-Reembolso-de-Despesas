<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    } //Dentro desse middleware você pode controlar onde o "admin" pode acessar de acordo com o arquivo auth e seus guardas
    
    public function index() {
        return view('admin');
    }
}
