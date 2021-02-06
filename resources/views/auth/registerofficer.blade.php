@extends('layouts.app')

<style>
 
.shadow{
width:80%;
height: 50vh;
background:#ededed;
margin-bottom: 50px;

}

}
input.form-control{
    /* border:3px solid #000; */
    margin-left: 20px;
    margin-right: 20px;
    color:#000 !important;


}
.officer{
    margin-top: 10px !important;
    font-weight: 900;
    text-align: center;
    margin-left: 20px !important;
}
.tab{
   color:#ffffff;
   font-weight: bold;
   padding: 15px;
   border-radius: 999px;
}
.none{
    display: none;
}
</style>
@section('content')
<div class="container">
    <div class="centered">
             <div class="tab " id="none">
                 @if (session('status'))
                 {{
                     session('status')
                 }}
                     
                 @endif
        
             </div>
        <div class="shadow">
            <form class="form" method="post" action="{{ route('registerofficer') }}">
                @csrf
    
                <div class="">
                    <label class="officer">OfficerName</label>
                        <div class="form-group mr-5{{ $errors->has('officerName') ? ' has-danger' : '' }}">
                            
                            <input type="text" name="officerName" 
                            
                            class="form-control p-3 {{ $errors->has('officerName') ? ' is-invalid' : '' }}" 
                            placeholder="{{ __('officerName') }}">
                            @include('alerts.feedback', ['field' => 'officerName'])
                        </div>
                        <label class="officer">OfficerUserName</label>

                        <div class="form-group mt-2 mr-5{{ $errors->has('officerUserName') ? ' has-danger' : '' }}">
                        
                            <input type="officerUserName" placeholder="{{ __('officerUserName') }}" name="officerUserName" 
                            class="form-control p-3{{ $errors->has('officerUserName') ? ' is-invalid' : '' }}">
                            @include('alerts.feedback', ['field' => 'officerUserName'])
                        </div>
                    </div>
                    <div class="mt-3  p-3">
                        <button type="submit" href=""
                         class="btn btn-primary btn-lg btn-block mb-3 
                         font-bold">{{ __('Register') }}</button>
                         
                    </div>
                </div>
            </form>
            @include('layouts.footer')
        
    </div>
        </div>
        
    </div>
</div>
<script>
    setTimeout(()=>{
        const id = document.getElementById("none");
        id.classList.toggle("none");

    },5000)
</script>
    
@endsection