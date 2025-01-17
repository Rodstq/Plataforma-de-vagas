<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        return view('index');
    }

    public function create(){
        return view('events.create');
    }

    public function contact(){
        return view('contact');
    }

    public function login(){
        return view('login');
    }

    public function about(){
        return view('about');
    }

    public function users($id){
        $search = request('search');
        return view('users', ['id'=>$id, 'search' => $search]);
    }

    public function register(){
        return view('register');
    }
}
