@extends("layout")
@section("content")

@if (Session::has('message'))
    <div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
@endif

    <div>
        <ol class="breadcrumb">
          <li><a href="{{ route('user.home') }}">{{ trans('messages.home') }}</a></li>
          <li><a href="{{ route('ward.index') }}">Health Units</a></li>
          <li class="active">Health Unit Details</li>
        </ol>
    </div>
    <div class="panel panel-primary ">
        <div class="panel-heading ">
            <span class="glyphicon glyphicon-adjust"></span>
            Health Unit Details
            <div class="panel-btn">
                <a class="btn btn-sm btn-info" href="{{ route('ward.edit', array($ward->id)) }}">
                    <span class="glyphicon glyphicon-edit"></span>
                    {{ trans('messages.edit') }}
                </a>
            </div>
        </div>
        <div class="panel-body">
            <div class="display-details">
                <h3 class="view"><strong>{{ Lang::choice('messages.name',1) }}:</strong>{{ $ward->name }} </h3>
                <p class="view-striped"><strong>{{ trans('messages.description') }}:</strong>
                    {{ $ward->description }}</p>

            </div>
        </div>
    </div>
@stop
