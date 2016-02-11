<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Skill;
use PDF;
use Auth;
use Illuminate\Support\Facades\Input;
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
    
    
    public function dashboard()
    {
        $user=Auth::user();
        $this->data['user']=$user;
        $this->data['right']=$user->right;
        $this->data['skills']=$user->skills;
        
        return view('user.dashboard',$this->data);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    //  AJAX //
    
    public function putProfile(){

        $user=Auth::user();
        $name=Input::get('name');
        $value=Input::get('value');
        $star=Input::get('star');
        if(!isset($star)){
            
            $user->$name=$value;
            $user->save();
            
        }else{
            

            $skill=Skill::where('user','=',$user->id)->where('name','=',$name)->firstOrFail();
            $skill->level=$value;
            $skill->save();
            

           
            
        }

        
       
        return  response()->json(array('response'=>'ok'));
    }
}


