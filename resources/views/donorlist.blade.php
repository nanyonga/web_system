@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title text-center">ListOfDonors</h4>
            </div>
            @if ($donorlist)
            <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        DonorName
                      </th>
                      <th>
                        Amount
                      </th>
                      <th>
                        Month
                      </th>
                    </thead>
                    <tbody>
                        @foreach ($donorlist as $donor)
                        <tr>
                            <td>
                              {{$donor->DonorName}}
                            </td>
                            <td>
                              {{$donor->Amount}}
                            </td>
                            <td>
                              {{$donor->Month}}
                            </td>
                            
                           
                          </tr>
                            
                        @endforeach
                      
                    </tbody>
                  </table>
                  
                </div>
              </div>
                
            @endif
           
          </div>

          
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
               A <h4 class="card-title text-center">TotalAmountMonthly</h4>
              </div>
              @if (count($Amount))
              <div class="card-body">
                  <div class="">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          Month
                        </th>
                        <th>
                          TotalAmount
                        </th>
                       
                      </thead>
                      <tbody>
                          @foreach ($Amount as $donor)
                          <tr>
                              <td>
                                {{$donor->Month}}
                              </td>
                              <td>
                                {{$donor->Amount}}
                              </td>

  
                            </tr>
                              
                          @endforeach
                        
                      </tbody>
                    </table>
                    
                  </div>
                </div>
                  
              @endif
             
            </div>
          

          @include('layouts.footer')
        </div>
  
@endsection