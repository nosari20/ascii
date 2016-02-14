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
    
    public function addSkill(){
        $user=Auth::user();
        
        $name=Input::get('skill');
  
        $stars=Input::get('level');
        
        $skill=Skill::where('user','=',$user->id)->where('name','=',$name);
        if($skill->count()>0){
            $skill=$skill->first();
            $rep='old';
        }else{
           $skill=new Skill(); 
           $rep='new';
        }
        
        
        $skill->user=$user->id;
        $skill->name=$name;
        $skill->level=$stars;
        $skill->save();
        
        return  response()->json(array('response'=>$rep,'skill'=>$skill->toArray()));
    }
    
    
    public function putImage(){

        $user=Auth::user();
        
        
        if (Input::has('image-data')) {
            
            
            
            $dir='upload/user/';
            $file = $user->id.'.png';
            $data = Input::get('image-data');
            list($t, $data) = explode(';', $data);
            list($t, $data)  = explode(',', $data);
            $src = base64_decode($data);
            
            if(file_exists($dir.$file)){
                unlink($dir.$file);
            }
            
            file_put_contents($dir.$file, $src);
            
            $user->image=$file;
            $user->save();
         
            
            
        }
        return  response()->json(array('img'=>$dir.$file));
        
        
        
    }
}


