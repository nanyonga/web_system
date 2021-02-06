
@extends('layouts.app');
@section('content')
<style>
    .contained{
      width:100%;
      background: #000;
      color:#fff;
    }
</style>
<div class="black"></div>
    <div class="container">
        <div class="col-md-12 mt-3 mb-3">
            <p class="tab text-center font-bold">HierachicalDisplays</p>
        </div>
        <div class="contained">
            <div class="col-md-12 mt-3 mb-3">
                <p class="tab-hospitals">GeneralHospitalHierarchy</p>
            </div>
            <ol>
                <h2 class="level-3 rectangle">HeadGeneralHospital</h2>
                <ol class="level-4-wrapper">
                  <li>
                    <h4 class="level-4 rectangle">Officers</h4>
                  </li>
                </ol>
            </ol>
            <div class="col-md-12 mt-3 mb-3">
                <p class="tab-hospitals">ReferalHospitalHierarchy</p>
            </div>
            <ol>
                <h2 class="level-3 rectangle">Superintendent</h2>
                <ol class="level-4-wrapper">
                  <li>
                    <h4 class="level-4 rectangle">SeniorOfficers</h4>
                  </li>
                </ol>
                <div class="col-md-12 mt-3 mb-3">
                    <p class="tab-hospitals">NationalHospitalHierarchy</p>
                </div>
                <ol>
                    <h2 class="level-3 rectangle">DirectorCovid19Pandemic</h2>
                    <ol class="level-4-wrapper">
                      <li>
                        <h4 class="level-4 rectangle">StaffMembers</h4>
                      </li>
                    </ol>
             
        </div>
        @include('layouts.footer')

    </div>
</div>'
    
@endsection