@extends('master')
@section('title', 'Edit a ticket')
@section('content')
<div class="container">
    <div class="row">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <div class="row justify-content-center">
        <div class="profile-header-container">
            <div class="profile-header-img">
                <img src="/storage/avatars/{{ $user->avatar }}" width="100" height="100">
                <!-- badge -->
                <div class="rank-label-container">
                    <span class="label label-default rank-label">{{$user->name}}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <form action="/avatar" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="form-group">
                <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp">
                <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should
                    not be more than 2MB.</small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<div class="container col-md-8 col-md-offset-2">
    <div class="well well bs-component">
        <form class="form-horizontal" method="post" action="{{ route('users.update' ,$user->id) }}">
            <input type="hidden" name="_method" value="PUT" />
            @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <fieldset>
                <legend>{{__('Edit YOUR PROFILE')}}</legend>
                <div class="row justify-content-center">
                    <div class="profile-header-container">
                        <div class="profile-header-img">
                            <img src="/storage/avatars/{{ $user->avatar }}" width="100" height="100">
                            <!-- badge -->
                            <div class="rank-label-container">
                                <span class="label label-default rank-label">{{$user->name}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="content" class="col-lg-2 control-label">{{__('Name')}}</label>
                    <div class="col-lg-10">
                        <textarea class="form-control" rows="3" id="content" name="name">{!! $user->name !!}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="content" class="col-lg-2 control-label">{{__('Email')}}</label>
                    <div class="col-lg-10">
                        <textarea class="form-control" rows="3" id="content"
                            name="email">{!! $user->email !!}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button class="btn btn-default">{{__('Cancel')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('Update')}}</butt on>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
@endsection