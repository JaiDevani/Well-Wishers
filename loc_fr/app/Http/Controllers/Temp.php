<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Temp_User;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;
use App\Volunteeer;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use View;
use App\Transaction;
//use Mail;
class Temp extends Controller
{
    public function init(Request $request)
    {
        if($request->type=='Volunteer')
        {
            $temp=new Temp_User;
            $temp->name = $request->name;
            $temp->email = $request->email;
            $temp->password = Hash::make($request->password);
            $temp->type = $request->type;
            $temp->mobile_no = $request->contact;
            $temp->gender = $request->get('gender');
            $temp->save();
        }
        else
        {
            $temp = new User;
            $temp->name = $request->name;
            $temp->email = $request->email;
            $temp->password = Hash::make($request->password);
            $temp->type = $request->type;
            $temp->mobile_no = $request->contact;
            $temp->gender = $request->get('gender');
            $temp->save();
        }
        return redirect('/');

    }

    public function volreg()
    {
        return view('layouts.volreg'); 
    }
    public function autofill()
    {
        return view('layouts.scan');

    }

    public function auto_fill_post(Request $request)
    {
        $guzzle=new Client();
        $fileNameWithExt=$request->file('uform')->getClientOriginalName();
        $fileName=pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension=$request->file('uform')->getClientOriginalExtension();
        $fileNameToStore=$fileNameWithExt;
        $request = $guzzle->get('http://127.0.0.1:5000/images/'.$fileNameToStore);
        $response = $request->getBody()->getContents();
        $var=json_decode($request->getBody(),true);
        $name1=$var['name'];
        $age=$var['age'];
        $amount=$var['amount'];
        $date=$var['date'];
        $surname=$var['surname'];
        $prj=$var['prj'];
        $txn=$var['txn'];
        // dd($name1,$age,$amount,$date,$surname,$prj,$txn);
        return View::make('layouts.auto', array('name' => $name1,'amount'=>$amount,'date'=>$date,'surname'=>$surname,'prj'=>$prj,'txn'=>$txn));
        // return view('layouts.auto',compact($amount,$date,$surname,$prj,$txn));
    }

    public function autoform(Request $request)
    {
        $user=User::where('name',$request->name)->first();
        $txn=new Transaction;
        $txn->user_id=$user->id;
        $txn->txnid=$request->taxid;
        $txn->amount=$request->amount;
        $txn->projectinfo=$request->project;
        $txn->save();
        return redirect('/');
    }

    public function list()
    {
        return view('layouts.list'); 
    }
    
    public function member()
    {
        return view('layouts.member'); 
    }
    public function verified()
    {
        return view('admin.verefied');
    }
    public function upload()
    {
        return view('layouts.upload');
    }


    public function email()
    {
        /*
        $text = 'Hi hello';
        Mail::to('hrishikeshsawant10@gmail.com')->send(new SendMailable($text));
        */
        $temp = new User;
        $temp->name = 'Marie Curie';
        $temp->email = 'uranium@gmail.com';
        $temp->password = Hash::make(123456);
        $temp->type = 'Member';
        $temp->mobile_no = '8715616545';
        $temp->gender = 'Female';
        $temp->save();
    }

    public function retind()
    {
        return view('layouts.index');
    }
}
