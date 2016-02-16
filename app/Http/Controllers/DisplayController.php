<?php

namespace App\Http\Controllers;
use Auth;


class DisplayController extends Controller{
    
    
  
    protected $data=array();
    
    public function __construct()
    {
        //General data
        $user=Auth::user();
        if($user){
            $this->data['user']=$user;
            $this->data['right']=$user->right;
        }

    }
    
    
    
    
    
    
    
    
    
    
}