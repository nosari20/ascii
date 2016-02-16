<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Input;
class WriterController extends DisplayController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
        $this->middleware('writer');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function users()
    {
        $this->data['users']=User::all();
        var_dump($this->data);
        die();
        
        return view('admin.users',$this->data);
    }
    
    
    
    
    public function calendar()
    {
        
        
        return view('writer.dashboard-calendar',$this->data);
    }
    
    
    
    
    
    
    
    
    //Ajax
    public function addEvent(){
        $user=Auth::user();
        var_dump(Input::get());
        
      
    }
    
    
}
