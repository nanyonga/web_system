{{-- @extends('layouts.app') --}}
@extends('layouts.app')

@section('content')
<style>
        .footer{
        margin-top: 4rem;
        padding: 10px;
        text-align: center;
    }
    .tab{
        text-align: center;
        background:#fff;
        color:#fff;
        border-radius: 999px;
        width: 100%;
        padding: 8px;
        font-weight: 800;
    }
    
    .footer>a{
        text-decoration:none;

        cursor: pointer;
        font-weight: bold;
    }
    
</style>
<div class="layout">
      <!-- Chart's container -->
      <div class="">
        <div class="col-md-12 mt-3 mb-3">
          <p class="tab">GraphsDisplayed</p>
      </div>
  

        <div id="wellwishers" style="height: 800px;"></div>

        <div class="">
          <div class="col-md-12 mt-3 mb-3">
            <p class="tab">GraphsDisplay</p>
        </div>
        <div id="months" style="height: 800px;"></div>
          
      </div>  
      @include('layouts.footer')
</div>
<!-- Charting library -->
<script  src="https://unpkg.com/chart.js@2.9.3/dist/Chart.min.js"></script>
<!-- Chartisan -->
<script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>

 <script>
        
      // your Chart code here ex: new Chart
      const chart = new Chartisan({
     el: '#wellwishers',
     url: "@chart('donation_chart')",
     hooks:new ChartisanHooks()
            .beginAtZero()
           .title("A graph of Donations versus well wishers")
           .legend({position:"top"})
           .datasets([{type:"bar", 
           backgroundColor:"orange",
           hoverBackgroundColor:"red"
           }])
           
   });

   const chart2 = new Chartisan({
     el: '#months',
     url: "@chart('months_chart')",
     hooks:new ChartisanHooks()
            .beginAtZero()
           .title("A graph of Donations  versus months")
           .legend({position:"bottom"})
           .datasets([{type:"bar", 
           label:"months",
           backgroundColor:"red",
           hoverBackgroundColor:"yellow",
           }])
           
   });
 </script>

 <script>
   
 </script>
    
@endsection





