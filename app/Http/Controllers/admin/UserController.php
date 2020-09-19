<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\image_project;
use App\profile;
use App\role;
use App\User;
use App\user_role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function hasRole()
   {
       $verfiy = user_role::all()->where('user_id','=',Auth::user()->id)
           ->where('role_id','=',role::all()->where('type','=','admin')->first()->id)->isNotEmpty();
       if(!$verfiy){
           return Redirect()->to('403')->send();
       }

   }
    public  function  index(){
        $this->hasRole();
   $users =User::all();

   return view('admin.management_users',compact('users'));
}
    /**
     * @param  int  $id
     */
public  function  show($id){
    $this->hasRole();
      $user_profile =  user::find($id);
    $image_projects = image_project::whereIn('profile_project_id',$user_profile->profile->profile_project->pluck('id'))->paginate(12);

    return view('admin.user_profile',compact(['user_profile','image_projects']));
}
public  function  view_edit_user($id){
    $this->hasRole();
        $user_profile = user::find($id);
        return view('admin.edit_user_profile',compact('user_profile'));
}
public  function  view_add_user(){
    $this->hasRole();
        return view('admin.add_user');
}
    /**
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request){
        $this->hasRole();
        $rules =[
            'name' => 'required|string|max:50',
            'phone' => 'required|min:10',
            'dob' => 'required|date',
            'email' => 'required|unique:users',
            'gender' => 'required',
            'career' => 'required',
            'address' => 'required',
            'password_user' => 'required|min:8',
            'my_password' => 'required',
        ];
        $masseges =[];
        $validator = Validator::make($request->all(),$rules, $masseges);
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
        $user = Auth::user();
        $verfiy = Hash::check($request->my_password,$user->password);
        if($verfiy) {
            $user_profile =new  User();

            $user_profile->email = $request->email;
            $user_profile->password = Hash::make($request->password_user);
            $user_profile->email_verified_at = now();
            $user_profile->remember_token =Str::random(10);
            $user_profile->save();
            $user_id = User::all()->where('email','=',$request->email)->first()->id;
            $uer_role = new user_role();
            $uer_role->user_id = $user_id;
            $uer_role->role_id = role::all()->where('type','=','user')->first()->id;
            $uer_role->save();
            $profile =new profile();
            $profile->user_id = $user_id;
            $profile->name = $request->name;
            $profile->phone = $request->phone;
            $profile->dob = $request->dob;
            $profile->gender = $request->gender;
            $profile->career = $request->career;
            $profile->address = $request->address;
            if ($request->image_profile != null) {
                $file = $request->file('image_profile');
                $filename = time() . '.' . $file->extension();
                $file->move('image_users', $filename);
                $profile->image_profile = "../../image_users/" . $filename;

            }
            $profile->save();

            return redirect()->route('management_users')->with('success', 'The my profile was update successfully!');
        }else{
            return redirect()->back()->withInput()->with('error',  'The My Password is Falid!');
        }
    }
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
public function edit(Request $request, $id){
    $this->hasRole();
        $rules =[
            'name' => 'required|string|max:50',
            'phone' => 'required|min:10',
            'dob' => 'required|date',
            'email' => 'required',
            'gender' => 'required',
            'career' => 'required',
            'address' => 'required',
            'my_password' => 'required',
        ];
        $masseges =[];
        $validator = Validator::make($request->all(),$rules, $masseges);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }
        $user = Auth::user();
        $verfiy = Hash::check($request->my_password,$user->password);
        if($verfiy) {
            $user_profile = user::find($id);
            $verfiy_email = user::all()->where('email','=',$request->email)->first();
            if($verfiy_email != null){
                if($verfiy_email->id != $user_profile->id) {
                    return redirect()->back()->with('error', 'The email has already been taken!');
                }
            }
            $user_profile->email = $request->email;
            if ($request->password_user != null) {
                $user_profile->password = $request->password_user;
            }
            $user_profile->profile->name = $request->name;
            $user_profile->profile->phone = $request->phone;
            $user_profile->profile->dob = $request->dob;
            $user_profile->profile->gender = $request->gender;
            $user_profile->profile->career = $request->career;
            $user_profile->profile->address = $request->address;
            if ($request->image_profile != null) {
                $file = $request->file('image_profile');
                $filename = time() . '.' . $file->extension();
                $file->move('image_users', $filename);
                $user_profile->profile->image_profile = "../../image_users/" . $filename;

            }
            $user_profile->profile->save();
            $user_profile->save();
            return redirect()->back()->with('success', 'The my profile was update successfully!');
        }else{
            return redirect()->back()->with('error',  'The My Password is Falid!');
        }
    }
    /**
     * @param  int  $id
     */
public function destroy($id){
    $this->hasRole();
        user::find($id)->delete();
        return redirect()->back()->with(['success'=>'User  has been successfully deleted!']);
    }


}
