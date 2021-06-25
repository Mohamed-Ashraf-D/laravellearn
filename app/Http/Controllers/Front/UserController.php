<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;

class UserController extends Controller
{
   public function showAdminName(){
       return "Mohamed Ashraf";
   }
   public function getIndex(){
       $data=[];
//       $data['name']='Mohamed Ashraf';
//       $data['age']='24';
//       $data['job']='Software Developer';
       $obj = new \stdClass();
       $obj -> name='Mohamed Ashraf Mohamed';
       $obj -> age ='24';
       $obj -> job ='Software Developer';
       return view('welcome',compact('data'));
   }
   public function showLanding(){
       return view('landing');
   }
   public function showAbout(){
       return view('about');
   }
}
