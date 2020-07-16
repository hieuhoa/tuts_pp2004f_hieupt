@extends('master')
@section('name', 'Register')
@section('content')
<div class="container col-md-6 col-md-offset-3">
    <div class="well well bs-component">
        <form class="form-horizontal" method="post">
            @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
            {!! csrf_field() !!}
            <fieldset>
                <legend>{{__('Register')}}</legend>
                <div class="form-group">
                    <label for="name" class="col-lg-2 control-label">{{__('Name')}}</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="name" placehol der="Name" name="name"
                            value="{{ old('name') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-lg-2 control-label">{{__('Email')}}</label>
                    <div class="col-lg-10">
                        <input type="email" class="form-control" id="email" placeh older="Email" name="email"
                            value="{{ old('email') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-lg-2 control-label">{{__('Password')}}</ label>
                        <div class="col-lg-10">
                            <input type="password" class="form-control" name="password">
                        </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-lg-2 control-label">{{__('Confirm Password')}}</label>
                    <div class="col-lg-10">
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="avatar"
                        class="col-md-4 col-form-label text-md-right">{{ __('Avatar (optional)') }}</label>

                    <div class="col-md-6">
                        <input id="avatar" type="file" class="form-control" name="avatar">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="reset" class="btn btn-default">{{__('Cancel')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('Submit')}}</butt on>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
@endsection