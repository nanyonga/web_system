<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonationController extends Controller
{
    //
    public function index(){ 
        // $returned = DB::table('covid_19_donor_table')->get();
        // $getName = array();
        // foreach($returned as $returneds){
        //     array_push($getDonerName, $returneds->DonorName);
        // }
        // dd($returned);
        
        return view("donationchart");
    }
}
