<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
 //count total officers
 public function total_officers($category){
    return DB::table('officers')
    ->join('hospitals', 'officers.HospitalId', '=',
     'hospitals.HospitalId')
    ->select('officers.HospitalCategory',
    'officers.HospitalId',
    DB::raw('COUNT(officers.HospitalId) as total_officers')
    )->where('officers.HospitalCategory' , '=', $category)
    ->groupBy(
     'officers.HospitalId',
      'officers.HospitalCategory')
   ->get();

}
     
    public function retrieve_officers($category){
        return DB::table('officers')
        ->join('covid_19_patients', 'officers.officerId', '=',
         'covid_19_patients.OfficerId')
        ->select('officers.OfficerName','officers.HospitalId',
        'officers.officerId',
        'officers.OfficerUserName',
        DB::raw('COUNT(covid_19_patients.officerId) as total_patients')
        )->where('officers.HospitalCategory' , '=', $category)
        ->groupBy(
         'officers.officerId',
         'officers.HospitalId',
          'officers.OfficerName', 'officers.OfficerUserName')
       ->get();

    }
    //filter array
    protected function filter_officers($officer_array){
        return array_filter($officer_array , function($elements){
            if($elements->total_patients > 10){
                //return $elements;
              $newarray =  $this->convert_array($this->total_officers('regional'));
              $converted_to_array =  array_map(function($object){
               return  array('HospitalCategory'=>$object->HospitalCategory,
               'HospitalId'=>$object->HospitalId, 
             'total_officers'=>$object->total_officers,
             )
             ;
   },$newarray);
              
               usort($converted_to_array, function ($item1, $item2) {
                   return $item1['total_officers'] <=> $item2['total_officers'];
               });
   
                  //echo $first_element;
                 // $newA
                 //$hosiptalId = $sorted[0]['HospitalId'];
                 //return $converted_to_array[0]['HospitalId'];
                  if($converted_to_array[0]['total_officers']<100){
                      //insert to db here
                      $id = $converted_to_array[0]['HospitalId'];
                      $OfficerId = $elements->officerId;
                       //print_r($elements); 
                       //print_r($OfficerId); 
                       DB::update('update health_officers
                        set HospitalId = ?,
                        HospitalCategory = ?
                         where OfficerId = ?', [$id,'regional', $OfficerId]);            
   
                  }
            }
         });
       }
   
    //convert to an array
    protected function convert_array($array_elements){
        return array_map(function($object){
            return $object;
     },$array_elements->toArray());
    

    }
    //format currency
    protected function  format_currency($array_currency){
        return  array_map(function($currency){
              if($currency->Award){
                 $currency->Award = number_format($currency->Award, 2, '.', ',');
                 return $currency;
              }
         }, $array_currency);
     }
     

    
    protected function filter_regional_hospital($officer_array){
        return array_filter($officer_array , function($elements){
            if($elements->total_patients > 0){
               if(count(DB::table("waiting_list")->where("OfficerId", '=', $elements->officerId)->get())){
                   return ;
               }
               else{
                DB::insert('insert into waiting_list
                (OfficerUserName, OfficerId, Award, Pending) values (?, ?, ?, ?)', 
                [$elements->OfficerUserName, $elements->officerId, '10000000', 'Yes']);
               }


            }
         });
         

    }
    

    public function index()
    {
        //convert to an array
        //filter
         $officers_general = array();
         $officers_regional = array();
         $officers_national = array();
         $promotions = array();
        if(count($this->retrieve_officers('general'))){
         $converted =  $this->convert_array($this->retrieve_officers('general'));
        $this->filter_officers($converted);
         $officers_general = $this->retrieve_officers('general');
         //print_r($result);

         //retrieve regional
         if(count($this->retrieve_officers('regional'))){
             $officers_regional = $this->retrieve_officers('regional');
             $converted = $this->convert_array($officers_regional);
             $this->filter_regional_hospital($converted);

         }
         //retrieve national
         if(count($this->retrieve_officers('national'))){
            $officers_national = $this->retrieve_officers('national');
        }

        //promotions data
        if(count(DB::table('promotions')->get())){
            $promoted = DB::table('promotions')->get();
            $promotions = $this->format_currency($promoted->toArray());

        }
         return view('home',
         ['officers_general'=>$officers_general,
            'officers_regional'=>$officers_regional,
            'officers_national'=>$officers_national,
            'promotions'=>$promotions
            ]
        );
        }
        else{
            $officers_general = array();
            $officers_regional = array();
            $officers_national = array();
            $promotions = array();
            return view('home',
            ['officers_general'=>$officers_general,
            'officers_regional'=>$officers_regional,
            'officers_national'=>$officers_national,
            'promotions'=>$promotions
            ]
        );
        }

    }
}
