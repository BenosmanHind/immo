<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminProfilController extends Controller
{
    //
    public function index(){
        $message = null;
        return view('admin.profil',compact('message'));
    }
    public function update(Request $request , $id){
        $user = User::find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if($request->password){
            $user->password = Hash::make($request->password);
          }
        $user->save();
        $message = 'La modification a été bien enregistrer';

        return view('admin.profil',compact('message'));
    }
}

