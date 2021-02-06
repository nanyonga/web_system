<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{


    protected function total_patients(){
        return DB::table('covid_19_patients')->count();
    }

    
    protected function patient_by_hospitals($category){
        return DB::table('officers')
        ->join('covid_19_patients', 'officers.OfficerId', '=',
         'covid_19_patients.OfficerId')
         ->join('hospitals', 'hospitals.HospitalId', '=', 
         'officers.HospitalId')
        ->select('officers.OfficerName','hospitals.HospitalName',
        'covid_19_patients.*'
        )->where('officers.HospitalCategory' , '=', $category)
       ->get();


    }
    
    public function index(){

        if(DB::table('covid_19_patients')->count()){
            
            $patients_general = $this->patient_by_hospitals('general');
            $patient_regional = $this->patient_by_hospitals('regional');
            $patient_national = $this->patient_by_hospitals('national');
            $total = $this->total_patients();

            return view("patientlist",
            ['patients_general'=>$patients_general,
            'patients_regional'=>$patient_regional,
            'patients_national'=>$patient_national,
            'total'=>$total
            ]);

        }
        else{
        
            $patients_general = array();
            $patients_regional = array();
            $patients_national = array();
            $patients_total = array();
            return view("patientlist",
            ['patients_general'=>$patients_general,
            'patients_regional'=>$patients_regional,
            'patients_national'=>$patients_national,
            'total'=>$patients_total
            ]
        );
        }
    

    }
}
