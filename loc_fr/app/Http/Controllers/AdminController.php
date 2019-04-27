<?php

namespace App\Http\Controllers;
use Redirect;
use Illuminate\Http\Request;
use App\Temp_User;
use App\User;
use App\school;
use App\Transaction;
use Auth;
use App\project;
use App\teacher;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use File;
use GuzzleHttp\Client;
use App\Volunteeer;
use App\branch;

class AdminController extends Controller
{
    //
    public function index(){
        $tempmembers=Temp_User::where('type','Member')->get();
        $tempvolunteers=Temp_User::where('type','Volunteer')->get();

        $volunteers=Volunteeer::all();
        $volunteergoregaon=Volunteeer::where('location','M.G. Road, Goregaon west')->count();
        $volunteermalad=Volunteeer::where('location','Malad West')->count();
        $volunteerborivali=Volunteeer::where('location','Malad West')->count();
        $volunteerdadar=Volunteeer::where('location','Malad West')->count();
        $volunteercharniroad=Volunteeer::where('location','Malad West')->count();
        $volgoregaon=json_encode($volunteergoregaon);
        $volmalad=json_encode($volunteermalad);
        $volborivali=json_encode($volunteerborivali);
        $voldadar=json_encode($volunteerdadar);
        $volcharniroad=json_encode($volunteercharniroad);
        $data=array();
        $data["type"]="FeatureCollection";
        $features=[];
        foreach($volunteers as $vol){
            $location=$vol->location;
            $branch=branch::where('location',$location)->first();
            $insideobj=array();
            $insideobj["type"]="Feature";
            $geometry=array();
            $geometry["type"]="Point";
            $geometry["coordinates"]=[$branch->latitude,$branch->longtitude];
            $insideobj["geometry"]=$geometry;
            array_push($features,$insideobj);
        }
        $data["features"]=$features;
        // dd($data);
        $data=json_encode($data);
 
        return view('admin.index',compact('tempmembers','tempvolunteers','volgoregaon','volmalad','volborivali','voldadar','volcharniroad','data'));
    }
    public function verified(){
        $members=User::where('type','Member')->get();
        $volunteers=User::where('type','Volunteer')->get();
        $donors=User::where('type','Donor')->get();
        return view('admin.v',compact('members','volunteers','donors'));
    }

    public function approve($id){
        $temp=Temp_User::find($id);
        $user = new User;
        $user->name= $temp->name;
        $user->type=$temp->type;
        $user->gender=$temp->gender;
        $user->mobile_no=$temp->mobile_no;
        $user->email=$temp->email;
        $user->password=$temp->password;
        $user->save();
        $temp->delete();
        $text = 'Email for '.$temp->name.' is verified and will perform the role of Volunteer';
        Mail::to($temp->email)->send(new SendMailable($text));
        $user_req=User::where('type','Member')->get();
        foreach($user_req as $usr)
        {
            Mail::to($usr->email)->send(new SendMailable($text));
        }
        return redirect('/');
    }

    public function delete($id){
        $temp=Temp_User::find($id);
        $temp->delete();
        return redirect('/');
    }
    public function school()
    {
        return view('layouts.schooldetail');
    }
    public function addproject()
    {
        return view('layouts.addproject');
    }
    public function uploadSchool(Request $request)
    {
        $school = new school;
        $school->name = $request->name;
        $school->email = $request->email;
        $school->address = $request->address;
        $school->contact_no = $request->contact_no;
        $school->save();
        return redirect('/');
    }
    public function projectlist()
    {
        $posts = project::all();
        $schoolname=array();
        $schools=school::all();
        $longtitude=array();
        $latitude=array();
        foreach($schools as $school){
            $guzzle=new Client();
            $address=$school->address;
            array_push($schoolname,$school->name);
            $request = $guzzle->get('https://api.mapbox.com/geocoding/v5/mapbox.places/'.$address.'.json?access_token=');
            $response = $request->getBody()->getContents();
            $var=json_decode($request->getBody(),true);
            $addentity=$var['features'][0]['geometry']['coordinates'];
            array_push($longtitude,$addentity[0]);
            array_push($latitude,$addentity[1]);
            // dd($addentity);
        }
        // dd($longtitude,$latitude);

        $data=array();
        $data["type"]="FeatureCollection";
        $features=[];
        for($i=0;$i<count($longtitude);$i++){
            $insideobj=array();
            $insideobj["type"]="Feature";
            $geometry=array();
            $geometry["type"]="Point";
            $geometry["coordinates"]=[$longtitude[$i],$latitude[$i]];
            $insideobj["geometry"]=$geometry;
            array_push($features,$insideobj);
        }
        $data["features"]=$features;
        // dd($data);
        $data=json_encode($data);
        $longtitude=json_encode($longtitude);
        $latitude=json_encode($latitude);
        $schoolname=json_encode($schoolname);
        return view('admin.projects',compact('posts','data','longtitude','latitude','schoolname'));
    }
    public function project($id)
    {
        $posts = project::find($id);
       // $names = User::where();
        return view('admin.projectinfo',compact('posts'));
    }
    public function volunteerList()
    {
        return view('admin.volunteerlist');
    }
    public function projectpost(Request $request){
        $project=new project;
        $project->name=$request->input('projectname');
        $project->description=$request->input('description');
        $project->domain=$request->input('domain');
        $project->date_started_at=$request->input('datetimepicker');
        
        $fileNameWithExt=$request->file('display')->getClientOriginalName();
        $fileName=pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension=$request->file('display')->getClientOriginalExtension();
        $fileNameToStore=$fileNameWithExt;
        $path=$request->file('display')->storeAs('public/cover_images',$fileNameToStore);
        $project->diplay=$fileNameToStore;
        $project->save();
        return redirect('/');
    }
    public function addteachers()
    {
        return view('admin.addteachers');
    }
    public function uploadTeacher(Request $request)
    {
        $t = new teacher;
        $t->name = $request->name;
        $t->email = $request->email;
        $t->mobile_no = $request->mobile_no;
        $t->school_id = $request->input('membername');
        $t->save();
        return redirect('/');
    }
}