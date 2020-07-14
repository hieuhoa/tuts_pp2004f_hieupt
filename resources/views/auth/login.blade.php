@extends('master')
@section('name', 'Login')
@section('content')
<div class="container col-md-6 col-md-offset-3">
    <div class="well well bs-component">
        <form class="form-horizontal" method="post">
            @if (session('oauth_error'))
            {{ session('oauth_error') }}
            @endif
            @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
            {!! csrf_field() !!}
            <fieldset>
                <legend>{{__('Login')}}</legend>
                <div class="form-group">
                    <label for="email" class="col-lg-2 control-label">{{__('Email')}}</label>
                    <div class="col-lg-10">
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-lg-2 control-label">{{__('Password')}}</ label>
                        <div class="col-lg-10">
                            <input type="password" class="form-control" name="password">
                        </div>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember"> {{__('Remember Me')}}?
                    </label>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="submit" class="btn btn-primary">{{__('Login')}}</button>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                    <li><a href="{{ route('login.provider', 'google') }}"  class="btn btn-secondary">{{ __('Google Sign in') }}</a></li>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
@endsection