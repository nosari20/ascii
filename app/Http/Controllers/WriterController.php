<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Events;
use App\News;
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
    
     
    public function news()
    {
        $news = News::orderBy('date', 'desc')->get();
        $this->data['news']=$news;
        
        return view('writer.dashboard-news',$this->data);
    }
    
    
    
    
    
    
    
    //Ajax
    public function addEvent()
    {
        $user=Auth::user();
        $event=Input::get();
        
        $input = 'd/m/Y H:i';
        $output= 'm/d/Y H:i';
        
        
       
        
        $start=\DateTime::createFromFormat($input, $event['start']);
        $end=\DateTime::createFromFormat($input, $event['end']);
        
        if($start==$end){
            $end->add(new \DateInterval('PT1H'));
        }
        
        $event['start'] = date_format($start, $output);
        $event['end'] = date_format($end, $output);
        
       
        $eobj=Events::find($event['id']);
        if($eobj==null){
           $e=new Events(); 
           $action="add";
        }else{
            $e=$eobj;
            $action="refresh";
        }

        
        $e->title=$event['title'];
        $e->type="";
        $e->start=$start;
        $e->end=$end;
        $e->save();

        $event['id'] = $e->id;
        
        
        return  response()->json(array('response'=>$action,'event'=>$event));
      
    }
    
    
    public function modEvent()
    {
        $user=Auth::user();
        $input=Input::get();
        
        $inputf = 'm/d/Y H:i';
        
        if(Input::has('start'))
        $start=\DateTime::createFromFormat($inputf, $input['start']);
        
        if(Input::has('end'))
        $end=\DateTime::createFromFormat($inputf, $input['end']);
        
      
        
        
        $event=Events::findOrfail($input['id']);
        
        if(Input::has('title'))
        $event->title=$input['title'];
        if(Input::has('desc'))
        $event->desc=$input['desc'];
        
        if(Input::has('start'))
        $event->start=$start;
        
        if(Input::has('end'))
        $event->end=$end;
        
        $event->save();
        
        
        return  response()->json(array('response'=>'ok','event'=>$event));
      
    }
    
    
    
    public function addNews()
    {
        
        
        
        $inputf = 'd/m/Y H:i';
        $date=\DateTime::createFromFormat($inputf, Input::get('date'));


      
        
        $new=new News();
        $new->title=Input::get('title');
        $new->date=$date;
        $new->content=Input::get('desc');
        $new->cat=Input::get('cat');
        $new->save();
        
        return  response()->json(array('response'=>'ok','news'=>Input::get())); 
        
        


    }
    
    
    
    
    
}
