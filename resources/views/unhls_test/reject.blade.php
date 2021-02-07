@extends("layout")
@section("content")
    <div>
        <ol class="breadcrumb">
            <li><a href="{{{route('user.home')}}}">{{trans('messages.home')}}</a></li>
            <li><a href="{{ route('unhls_test.index') }}">{{ Lang::choice('messages.test',2) }}</a></li>
            <li class="active">{{trans('messages.reject-title')}}</li>
        </ol>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading ">
            <div class="container-fluid">
                <div class="row less-gutter">
                    <div class="col-md-11">
                        <span class="glyphicon glyphicon-filter"></span>{{trans('messages.reject-title')}}
                    </div>
                    <div class="col-md-1">
                        <a class="btn btn-sm btn-primary pull-right" href="#" onclick="window.history.back();return false;"
                           alt="{{trans('messages.back')}}" title="{{trans('messages.back')}}">
                            <span class="glyphicon glyphicon-backward"></span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <!-- if there are creation errors, they will show here -->
            @if($errors->all())
                <div class="alert alert-danger">
                    {{ HTML::ul($errors->all()) }}
                </div>
            @endif
            {{ Form::open(array('route' => 'unhls_test.rejectAction')) }}
            {{ Form::hidden('specimen_id', $test->specimen->id) }}
            {{ Form::hidden('test_id', $test->id) }}
            <div class="panel-body">
                <div class="display-details">
                    <p><strong>{{ Lang::choice('messages.test-type',1) }}</strong>
                        {{$test->testType->name}}</p>
                    <p><strong>{{trans('messages.specimen-type-title')}}</strong>
                        {{$test->specimen->specimenType->name}}</p>
                    <p>
                        <strong>{{trans('messages.specimen-number-title')}}</strong>
                        {{$test->specimen->id}}
                    </p>
                </div>
                <div id="reject-reason">
                    <div class="row">
                        <div class="form-group col-md-4">
                            {{ Form::label('rejectionReason', trans('messages.rejection-reason')) }}
                            {{ Form::select('rejectionReason[]', array(0 => '')+$rejectionReason->pluck('reason', 'id')->toArray(),
                                old('rejectionReason'), array('class' => 'form-control')) }}
                        </div>
                        {{ Form::button("<span class='glyphicon glyphicon-delete'></span> ".'Remove', ['class' => 'remove-reason btn-normal']) }}
                    </div>
                </div>
                <div>
                    <a href="#" id="add"><i>Add Rejection Reason if more than one</i></a></div>
                <div class="form-group">
                    {{ Form::label('rejecting_officer', trans("messages.rejecting-officer")) }}
                    {{Form::text('rejecting-officer', Auth::user()->name, old('rejecting_officer'),
                        array('class' => 'form-control'))}}
                </div>
                <div class="form-group">
                    {{ Form::label('cadre-obtainer', 'Cadre of Rejecting officer') }}
                    {{Form::text('cadre-obtainer',Auth::user()->designation, old('cadre_obtainer'), array('class' => 'form-control'))}}
                </div>
                <div class="form-group">
                    {{ Form::label('contacts', trans("messages.contacts").' of Rejecting officer') }}
                    {{Form::textarea('contacts', old('contacts'),
                        array('class' => 'form-control'))}}
                </div>
                <div class="form-group">
                    {{ Form::label('reject_explained_to', trans("messages.reject-explained-to")) }}
                    {{Form::text('reject_explained_to', old('reject_explained_to'),
                        array('class' => 'form-control'))}}
                </div>
                <div class="form-group actions-row">
                    {{ Form::button("<span class='glyphicon glyphicon-thumbs-down'></span> ".trans('messages.reject'),
                        ['class' => 'btn btn-danger', 'onclick' => 'submit()']) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@stop
