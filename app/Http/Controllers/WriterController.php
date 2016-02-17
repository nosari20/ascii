<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Event;
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
        $event=Input::get();
        
        $input = 'd/m/Y H:i';
        $output= 'm/d/Y H:i';
        
        $start=\DateTime::createFromFormat($input, $event['start']);
        $end=\DateTime::createFromFormat($input, $event['end']);
        
        $event['start'] = date_format($start, $output);
        $event['end'] = date_format($end, $output);
        
       
        

        $e=new Event();
        $e->title=$event['title'];
        $e->type="";
        $e->start=$start;
        $e->end=$end;
        $e->save();

        $event['id'] = $e->id;
        
        
        return  response()->json(array('response'=>'ok','event'=>$event));
      
    }
    
    
    public function modEvent(){
        $user=Auth::user();
        $input=Input::get();
        
        $inputf = 'm/d/Y H:i';
        $start=\DateTime::createFromFormat($inputf, $input['start']);
        $end=\DateTime::createFromFormat($inputf, $input['end']);
        
      
        
        
        $event=Event::findOrfail($input['id']);
        var_dump($input['start']);
        var_dump($event->start);
        $event->title=$input['title'];
        $event->start=$start;
        $event->end=$end;
        $event->save();
        var_dump($event->start);
        
        //return  response()->json(array('response'=>'ok','event'=>$event));
      
    }
    
    
    
    
    
}
