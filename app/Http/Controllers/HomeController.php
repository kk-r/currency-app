<?php

namespace App\Http\Controllers;

use App\Currency;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home($value='')
    {
    	return view('welcome');
    }

    public function dashboard($value='')
    {

    	return view('backEnd.dashboard', ['currencies' => Currency::pluck('code')]);
    }
}
