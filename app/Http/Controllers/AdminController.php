<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use PDF;
use Auth;
class AdminController extends DisplayController
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
        $this->middleware('admin');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     
     public function dashboard()
    {
        $user=Auth::user();
        $this->data['user']=$user;
        $this->data['skills']=$user->skills;
        
        return view('admin.dashboard',$this->data);
    }
     
     
     
     
     
    public function users()
    {
        $this->data['users']=User::all();
        var_dump($this->data);
        die();
        
        return view('admin.users',$this->data);
    }
    
    
    
    public function userPDF($id){
        $data=array();
        
        $pdf = PDF::loadView('pdf.user', $data);
        return $pdf->download('user.pdf');
    }
}
