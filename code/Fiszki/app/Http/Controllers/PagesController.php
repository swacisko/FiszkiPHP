<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(){
        return view( 'home' );
    }

    public function learning(){
        return view( 'learning' );
    }

    public function progress(){
        return view( 'progress' );
    }

    public function management(){
        return view( 'management' );
    }

}
