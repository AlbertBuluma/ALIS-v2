<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-theme.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/layout.css') }}" />
    <title>{{ config('kblis.name') }} {{ config('kblis.version') }}</title>
</head>
<body>
<div class="container login-page">
    <div class="header">
        @include('user.loginHeader')
    </div>
    <div class="login-form">
        <div class="form-head">
            <h4> FACILITY SETTINGS </h4>
            @if($errors->all())
                <div class="alert alert-danger">
                    {{ HTML::ul($errors->all()) }}
                </div>
            @elseif (Session::has('message'))
                <div class="alert alert-danger">{{ Session::get('message') }}</div>
            @elseif(Session::has('info'))
                {{--                <div class="alert alert-success">Connection Established</div>--}}
                <div class="alert alert-success">{{ Session::get('info') }}</div>
            @endif
        </div>

        {{ Form::open(array(
            "route"        => "facility.settings",
            "autocomplete" => "off",
            "class" => "form-horizontal",
            "role" => "form"
        )) }}
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon glyphicon glyphicon-user"></span>
                {{ Form::text("username", old("username"), array(
                    "placeholder" => trans('messages.username'),
                    "class" => "form-control"
                )) }}
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon glyphicon glyphicon-lock"></span>
                {{ Form::password("password", array(
                    "placeholder" => Lang::choice('messages.password',1),
                    "class" => "form-control"
                )) }}
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon glyphicon glyphicon-lock"></span>
                {{ Form::text("host_ip", old("host_ip"), array(
                    "placeholder" => trans('messages.host_ip'),
                    "class" => "form-control"
                )) }}

                {{ Form::text("host_ip_port_number", old("host_ip_port_number"), array(
                    "placeholder" => trans('messages.host_ip_port_number'),
                    "class" => "form-control"
                )) }}
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon glyphicon glyphicon-lock"></span>
                {{ Form::text("main_ip", old("main_ip"), array(
                    "placeholder" => trans('messages.main_ip'),
                    "class" => "form-control"
                )) }}

                {{ Form::text("main_ip_port_number", old("main_ip_port_number"), array(
                    "placeholder" => trans('messages.main_ip_port_number'),
                    "class" => "form-control"
                )) }}
            </div>
        </div>
        {{--        <div class="form-group">--}}
        {{--            <div class="input-group">--}}
        {{--                <span class="input-group-addon glyphicon glyphicon-info-sign"></span>--}}
        {{--                {{ Form::text("url", old("url"), array(--}}
        {{--                    "placeholder" => trans('Facility URL'),--}}
        {{--                    "class" => "form-control"--}}
        {{--                )) }}--}}
        {{--            </div>--}}
        {{--        </div>--}}
        <div class="form-group">
            <div class="row">
                {{ Form::button(trans('messages.facility_settings'), array(
                    "type" => "submit",
                    "class" => "btn btn-primary btn-block"
                )) }}
            </div>
        </div>

        <div class="form-group">
            <div>
                <button class="btn btn-success btn-block">
                    {{--                    <a href="{{ action('UserController@testConnection') }}">Test connection</a>--}}
                    <a href="{{ route('facility.connection') }}">Test connection</a>
                </button>
            </div>
        </div>
        {{ Form::close() }}
        <div class="smaller-text alone foot">
            <p><a href="i/guide.pdf">User Guide</a></p>
            <p>
                {{ config('kblis.name') }} - a port of the Basic Laboratory Information System
                (BLIS) to Laravel by iLabAfrica. BLIS was originally developed by C4G.
            </p>
        </div>
    </div>
    <div class="footer">
        @include('user.loginFooter')
    </div>

</div>
</body>
</html>
