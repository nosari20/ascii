<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/






Route::group(['middleware' => 'web'], function () {
    
    //**       Public      **//
        Route::get('/',  [
            'as' => 'home', 'uses' =>'HomeController@index']
        );
        Route::get('/news',  [
            'as' => 'news', 'uses' =>'HomeController@news']
        );
        Route::get('/office',  [
            'as' => 'office', 'uses' =>'HomeController@office']
        );
        Route::get('/location',  [
            'as' => 'location', 'uses' =>'HomeController@location']
        );
        Route::get('/calendar',  [
            'as' => 'calendar', 'uses' =>'HomeController@calendar']
        );
        
        
        //Ajax 
            Route::get('/event',  [
                'as' => 'events', 'uses' =>'HomeController@events']
            );
    
    //**        Authentication      **//
        Route::auth();
    
    
    
    
    //**        Users       **//
        Route::get('/profile',  [
            'as' => 'user_dashboard', 'uses' =>'UserController@dashboard']
        );
        
        //Ajax
             Route::put('/edit',  [
                'as' => 'edit', 'uses' =>'UserController@putProfile']
            );
            Route::put('/edit-image',  [
                'as' => 'edit_image', 'uses' =>'UserController@putImage']
            );
             Route::post('/add-skill',  [
                'as' => 'add_skill', 'uses' =>'UserController@addSkill']
            );
            
            
            
            
        
    //**        Writers     **//
        Route::get('/writer/users',  [
            'as' => 'writer_users', 'uses' =>'WriterController@users']
        );
        Route::get('/edit-calendar',  [
            'as' => 'edit_calendar', 'uses' =>'WriterController@calendar']
        );
        
        Route::get('/edit-news',  [
            'as' => 'edit_news', 'uses' =>'WriterController@news']
        );
        
        //Ajax
             Route::post('/event',  [
                'as' => 'add_event', 'uses' =>'WriterController@addEvent']
            );
            Route::put('/event',  [
                'as' => 'mod_event', 'uses' =>'WriterController@modEvent']
            );
             Route::post('/news',  [
                'as' => 'add_news', 'uses' =>'WriterController@addNews']
            );
            
        
        
    
    
    
    
    //**        Admin     **//
        Route::get('/admin/users',  [
            'as' => 'admin_users', 'uses' =>'AdminController@users']
        );
        Route::get('/admin/users/pdf/{id}',  [
            'as' => 'admin_users_pdf', 'uses' =>'AdminController@userPDF']
        );
    
    
    
    
    
    
    
    
    


   
});
