<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonationChart extends BaseChart

{
    protected function retrieveNames(){
        $returned = DB::table('covid_19_donor_table')->get();
       $getName = array();
       foreach($returned as $returneds){
           array_push($getName, $returneds->DonorName);
       }
       return $getName;

   }


   protected function retrieveAmount(){
      $result = DB::table('covid_19_donor_table')->get();
      $retrieve = array();
      foreach($result as $results){
          array_push($retrieve,$results->Amount);
      }
      return $retrieve;
   }
   
    public function handler(Request $request): Chartisan
    {   
        if(count($this->retrieveNames())){
            $Amount = $this->retrieveAmount();
            return Chartisan::build()
            ->labels(['first'])
            ->dataset('WellWishers', $this->retrieveAmount());

        }
        else{
                        return Chartisan::build()
            ->labels(['First', 'Second', 'Third'])
            ->dataset('WellWishers', [1,2,4]);

        }
        



    }
}