@extends('layouts.app')

@section('content')
<style>
    .tab{
        text-align: center;
        background:#000;
        color:#fff;
        border-radius: 999px;
        width: 100%;
        padding: 8px;
        font-weight: 800;
    }

</style>
    <div class="header ">
        <div class="container">
            <div class="header-body text-center ">
                <div class="">
                        

                         <form method="POST" action="{{ route('payments') }}" class="m-2">
                            @csrf
                        
                            <div class="form-group  ">
                              <div class="form-group">
                                <label for="role" class="text-center">{{ __('SelectMonth') }}</label>
                                <div class="col-md-12">
                                    <select name="month" id="" class="form-control" 
                                    style="background: #000 !important; color:#fff !important">
                                      @if (count($months))
                                      @foreach ($months as $month)
                                      <option 
                                      style="color:#fff !important"
                                      value={{ $month->Month }}>{{ $month->Month }}</option>
                                  @endforeach
                                      @endif
                                      
                        
                                    </select>
                                    
                                    @error('month')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        
                                </div>
                            </div>
                            <div class="form-group ml-6 mt-2 d-flex flex-column">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('SelectMonth') }}
                                    </button>
                                
                            </div>
                        </form> 
                            
                         
                
                    
                    <div class="col-md-12">
                       <div class="tab md-12 mb-3">
    
                             MonthlySalary 
                             @if ($default ?? '')
                                 <b>{{$default ?? ''}}</b>
                             @endif
                         
                       </div>
                       <div class="card">
                        <div class="card-header card-header-primary">
                          <h4 class="card-title text-center">GeneralOfficers</h4>
                        </div>
                        @if (count($officers_general))
                        <div class="card-body">
                            <div class="table-responsive">
                              <table class="table">
                                <thead class=" text-primary">
                                  <th>
                                    OfficerName
                                  </th>
                                  <th>
                                    OfficerRole
                                  </th>
                                  <th>
                                    Amount
                                  </th>
                                </thead>
                                <tbody>
                                    @foreach ($officers_general as $officer)
                                    <tr>
                                        <td>
                                          {{$officer->OfficerName}}
                                        </td>
                                        <td>
                                          {{$officer->OfficerRole}}
                                        </td>
                                        <td>
                                            <small
                                          style="font-weight: bold"
                                          >shs</small>
                                          {{$officer->MonthlySalary}}
                                        </td>
                                        
                                       
                                      </tr>
                                        
                                    @endforeach
                                  
                                </tbody>
                              </table>
                              
                            </div>
                          </div>
                            
                        @endif
                       
                      </div>
                    </div>
              
                      


                       <div class="card">
                        <div class="card-header card-header-primary">
                          <h4 class="card-title text-center">StaffOfficers</h4>
                        </div>
                        @if (count($staff))
                        <div class="card-body">
                            <div class="table-responsive">
                              <table class="table">
                                <thead class=" text-primary">
                                  <th>
                                    StaffName
                                  </th>
                                  <th>
                                    OfficerRole
                                  </th>
                                  <th>
                                  Amount
                                  </th>
                                </thead>
                                <tbody>
                                    @foreach ($staff as $officer)
                                    <tr>
                                        <td>
                                          {{$officer->name}}
                                        </td>
                                        <td>
                                          {{$officer->role}}
                                        </td>
                                        <td>
                                            <small
                                          style="font-weight: bold"
                                          >shs</small>
                                          {{$officer->monthlysalary}}
                                        </td>
                                        
                                       
                                      </tr>
                                        
                                    @endforeach
                                  
                                </tbody>
                              </table>
                              
                            </div>
                          </div>
                            
                        @endif

                       
                      </div>
                          
                       
                       <div class="card">
                        <div class="card-header card-header-primary">
                          <h4 class="card-title text-center">RegiobalOfficers</h4>
                        </div>
                        @if ($officers_regional)
                        <div class="card-body">
                            <div class="table-responsive">
                              <table class="table">
                                <thead class=" text-primary">
                                  <th>
                                    OfficerName
                                  </th>
                                  <th>
                                    OfficerRole
                                  </th>
                                  <th>
                                    Amount
                                  </th>
                                </thead>
                                <tbody>
                                    @foreach ($officers_regional as $officer)
                                    <tr>
                                        <td>
                                          {{$officer->OfficerName}}
                                        </td>
                                        <td>
                                          {{$officer->OfficerRole}}
                                        </td>
                                        <td>
                                          <small
                                          style="font-weight: bold"
                                          >shs</small>{{$officer->MonthlySalary}}
                                        </td>
                                        
                                       
                                      </tr>
                                        
                                    @endforeach
                                  
                                </tbody>
                              </table>
                              
                            </div>
                          </div>
                            
                        @endif
                       
                      </div>
                    </div>
              
                       
                       <div class="card">
                        <div class="card-header card-header-primary">
                          <h4 class="card-title text-center">NationalOfficers</h4>
                        </div>
                        @if (count($officers_general))
                        <div class="card-body">
                            <div class="table-responsive">
                              <table class="table">
                                <thead class=" text-primary">
                                  <th>
                                    OfficerName
                                  </th>
                                  <th>
                                    OfficerRole
                                  </th>
                                  <th>
                                  Amount
                                  </th>
                                </thead>
                                <tbody>
                                    @foreach ($officers_national as $officer)
                                    <tr>
                                        <td>
                                          {{$officer->OfficerName}}
                                        </td>
                                        <td>
                                          {{$officer->OfficerRole}}
                                        </td>
                                        <td>
                                            <small
                                          style="font-weight: bold"
                                          >shs</small>
                                          {{$officer->MonthlySalary}}
                                        </td>
                                        
                                       
                                      </tr>
                                        
                                    @endforeach
                                  
                                </tbody>
                              </table>
                              
                            </div>
                          </div>
                            
                        @endif

                       
                      </div>
                      @include('layouts.footer');

                    </div>
              
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

