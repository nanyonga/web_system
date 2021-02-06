@extends('layouts.app', ['class' => 'register-page',  'contentClass' => 'register-page'])

@section('content')
<style>
 /* button.btn.btn-primary.btn-lg.btn-round{
    background:#1c478e !important;
    color:#ffffff;
}
h4.card-title.text-center{
    color:#1c478e !important;
    font-weight:900;
} */
</style>

        <div class="container">
            <div class="card card-register ">
                <form class="form" method="post" action="{{ route('register') }}">
                    @csrf

                    <div class="card-body">
                        <label for="" class="text-center ml-5">Name</label>
                        <div class="input-group mt-1 mb-3{{ $errors->has('name') ? ' has-danger' : '' }}">
                            
                            </div>
                            <input type="text" name="name" class="form-control p-3{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>
                        <label for="" class="ml-5">Email</label>
                        <div class="input-group mb-3{{ $errors->has('email') ? ' has-danger' : '' }}">
                            
                            <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>
                        <label for="" class="ml-5">Role</label>
                        <div class="input-group mb-4{{ $errors->has('role') ? ' has-danger' : '' }}">
                            <select name="role" id="Role" class="form-control">
                                <option value="Director">Director</option>
                                <option value="Admin">Administrator</option>
                            </select>
                            @include('alerts.feedback', ['field' => 'role'])
                        </div>
                        <label for="" class="ml-5">Password</label>
                        <div class="input-group mt-1{{ $errors->has('password') ? ' has-danger' : '' }}">
                    
                            <input type="password" name="password" class="form-control p-3{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}">
                            @include('alerts.feedback', ['field' => 'password'])
                        </div>

                        <label for="" class="ml-5">ConfirmPassword</label>
                        <div class="input-group mt-1">
                            <input type="password" name="password_confirmation" class="form-control p-3" placeholder="{{ __('Confirm Password') }}">
                        </div>
                        <div class="form-check text-left">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox">
                                <span class="form-check-sign"></span>
                                {{ __('I agree to the') }}
                                <a href="#">{{ __('terms and conditions') }}</a>.
                            </label>
                        </div>
                        <div class="d-flex flex-column m-3">
                            <button type="submit" class="btn btn-primary btn-round btn-lg">Register</button>
                        </div>
                    </div>
                   
                </form>
            </div>
        </div>
    </div>
@endsection
