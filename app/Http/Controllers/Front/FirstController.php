<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FirstController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth')->except('showString3');
    }
    public function showString1(){
        return 'static string1';
    }
    public function showString2(){
        return 'static string2';
    }
    public function showString3(){
        return 'static string3';
    }
}
