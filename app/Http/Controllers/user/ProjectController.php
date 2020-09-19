<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use App\image_project;
use App\profile_project;
use App\project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{

    public  function  index(){
       $projects =project::all()->whereIn('id',Auth::user()->profile->profile_project->pluck('project_id'));

       return view('user.my_projects',compact('projects'));
}
    public  function  view_edit_project($id)
    {


        $profile_project =  Auth::user()->profile->profile_project->where('project_id','=',$id)->first();
        return view('user.edit_project',compact('profile_project'));
    }
    public  function  view_add_project(){

        return view('user.add_project');
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request){
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
        $user = Auth::user();
        $profile_project = new profile_project();
        $profile_project->project_id = $project->id;
        $profile_project->profile_id = $user->profile->id;
        $profile_project->save();
        if ($request->images_project != null) {
             foreach ($request->file('images_project') as $file){
                 $filename = $file->getClientOriginalName().time(). '.' . $file->extension();
                 $file->move('image_projects', $filename);
                 $image_project =new image_project();
                 $image_project->url = "../../image_projects/" . $filename;

                 $image_project->profile_project_id =  $profile_project->id;
                 $image_project->save();
             }
        }


            return redirect()->route('my_projects')->with('success', 'The project was added successfully!');

    }
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function edit(Request $request, $id){

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
    $profile_project = profile_project::find($id);
    $profile_project->project->name = $request->name;
        $profile_project->project->status = $request->status;
    if($request->url != null) {
        $profile_project->project->url = $request->url;
    }
    $profile_project->project->save();
    if($request->images_project != null) {
         $es ='';
        foreach ($request->file('images_project') as $image){

                $image_name = $image->getClientOriginalName().time(). '.' . $image->extension();

            $image->move('image_projects', $image_name);
                $image_project =new image_project();
                $image_project->url = "../../image_projects/" . $image_name;
                $image_project->profile_project_id =  $profile_project->id;
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
   $images = Auth::user()->profile->profile_project->where('project_id','=',$id)->first()->image_project;
    foreach ($images as $image){
        $image->delete();
    }
    Auth::user()->profile->profile_project->where('project_id','=',$id)->first()->delete();
    return redirect()->back()->with(['success'=>'Project  has been successfully deleted!']);
}
    /**
     * @param  int  $id
     */
    public function destroy_image_project($id)
    {
        image_project::find($id)->delete();
        return redirect()->back()->with(['success'=>'Image in Project  has been successfully deleted!']);
    }


}
