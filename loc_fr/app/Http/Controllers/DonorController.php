<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\project;
use Auth;
use App\User;
use App\Volunteeer;
use Illuminate\Support\Facades\Mail;
use App\Mail\DonationEvent;
use GuzzleHttp\Client;
use App\school;
class DonorController extends Controller
{
    public function paymentpost(Request $request){

        $user=Auth::user();
        $MERCHANT_KEY = "";
        $SALT = "";
        $txnid = str_random(15);
        $randomnumber = (string)rand(10000, 99999);
        $txnid = $txnid . $randomnumber;
        $amount = $request->input('amount');
        $projectinfo = $request->input('project');
        $firstname = $user->name;
        $firstname = preg_replace('#[^a-z]#', '', $firstname);
        $email = $user->email;
        $phone = $user->mobile_no;
        $surl = route('paymentsuccess');
        $furl = route('paymentfailure');
        $hashSequence = $MERCHANT_KEY . "|" . $txnid . "|" . $amount . "|" . $projectinfo . "|" . $firstname . "|" . $email . "|||||||||||" . $SALT;
        $hash = strtolower(hash('sha512', $hashSequence));

        $transaction = new Transaction;
        $transaction->user_id = $user->id;
        $transaction->txnid = $txnid;
        $transaction->gateway = "payumoney";
        $transaction->amount = $amount;
        $transaction->projectinfo = $projectinfo;                                                                                                                                                                   
        $transaction->save();

        $project = project::where('name',$projectinfo)->first();
        $project->donated_amount = ($project->donated_amount+$amount);
        $project->save();
        $user_fol=User::find(Auth::id());
        $pro=Volunteeer::select('user_id')->where('projects',$projectinfo)->get();
        $users = User::whereIn('id', $pro)->get(); 
        foreach($users as $usr)
        {
            Mail::to($usr->email)->send(new DonationEvent($user_fol->name,$amount,$projectinfo));
        }
        
        Mail::to($user_fol->email)->send(new DonationEvent($user_fol->name,$amount,$projectinfo));
        

        return view('payment.payumoney' ,
            ['merchantkey'=>$MERCHANT_KEY,'salt'=>$SALT,'txnid'=>$txnid,
                'amount'=>$amount,'productinfo'=>$projectinfo,'firstname'=>$firstname,
                'email'=>$email,'phone'=>$phone,'surl'=>$surl,'furl'=>$furl,'hash'=>$hash,'hashSequence'=>$hashSequence] );
    }

    public function paymentsuccess(){
        return redirect('/');
    }

    public function paymentfailure(){
        return redirect('/');
    }

    public function viewdon(){
        $id=\Auth::user()->id;
        $posts = Transaction::where('user_id',$id)->get();
        return view('layouts.viewtrans')->with('posts',$posts);
    }

    public function unknownmap(){
        $schools=school::all();
        $longtitude=array();
        $latitude=array();
        foreach($schools as $school){
            $guzzle=new Client();
            $address=$school->address;
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


        return view('layouts.unknownmap',compact('data'));
    }
}
