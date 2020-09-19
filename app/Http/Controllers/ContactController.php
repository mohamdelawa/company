<?php

namespace App\Http\Controllers;

use App\contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request){

        $rules =[
            'name' => 'required|string|max:50',
            'phone' => 'required|min:10',
            'email' => 'required',
           'message'=>'required',
        ];
        $masseges =[];
        $validator = Validator::make($request->all(),$rules, $masseges);
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
             $contact =new contact();
        $contact->name =$request->name;
        $contact->email =$request->email;
        $contact->phone =$request->phone;
        $contact->message =$request->message;
        $contact->save();
        return redirect()->back()->with('success', 'Message sent successfully!');

    }
}
