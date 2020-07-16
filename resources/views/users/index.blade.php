@extends('master')
@section('title', 'Edit a ticket')
@section('content')
<div class="container col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2> {{__('UserProfile')}}</h2>
        </div>
        <table class="table">
        <thead>
                <tr>
                    <th>{{__('Name')}}</th>
                    <th>{{__('Email')}}</th>
                    <th>{{__('created_at')}}</th>
                    <th>{{__('updated_at')}}</th>
                    <th>{{__('your avatar')}}</th>
                </tr>
        </thead>
            <tbody>
                <tr>
                    <td>{!! $user->name !!}</td>
                    <td>{!! $user->email !!}</td>
                    <td>{!! $user->created_at !!}</td>
                    <td>{!! $user->updated_at !!}</td>
                    <td><img src="/storage/avatars/{{ $user->avatar }}" width="100" height="100"></td>
                </tr>
            </tbody>
        </table>
    </div>
    <h1><a href="{{ route('users.edit' ,$user->id) }}">EDIT YOUR PROFILE</a></h1>
</div>
@endsection