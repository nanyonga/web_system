<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DonorModel;
use Illuminate\Support\Facades\DB;

class DonorMoneyController extends Controller
{
    //
    protected function  getOfficerMonth($array_month, $number){
        foreach($array_month as $months=>$value){
            if((int)$value=== (int)$number)
            return $months;
        }
        return ;
     }

    public function index(){
        return view('auth.registerfunds');
    }

    public function store(Request $request){
        //dd($request);
        $this->validate($request,
        ['amount'=>'required',
        'month'=>'required',
        'donorName'=>'required'
        ]
    );
    
    
    $array_of_months = ['January'=>'1', 'February'=>'2', 'March'=>'3', 'April'=>'4',
    'May'=>'5', 'June'=>'6', 'July'=>'7', 'August'=>'8', 
    'September'=>'9', 'October'=>'10', 'November'=>'11', 'December'=>'12'];

   
    $exploded = explode("-", $request->month, 2)[1];
    $getMonth = $this->getOfficerMonth($array_of_months, $exploded);
    //dd($exploded);

    //cchecking if record exists
    $found = DB::table('funds')->where('Month', '=', $getMonth)->get();
    //print_r($found);
    if(count($found)){
        
        //echo 'AM her in the databasae';
        //aupdate the column
        $getAmount = DB::select('select Amount from covid_19_total_funds where Month = ?', [$getMonth]);
        //print_r($Amount[0]->Amount);

        //loop
        $myAmount = 0.0;
        foreach($Amount as $needed_amount){
                $myAmount = (float)$needed_amount->Amount;
        }
        
        //sum up
        $total_amount = $request->amount + $myAmount;
        //update 
        DB::update('update covid_19_total_funds set Amount = ? where Month = ?', [$total_amount, $getMonth]);

        //insert

        DB::insert('insert into covid_19_donor_table
        (DonorName, Amount, Month) values (?, ?,?)', [$request->donorName, $request->amount, $getMonth]);


        //redirect donor list
        return redirect("/donorlist");
    }
    else{
        
        //insert
        DB::insert('insert into covid_19_donor_table(DonorName, Amount, Month) 
           values (?, ?, ?)', [$request->donorName, $request->amount,
          $this->getOfficerMonth($array_of_months, $exploded)]);
          ///insert
          DB::insert('insert into covid_19_total_funds (Amount, Month) 
          values (?, ?)', [$request->amount, $getMonth]);
            return redirect("/donorlist");
    }
    
    }
}

