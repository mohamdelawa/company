<?php


namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\contact;
use App\role;
use App\user_role;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
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
       $contacts = contact::all();
        return view('admin.management_messages',compact('contacts'));
    }
    /**
     * @param  int  $id
     */
    public function destroy($id){
        $this->hasRole();
       contact::find($id)->delete();
        return redirect()->back()->with(['success'=>'Message has been successfully deleted!']);
    }
}
