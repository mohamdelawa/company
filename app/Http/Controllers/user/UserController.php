<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use App\image_project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

public  function  index(){

    $user = Auth::user();

   $image_projects = image_project::whereIn('profile_project_id',$user->profile->profile_project->pluck('id'))->paginate(12);

    return view('user.profile',compact(['user','image_projects']));
}
public  function  view_edit_profile(){
    $user = Auth::user();
        return view('user.edit_profile',compact('user'));
    }
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function edit(Request $request){

        $rules =[
            'name' => 'required|string|max:50',
            'phone' => 'required|min:10',
            'dob' => 'required|date',
            'career' => 'required',
            'address' => 'required',
            'password' => 'required',
        ];
        $masseges =[];
        $validator = Validator::make($request->all(),$rules, $masseges);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }
        $user = Auth::user();
        $verfiy = Hash::check($request->password,$user->password);
        if($verfiy) {
            $user->profile->name = $request->name;
            $user->profile->phone = $request->phone;
            $user->profile->dob = $request->dob;
            $user->profile->career = $request->career;
            $user->profile->address = $request->address;
            if ($request->image_profile != null) {
                $file = $request->file('image_profile');
                $filename = time().'.'.$file->extension();
                $file->move('image_users',$filename);
                $user->profile->image_profile ="../../image_users/".$filename;

            }
            $user->profile->save();
            return redirect()->back()->with('success', 'The you profile was update successfully!');

        }else{
            return redirect()->back()->with('error', 'The Password is Falid!');
        }

    }




}
