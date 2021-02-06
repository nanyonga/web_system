<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterHealthOfficer;
use App\Http\Controllers\DonorMoneyController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\HierarchicalController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\MoneyPaymentController;

use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

//mycontrolllers
Route::get("/registerofficer", [RegisterHealthOfficer::class, 'index'])->name("registerofficer");
Route::post("/registerofficer", [RegisterHealthOfficer::class, 'store']);
Route::get('/officerlist', function(){

	$officer_list = DB::table('officers')
        ->join('hospitals', 'officers.HospitalId', '=',
         'hospitals.HospitalId')
		->select('officers.HospitalCategory',
		'hospitals.HospitalName', 'officers.OfficerName', 
		'officers.OfficerUserName'
        )
       ->get();

	   
	return view('officer_list' ,['officerlist'=>$officer_list]);
});

//routes and cntrollers
Route::get("/funds", [DonorMoneyController::class, 'index'])->name("funds");
Route::post("/funds", [DonorMoneyController::class, 'store']);
Route::get('/donorlist',
function(){
	$donorlist = DB::table('covid_19_donor_table')->get();
	$Amount = DB::table('funds')
	->where('Amount','>',50000000)
	->get();
	return view('donorlist', ['donorlist' =>$donorlist, 'Amount'=>$Amount]);
}

);
Route::get('/payments', [MoneyPaymentController::class, "index"])->name("payments");
Route::post('/payments', [MoneyPaymentController::class, "store"]);
Route::get('/graphdonations', [DonationController::class , "index"])->name("graphdonations");
//hierachical
Route::get('/hier',[HierarchicalController::class, "index"])->name("hier");

Route::get('/patienlist', [PatientController::class, 'index'])->name('patientlist');


