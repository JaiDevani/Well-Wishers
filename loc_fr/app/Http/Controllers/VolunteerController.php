<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Volunteeer;
use App\student;
use App\school;
use Redirect;
use Auth;
use Storage;
use File;
use DB;
use App\Transaction;
use App\teacher;
use Carbon\Carbon;
class VolunteerController extends Controller
{
    //
    public function details(){
        return view('layouts.volreg');
    }

    public function postdetails(Request $request){
        $volunteer=new Volunteeer;
        $volunteer->user_id=Auth::id();
        $volunteer->designation=$request->input('designation');
        $volunteer->birth_date=$request->input('datetimepicker');
        $volunteer->location=$request->input('location');
        $volunteer->work_duration=$request->input('datetimepicker2');
        $volunteer->domain_of_projects=$request->input('domain');
        $volunteer->projects=$request->input('projects');
        $volunteer->current_education=$request->input('education');
        $volunteer->workplace=$request->input('workplace');
        $volunteer->save();

        return redirect('/');
    }

    // public function uploadinitialdata(Request $request){
    //     $file=$request->input('csvfile');
    //     $csvData = file_get_contents($fileName);
    //     $lines = explode(PHP_EOL, $csvData);
    //     $array = array();
    //     foreach ($lines as $line) {
    //         $array[] = str_getcsv($line);
    //     }
    //     print_r($array);
    // }

    public function uploadstudent(){
        return view('layouts.upload');
    }

    public function uploadpoststudent(Request $request){
        if($request->hasFile('student_data')){
            $fileNameWithExt=$request->file('student_data')->getClientOriginalName();
            $fileName=pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension=$request->file('student_data')->getClientOriginalExtension();
            $fileNameToStore=$fileNameWithExt;

            $path=$request->file('student_data')->storeAs('public/cover_images',$fileNameToStore);

            $csvData=Storage::path('public\cover_images\\'.$fileNameWithExt);
            // dd($csvData);
            $csvData = File::get($csvData);
            $lines = explode(PHP_EOL, $csvData);
            $array = array();
            foreach ($lines as $line) {
                $array[] = str_getcsv($line);
            }
            for($i=1;$i<count($array)-1;$i++){
                // print_r($array[$i]);
                $getstudent=student::where('name',$array[$i][0])->get();
                if($getstudent===null){
                    $student=new student;
                    $student->name=$array[$i][0];
                    $student->DOB=$array[$i][1];
                    $student->location=$array[$i][2];
                    $school=school::where('name',$request->input('school_name'))->first();
                    $student->school_id=$school->school_id;
                    $student->save();
                }
            }
        }
        if($request->hasFile('student_att')){
            $fileNameWithExt=$request->file('student_att')->getClientOriginalName();
            $fileName=pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension=$request->file('student_att')->getClientOriginalExtension();
            $fileNameToStore=$fileNameWithExt;

            $path=$request->file('student_att')->storeAs('public/cover_images',$fileNameToStore);

            $csvData=Storage::path('public\cover_images\\'.$fileNameWithExt);
            // dd($csvData);
            $csvData = File::get($csvData);
            $lines = explode(PHP_EOL, $csvData);
            $array = array();
            foreach ($lines as $line) {
                $array[] = str_getcsv($line);
            }
            $school=school::where('name',$request->input('school_name'))->first();
            for($i=1;$i<count($array)-1;$i++){
                // print_r($array[$i]);
                $student=student::where('name',$array[$i][0])->where('school_id',$school->school_id)->first();
                if($student->days_total!== null){
                    $student->days_total=$student->days_total+1;
                    if($array[$i][1]==='1'){
                        $student->days_present=$student->days_present+1;
                    }
                }else{
                    $student->days_total=1;
                    if($array[$i][1]===1){
                        $student->days_present=1;
                    }else{
                        $student->days_present=0;
                    }
                }
                $student->save();
            }
        }
        
        return redirect('/');
    }

    public function volunteercharts(){
        $dates=['2019-04-01 00:00:00','2019-03-01 00:00:00','01-02-2019','01-01-2019','01-12-2018','01-11-2018','01-10-2018','01-09-2018','01-08-2018','01-07-2018','01-06-2018','01-05-2018'];
        $dates=['2019-04-01 00:00:00','2019-03-01 00:00:00','2019-02-01 00:00:00','2019-01-01 00:00:00','2018-12-01 00:00:00','2018-11-01 00:00:00'];
        $transarray=[];
        for($i=0;$i<6;$i++){
            $transactions=Transaction::where('created_at','<=',$dates[$i])->sum('amount');
            array_push($transarray,$transactions);
        }
         $dates=json_encode($dates);
         $transarray=json_encode($transarray);
        // dd($transarray);

        $id=Auth::id();
        $volunteer=Volunteeer::where('user_id',$id)->first();
        $school=$volunteer->workplace;
        $school=school::where('name',$school)->first();
        $present=student::where('school_id',$school->school_id)->sum('days_present');
        $total=student::where('school_id',$school->school_id)->sum('days_total');
        $present=json_encode((int)$present);
        $total=json_encode((int)$total-(int)$present);
        $schoolname=$school->name;
        
        $id=Auth::id();
        $volunteer=Volunteeer::where('user_id',$id)->first();
        $school=$volunteer->workplace;
        $school=school::where('name',$school)->first();
        $teachers = teacher::where('school_id',$school->school_id)->get();


        return view('layouts.volunteercharts',compact('teachers','dates','transarray','present','total','schoolname'));
    }

    public function attendancecharts(){
        $id=Auth::id();
        $volunteer=Volunteeer::where('user_id',$id)->first();
        // dd($volunteer->workplace);
        $school=$volunteer->workplace;
        $school=school::where('name',$school)->first();

        // dd($school->school_id);
        // $students=student::where('school_id',$schoolid)->get();
        $present=student::where('school_id',$school->school_id)->sum('days_present');
        $total=student::where('school_id',$school->school_id)->sum('days_total');
        // dd($present,$total);
        $present=json_encode($present);
        $total=json_encode($total);
        return view('layouts');

    }

}
