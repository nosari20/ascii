<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Events;
use App\News;

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
        $news = News::orderBy('date', 'desc')->get();
        $this->data['news']=$news;
        return view('public.news',$this->data);
    }
    
    public function calendar()
    {
        return view('public.calendar',$this->data);
    }
    
    
    
    
    
    
    
    
    
    
    //Ajax
    
     public function events()
    {
        $events=Events::all();
        
        return  response()->json($events);
      
        
        
        
        
    }
}
