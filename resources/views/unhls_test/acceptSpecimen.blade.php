<!-- move to dcocumentation and bring back -->
<div class="display-details">
    {{ Form::hidden('specimen_id', $specimen->id) }}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <strong>{{ Lang::choice('messages.specimen-type',2) }}</strong>
            </div>
            <div class="col-md-8">
                {{ Form::select('specimen_type_id', $specimenTypes->lists('name','id'),
                    array($specimen->specimen_type_id), array('class' => 'form-control')) }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <strong>{{trans('messages.specimen-number')}}</strong>
            </div>
            <div class="col-md-8">
                {{$specimen->id}}
            </div>
        </div><br />
        <div class="row">
            <div class="col-md-4">
                <strong>{{trans('messages.time-collected')}}</strong>
            </div>
            <div class="col-md-8">
                {{$specimen->time_accepted}}
            </div>
        </div><br />
        <div class="row">
            <div class="col-md-4">
                <strong>{{trans('messages.specimen-status')}}</strong>
            </div>
            <div class="col-md-8">
                {{trans('messages.'.$specimen->specimenStatus->name)}}
            </div>
        </div><br />
    </div>
</div>
