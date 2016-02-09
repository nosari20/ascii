<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use PDF;
use Auth;
class UserController extends DisplayController
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
        
    }
    
    
    public function profile(){
        $user=Auth::user();
        $this->data['user']=$user;
        $this->data['skills']=$user->skills;
        
        return view('user.profile',$this->data);
    }
    
    public function dashboard()
    {
        $user=Auth::user();
        $this->data['user']=$user;
        $this->data['right']=$user->right;
        $this->data['skills']=$user->skills;
        
        return view('user.dashboard',$this->data);
    }
    
    
    
    
}


