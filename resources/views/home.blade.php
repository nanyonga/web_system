@extends('layouts.app')

@section('content')
<style>
    .patients{
        text-align: center;
        background:#000;
        color:#fff;
        border-radius: 999px;
        width: 100%;
        padding: 8px;
        font-weight: 800;
    }
    .patients-red{
        text-align: center;
        background:red;
        color:#fff;
        border-radius: 999px;
        width: 100%;
        padding: 8px;
        font-weight: 800;
    }
    .none{
      display: none;
    }
    
</style>
    <div class="header ">
        <div class="container">
            <div class="header-body text-center ">
                <div class="row ">
                  @if (session('status'))
                  <p class="tab-red " id="remove" >{{session('status')}}</p>
                      
                  @endif
                    <div class="col-md-12">
                       <div class="patients md-12 mb-3">
                         PATIENTS TREATED
                       </div>

                          <h4 class="card-title text-center">GeneralHospitals</h4>
                        </div>
                        @if (count($officers_general))
                        <div class="card-body">
                            <div >
                              <table class="table">
                                <thead class=" text-primary">
                                  <th>
                                    OfficerName
                                  </th>
                                  <th>
                                    OfficerUserName
                                  </th>
                                  <th>
                                    TotalPatients
                                  </th>
                                </thead>
                                <tbody>
                                    @foreach ($officers_general as $officer)
                                    <tr>
                                        <td>
                                          {{$officer->OfficerName}}
                                        </td>
                                        <td>
                                          {{$officer->OfficerUserName}}
                                        </td>
                                        <td>
                                          {{$officer->total_patients}}
                                        </td>
                                        
                                       
                                      </tr>
                                        
                                    @endforeach
                                  
                                </tbody>
                              </table>
                              
                          
                            
                        @endif
                       
                      </div>
                    </div>
              

                       

                          <h4 class="card-title text-center">RegionalHospitals</h4>
                        </div>
                        @if ($officers_regional)
                        <div class="card-body">
                            <div class="">
                              <table class="table">
                                <thead class=" text-primary">
                                  <th>
                                    OfficerName
                                  </th>
                                  <th>
                                    OfficerUserName
                                  </th>
                                  <th>
                                    TotalPatients
                                  </th>
                                </thead>
                                <tbody>
                                    @foreach ($officers_regional as $officer)
                                    <tr>
                                        <td>
                                          {{$officer->OfficerName}}
                                        </td>
                                        <td>
                                          {{$officer->OfficerUserName}}
                                        </td>
                                        <td>
                                          {{$officer->total_patients}}
                                        </td>
                                        
                                       
                                      </tr>
                                        
                                    @endforeach
                                  
                                </tbody>
                              </table>
                              

                            
                        @endif
                       
              
                      
                          <h4 class="card-title text-center">NationalHospital</h4>
                        </div>
                        @if (count($officers_national))
                        
                              <table class="table">
                                <thead class=" text-primary">
                                  <th>
                                    OfficerName
                                  </th>
                                  <th>
                                    OfficerUserName
                                  </th>
                                  <th>
                                    TotalPatients
                                  </th>
                                </thead>
                                <tbody>
                                    @foreach ($officers_national as $officer)
                                    <tr>
                                        <td>
                                          {{$officer->OfficerName}}
                                        </td>
                                        <td>
                                          {{$officer->OfficerUserName}}
                                        </td>
                                        <td>
                                          {{$officer->total_patients}}
                                        </td>
                                        
                                       
                                      </tr>
                                        
                                    @endforeach
                                  
                                </tbody>
                              </table>
                              
                            
                            
                        @endif

                  

                      @if (count($promotions))
\
                                <h6 class="title d-inline">WaitingList {{count($promotions)}}</h6>

                            
          
                            <hr style="font-weight: bold">
                            <div class="card-body ">
                                <div class="d-flex flex-column mt-2 mb-2  responsive">
                                    <div class="data container">
                                        <div class="">
                                            <table class="table">
                                              <thead class=" text-primary">
                                                <th>
                                                  OfficerUserName
                                                </th>
                                                <th>
                                                  Award
                                                </th>
                                                <th>
                                                  Pending
                                                </th>
                                              </thead>
                                              <tbody>
                                            
                                                  @foreach ($promotions as $promotion)
                                                  <tr>
                                                      <td>
                                                        {{$promotion->OfficerUserName}}
                                                      </td>
                                                      <td>
                                                        {{$promotion->Award}}
                                                      </td>
                                                      <td>
                                                        {{$promotion->Pending}}
                                                      </td>
                                                      
                                                     
                                                    </tr>
                                                      
                                                  @endforeach
                                                
                                              </tbody>
                                            </table>
                                          
                                        
                                    
                                
                                       
                                </div>
                            </div>
                        </div>
                    </div>
                          
            
                          
                      @endif
                      
                      
                    </div>
                    @include('layouts.footer')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
      $getId = document.getElementById('remove')
      console.log($getId);
      setTimeout((
        $getId.ClassList.toggle('none');
      ), 5000)
    </script>
@endsection
