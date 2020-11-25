@extends("layout")
@section("content")
<div>
  <ol class="breadcrumb">
    <li><a href="{{ route('user.home') }}">{{ trans('messages.home') }}</a></li>
    <li><a href="{{ route('bbincidence.create') }}">Register Incident</a></li>
    <li><a href="{{ route('bbincidence.index') }}">BB summary</a></li>
    <li class="active">Facility Report</li>
  </ol>
</div>
<div class=''>
  {{ Form::open(array('route' => array('bbincidence.bbfacilityreport'), 'class'=>'form-inline',
  'role'=>'form', 'method'=>'GET')) }}
  <div class="form-group">
    {{ Form::label('datefrom', "Date From") }}
{{--    {{ Form::text('datefrom', Input::get('datefrom'), array('class' => 'form-control test-search standard-datepicker', 'required' => 'required')) }}--}}
    {{ Form::text('datefrom', old('datefrom'), array('class' => 'form-control test-search standard-datepicker', 'required' => 'required')) }}
  </div>
  <div class="form-group">
    {{ Form::label('dateto', "Date To") }}
{{--    {{ Form::text('dateto', Input::get('dateto'), array('class' => 'form-control test-search standard-datepicker', 'required' => 'required')) }}--}}
    {{ Form::text('dateto', old('dateto'), array('class' => 'form-control test-search standard-datepicker', 'required' => 'required')) }}
  </div>
  <div class="form-group">
    {{ Form::button("<span class='glyphicon glyphicon-search'></span> ".trans('messages.filter'),
    array('class' => 'btn btn-primary', 'type' => 'submit')) }}
  </div>
  {{ Form::close() }}
</div>
<br>
<div class="panel panel-primary">
  <div class="panel-heading">
    <span class="glyphicon glyphicon-stats"></span>
    Facility BB Incident Report
    @if(isset($_GET['datefrom']) and isset($_GET['datefrom']))
    (Filtered) - {{$_GET['datefrom']}} to {{$_GET['dateto']}}
    @else (Not Filtered) @endif
    <a class="btn btn-sm btn-info" href="javascript:printSpecial('Facility BB Incident Report')">
      <span class="glyphicon glyphicon-print"></span> PRINT
    </a>
  </div>

  <div class="panel-body row"> <div id="printReady">

    <div class="display-details col-sm-6">
      <h4>SUMMARY OF FACILITY BB INCIDENTS</h4>
      <table class="table table-stripped table-hover">
        <thead>
          @foreach($bbincidentnatureclasses as $key => $value)
          <tr>
            <th style="color:red;" >{{$value->class}}</th>
            <tr>
              <td>
                <table class="table table-bordered table-hover">
                  <?php
                  $bbincidentnaturecount = App\Models\Bbincidence::countbbincidentcategories($value->class);
                  ?>
                  @foreach($bbincidentnaturecount as $bbincident => $bbincidents)
                  <tr>
                    <td>{{$bbincidents->name}}</td>
                    <td>{{$bbincidents->total}}</td>
                  </tr>
                  @endforeach
                  <th>Total</th>
                  <td>  <?php
                  $bbnaturecount = App\Models\BbincidenceNatureIntermediate::select('bbincidence_id', 'nature_id');
                  $sum = $bbnaturecount->groupBy('bbincidence_id', 'nature_id')->count('nature_id');
                  ?>
                  {{ $sum}}</td>

                </table>
              </td>
            </tr>
            @endforeach
          </table>
        </div>


        <div class="display-details col-sm-6">

          <h4>FACILITY INCIDENT MANAGEMENT SUMMARY</h4> <br><br>
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th> Referral Status</th>
                <th> Number</th>
              </tr>
            </thead>

            @foreach($countbbincidentreferralstatus as $key => $value)

            @if($value->referral_status=='')
            <td style="color:blue">UNKNOWN</td>
            @else

            <td style="color:green">{{$value->referral_status}}</td>
            @endif

            <td>{{$value->total}}</td>

            @endforeach
          </tr>
          <tbody>
            <th>Completion Status</th>

            <?php
            $countbbincidentcompletionstatus = App\Models\Bbincidence::countbbincidentcompletionstatus();
            ?>

            @foreach($countbbincidentcompletionstatus as $key => $value)
            <tr>
              <th style="color:orange">{{$value->status}}</th>
              <td>{{$value->total}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="display-details col-sm-6">
        <div>
          <h4>SUMMARY ON INCIDENT PREVALENCE AMONG PERSONNEL & OTHER FACILITY CLIENTS</h4>
          <table class="table table-bordered table-hover">
            <thead>
            <?php
            $bbincidentprevalencecount = App\Models\Bbincidence::countbbincidentprevalence();
            ?>

            @foreach($bbincidentprevalencecount as $k => $v)
            <tr><td>@if($v->personnel_category=='') -- @else {{$v->personnel_category}} @endif</td><td>{{$v->total}}</td></tr>
            @endforeach
          </table>
        </div>

        <br>

        <div>
          <h4>SUMMARY ON SPECIFIC CAUSES OF INCIDENTS</h4>
          <table class="table table-bordered table-hover">
            <thead>
            <?php $bbincidentcausecount = App\Models\Bbincidence::countbbincidentcauses(); ?>
            @foreach($bbincidentcausecount as $k => $v)
            <tr><td>{{$v->causename}}</td><td>{{$v->total}}</td></tr>
            @endforeach
          </table>
        </div>

        <br>

        <div>
          <h4>SUMMARY ON CORRECTIVE ACTIONS TAKEN TO MANAGE INCIDENTS <i>(depending on cause of incident)</i></h4>
          <table class="table table-bordered table-hover">
            <thead>
            <?php $bbincidentactioncount = App\Models\Bbincidence::countbbincidentactions(); ?>
            @foreach($bbincidentactioncount as $k => $v)
            <tr><td>{{$v->actionname}}</td><td>{{$v->total}}</td></tr>
            @endforeach
          </table>
        </div>



      </div></div>

    </div>

  </div>
  @stop
