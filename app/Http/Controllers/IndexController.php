<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class IndexController extends Controller
{
    function index(){
        return View('index',['pageTitle'=>'Home Page']);
    }

    function about(){
        return View('about',['pageTitle'=>'About Page']);
    }

    function contact(){
        return View('contact',['pageTitle'=>'Contact Page']);
    }
}
