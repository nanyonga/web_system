
<style>
.sidebar{
    background:gray !important;
    color:#000 !important;
}


}
</style>
<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <h2>{{Auth::user()->name}}</h2>
        </div>
        @if (Auth::user()->role != 'Director')
        <ul class="nav">
            <li >
                <a href="{{ route('payments') }}">
                    <i class="tim-icons icon-coins"></i>
                    <p>{{ __('MonthlyPayments') }}</p>
                </a>
            </li>  
        
            <li >
                <a href="{{ route('patientlist') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('PatientLists') }}</p>
                </a>
            </li>  
            <li>
                <a href="{{ route('registerofficer')  }}">
                    <i class="tim-icons icon-single-02"></i>
                 <p>{{ __('HealthOfficer') }}</p>
                </a>
            </li>
            <li   >
                <a href="{{ route('funds') }}">
                    <i class="tim-icons icon-coins"></i>
                <p>{{ __('DonorMoney') }}</p>
                </a>
            </li>
            <li>
                <a href="{{ route("graphdonations")  }}">
                    <i class="tim-icons icon-money-coins"></i>
                 <p>{{ __('DonationGraph') }}</p>
                </a>
            </li>
            <li  >
                <a href="{{ route('graphdonations') }}">
                    <i class="tim-icons icon-pin"></i>
                    <p>{{ __('PercentageGraph') }}</p>
                </a>
            </li>
   
            <li  >
                <a href="{{ route('hier') }}">
                    <i class="tim-icons icon-triangle-right-17"></i>
                    <p>{{ __('GraphHierarchical') }}</p>
                </a>
            </li>
                  
        </ul>
        @else
        <ul class="nav">

            <li >
                <a href="{{ route('patientlist') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('PatientLists') }}</p>
                </a>
            </li>  
            <li>
                <a href="{{ route("graphdonations")  }}">
                    <i class="tim-icons icon-triangle-right-17"></i>
                 <p>{{ __('DonationGraph') }}</p>
                </a>
            </li>
            <li  >
                <a href="{{ route('funds') }}">
                    <i class="tim-icons icon-pin"></i>
                    <p>{{ __('PercentageGraph') }}</p>
                </a>
            </li>
            <li >
                <a href="{{ route('patientlist') }}">
                    <i class="tim-icons icon-pin"></i>
                    <p>{{ __('PatientLists') }}</p>
                </a>
            </li>   
            <li  >
                <a href="{{ route('hier') }}">
                    <i class="tim-icons icon-triangle-right-17"></i>
                    <p>{{ __('GraphHierarchical') }}</p>
                </a>
            </li>
            <li >
                <a href="{{ route('payments') }}">
                    <i class="tim-icons icon-coins"></i>
                    <p>{{ __('MonthlyPayments') }}</p>
                </a>
            </li>      
                    
        </ul>

            
        @endif
            </div>
</div>
