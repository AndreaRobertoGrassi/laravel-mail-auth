<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function testApi(){
        return response()-> json([
            'hello'=>'world'
        ]);
    }
}
