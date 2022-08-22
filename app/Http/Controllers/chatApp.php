<?php

namespace App\Http\Controllers;

use App\Events\guiTinnhan;
use Illuminate\Http\Request;

class chatApp extends Controller
{
    public function Chat(){
        return view('chatApp.chat');
    }
    public function mess(Request $Request){
          broadcast(new guiTinnhan(auth()->user(),$Request->input('tinNhandanhan')));
          return $Request->input('tinNhandanhan');
    }
    public function loginServerChat(){

    }
 }
