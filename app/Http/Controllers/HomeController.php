<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends DisplayController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('guest');
        
    }

    
    public function index()
    {
        return view('public.home',$this->data);
    }
    
    public function office()
    {
        return view('public.office',$this->data);
    }
    
    public function location()
    {
        return view('public.location',$this->data);
    }
    
    public function news()
    {
        return view('public.news',$this->data);
    }
}
