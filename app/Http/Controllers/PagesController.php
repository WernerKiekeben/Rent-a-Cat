<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cars;

class PagesController extends Controller
{
    public function index(){
        $cars = Cars::take(8)->get();
        return view('pages.index')->with('cars', $cars);
    }

    public function about(){
        return view('pages.about');
    }

    public function contacts(){
        return view('pages.contacts');
    }
}
