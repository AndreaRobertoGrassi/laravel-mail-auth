<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\TestMail;

class HomeController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $mail= Auth::user()-> email;      //email dell'utente collegato
        // Mail::to($mail)->send(new TestMail('ciao'));          //mando il TestMail a quell'indirizzo 
        return view('home');
    }

    public function sendMail(Request $request){

        // $data =$request-> all();                          il validator si può fare cosi però importando: use Illuminate\Support\Facades\Validator;
        // Validator::make($data,[
        //     'mailText'=> 'required|min:5'
        // ])->validate();

        $data = $request -> validate([                     //altrimenti si può fare così
            'mailText'=> 'required|min:5'
        ]);
        
        $mail= Auth::user()-> email;
        Mail::to($mail)->send(new TestMail($data['mailText']));
        return redirect()-> back();
    }
}
