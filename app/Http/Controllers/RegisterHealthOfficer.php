<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use APP\Models\HealthOfficerModel;
use Illuminate\Support\Facades\DB;

class RegisterHealthOfficer extends Controller
{
    //return view
    public function index(){
        return view("auth.registerofficer"); 
    }
    //get all officers
    public function return_officers(){
        return DB::table('officers')
        ->join('hospitals', 'officers.HospitalId', '=',
         'hospitals.HospitalId')
        ->select('officers.HospitalCategory',
        'officers.HospitalId',
        DB::raw('COUNT(officers.HospitalId) as total_officers')
        )->where('officers.HospitalCategory' , '=', 'general')
        ->groupBy(
         'officers.HospitalId',
          'officers.HospitalCategory')
       ->get();

    }

    public function store(Request $request){
        
        $this->validate($request,
        [
            'officerName'=>'required',
            "officerUserName"=>'required'
        ]);    
    if(count($this->return_officers())){
        //retreive data
        $returned_officers = $this->return_officers();
        //dd($returned_officers);

        //change to array
$newarray = array_map(function($object){

       return array("hospitalId"=>$object->HospitalId, 
       "total_officers"=>$object->total_officers);
}, 
$returned_officers->toArray());
//print_r($newarray);

//sort associative array
usort($newarray, function ($item1, $item2) {
    return $item1['total_officers'] <=> $item2['total_officers'];
});
//id
$hospitalId = $newarray[0]['hospitalId'];
if($hospitalId > 15){
    return back()->with("status", "All general hospitals are full");
}

$hospital_details = DB::table('hospitals')->where('HospitalId', $hospitalId)->get();
//print_r($hospital_details);

DB::insert('insert into health_officers (OfficerName,officerUserName, HospitalId)
 values (?, ?,?)', [$request->officerName, $request->officerUserName
  , $hospital_details[0]->HospitalId]);

 return redirect('/officerlist');

       
    }
    else{
        //incase there no users
       $count =  DB::table('hospitals')->where('HospitalCategory', '=', 'general')->get();
       if(count($count)){
           

        DB::insert('insert into officers (OfficerName,officerUserName, HospitalId)
        values (?, ?,?)', [$request->officerName, $request->officerUserName
         , $count[0]->HospitalId]);
         return redirect('/officerlist');

       }
       else{
           return back()->with("status", "Hospitals lack data");
       }


    }


    }
    

}
