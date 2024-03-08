<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class OraganisatorController extends Controller
{
    public function index(){
        return view('organisation.dashboard');
    }
    

}
