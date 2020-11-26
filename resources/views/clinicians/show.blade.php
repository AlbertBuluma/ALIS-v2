@extends("layout")
@section("content")

@if (Session::has('message'))
    <div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
@endif

    <div>
        <ol class="breadcrumb">
          <li><a href="{{ route('user.home') }}">{{ trans('messages.home') }}</a></li>
          <li><a href="{{ route('clinicians.index') }}">Clinicians</a></li>
          <li class="active">Clinicians</li>
        </ol>
    </div>
    <div class="panel panel-primary ">
        <div class="panel-heading ">
            <span class="glyphicon glyphicon-adjust"></span>
            Clinician Details
            <div class="panel-btn">
                <a class="btn btn-sm btn-info" href="{{ route('clinicians.edit', array($clinician->id)) }}">
                    <span class="glyphicon glyphicon-edit"></span>
                    {{ trans('messages.edit') }}
                </a>
            </div>
        </div>
        <div class="panel-body">
            <div class="display-details">
                <h3 class="view"><strong>{{ Lang::choice('messages.name',1) }}:</strong>{{ $clinician->name }} </h3>
                <p class="view-striped"><strong>Cadre:</strong>
                    {{ $clinician->cadre }}</p>

                <p class="view-striped"><strong>Phone:</strong>
                    {{ $clinician->phone }}</p>
                <p class="view-striped"><strong>Email:</strong>
                    {{ $clinician->email }}</p>
            </div>
        </div>
    </div>
@stop
