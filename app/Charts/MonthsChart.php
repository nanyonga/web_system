<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonthsChart extends BaseChart
{

    protected function AllMonths(){
        $result = DB::table('covid_19_donor_table')->get();
       $getDonorMonth = array();
       foreach($result as $results){
           array_push($getDonorMonth, $results->Month);
       }
       return $getDonorMonth;

   }


   protected function getAmount(){
      $result = DB::table('covid_19_donor_table')->get();
      $getAmount = array();
      foreach($result as $results){
          array_push($getAmount,$results->Amount);
      }
      return $getAmount;
   }

    public function handler(Request $request): Chartisan
    {

        if(count($this->getAmount())){
            return Chartisan::build()
            ->labels($this->AllMonths())
            ->dataset('Months', $this->getAmount());

        }
        else{
            return Chartisan::build()
            ->labels(['First', 'Second', 'Third'])
            ->dataset('Months', [1, 2, 3]);

        }

    }
}