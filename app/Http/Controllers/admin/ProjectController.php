<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\image_project;
use App\profile;
use App\profile_project;
use App\project;
use App\role;
use App\User;
use App\user_role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
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
  $projects =project::all();
  return view('admin.management_projects',compact('projects'));
}
    public  function  view_edit_project($id)
    {
        $this->hasRole();
        $project = Project::find($id);
        $profiles = profile::all()->whereNotIn('id',$project->profile_project->pluck('profile_id'))->whereNotIn('id',Auth::user()->profile->id);


        return view('admin.edit_project',compact(['project','profiles']));
    }
    public  function  view_add_project(){
        $this->hasRole();
        $users = User::all()->whereNotIn('id',Auth::user()->id);
        return view('admin.add_project',compact('users'));
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request){
        $this->hasRole();
        $rules =[
            'name' => 'required|string|max:50',
            'status' => 'required',
            'images_project.*' => 'mimes:jpeg,jpg,png,gif|max:10000',
        ];
        $masseges =[];
        $validator = Validator::make($request->all(),$rules, $masseges);
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
            $project = new project();
            $project->name = $request->name;
            $project->status = $request->status;
            if($request->url != null) {
                $project->url = $request->url;
            }
            $project->save();
        if ($request->ids != null) {
            foreach ($request->ids as $id){
            $profile_project = new profile_project();
            $profile_project->profile_id = $id;
            $profile_project->project_id = $project->id;
            $profile_project->save();

            }
        }

            $user = Auth::user();
            $profile_project = new profile_project();
            $profile_project->project_id = $project->id;
            $profile_project->profile_id = $user->profile->id;
            $profile_project->save();

        if ($request->images_project != null) {
             foreach ($request->file('images_project') as $file){
                 $filename = $file->getClientOriginalName() .time(). '.' . $file->extension();
                 $file->move('image_projects', $filename);
                 $image_project =new image_project();
                 $image_project->url = "../../image_projects/" . $filename;


                 $image_project->profile_project_id =  $profile_project->id;
                 $image_project->save();
             }
        }


            return redirect()->route('management_projects')->with('success', 'The project was added successfully!');

    }
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function edit(Request $request, $id){
        $this->hasRole();
    $rules =[
        'name' => 'required|string|max:50',
        'status' => 'required',
        'images_project.*' => 'mimes:jpeg,jpg,png,gif|max:10000',
    ];
    $masseges =[];
    $validator = Validator::make($request->all(),$rules, $masseges);
    if($validator->fails()){
        return redirect()->back()->withInput()->withErrors($validator->errors());
    }
    $project = project::find($id);
    $project->name = $request->name;
        $project->status = $request->status;
    if($request->url != null) {
        $project->url = $request->url;
    }
    $project->save();
    if ($request->ids != null) {
        foreach ($request->ids as $id){
            $profile_project = new profile_project();
            $profile_project->profile_id = $id;
            $profile_project->project_id = $project->id;
            $profile_project->save();

        }
    }
    $profile_project =$project->profile_project->where('profile_id','=',Auth::user()->profile->id);
    if($profile_project->isEmpty()) {
        $profile_project = new profile_project();
        $profile_project->profile_id = Auth::user()->profile->id;
        $profile_project->project_id = $project->id;
        $profile_project->save();
    }
    if ($request->images_project != null) {
        foreach ($request->file('images_project') as $file){
            $filename = $file->getClientOriginalName() .time(). '.' . $file->extension();
            $file->move('image_projects', $filename);
            $image_project =new image_project();
            $image_project->url = "../../image_projects/" . $filename;
            $image_project->profile_project_id = $profile_project->id;
            $image_project->save();
        }
    }


    return redirect()->back()->with('success', 'The project was updated successfully!');

}
    /**
     * @param  int  $id
     */
    public function destroy($id)
{
    $this->hasRole();
    foreach (project::find($id)->profile_project as $profile_project){
        $this->destroy_profile_project($profile_project->id);
    }
    project::find($id)->delete();
    return redirect()->back()->with(['success'=>'Project  has been successfully deleted!']);
}
    /**
     * @param  int  $id
     */
    public function destroy_profile_project($id)
    {
        $this->hasRole();
        $images = profile_project::find($id)->image_project;
        foreach ($images as $image){
            $image->delete();
        }
        profile_project::find($id)->delete();
        return redirect()->back()->with(['success'=>'User in Project  has been successfully deleted!']);
    }

    public function destroy_image_project($id)
    {
        $this->hasRole();
        image_project::find($id)->delete();
        return redirect()->back()->with(['success'=>'Image in Project  has been successfully deleted!']);
    }


}
