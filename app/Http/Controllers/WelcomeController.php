<?php

namespace App\Http\Controllers;

use App\Category;
use App\Movie;

class WelcomeController extends Controller
{
    public function index()
    {

        return view('welcome');

    }// end of index

}//end of controller
