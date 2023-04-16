<?php

namespace App\Http\Controllers;

use App\Mail\MailContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Contactcontroller extends Controller
{
    //
    public function contact(Request $request){
        Mail::to('benosmanhind@gmail.com')->send(new MailContact($request));
        return 1;
    }
}
