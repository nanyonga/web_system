@extends('layouts.app', 
['class' => 'login-page', 'contentClass' => 'login-page'])


@section('content')
    <div class="col-md-10 text-center ml-auto mr-auto">
    <h1 class="text-center m-4">LOGIN PAGE</h1>

    </div>
    <div class="col-lg-4 col-md-6 ml-auto mr-auto">
    
        <form class="form" method="post" action="{{ route('login') }}">
            @csrf

            <div class="card card-login card-white">
                <div class="card-body">
                    <label for="">Name</label>
                    <div class="input-group mt-1{{ $errors->has('email') ? ' has-danger' : '' }}">
                        
                        <input type="email" name="email" 
                        
                        class="form-control p-4{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                        placeholder="{{ __('Email') }}">
                        @include('alerts.feedback', ['field' => 'email'])
                    </div>
                    <label for="">Email</label>
                    <div class="input-group mt-1{{ $errors->has('password') ? ' has-danger' : '' }}">
                        
                        
                        <input type="password" placeholder="{{ __('Password') }}" name="password" 
                        class="form-control p-4{{ $errors->has('password') ? ' is-invalid' : '' }}">
                        @include('alerts.feedback', ['field' => 'password'])
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" href=""
                     class="btn btn-primary btn-lg btn-block mb-3 font-bold">{{ __('Login') }}</button>
                    
                    
                </div>
            </div>
        </form>
    </div>
@endsection
