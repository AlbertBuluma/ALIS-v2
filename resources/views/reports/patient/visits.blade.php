@extends("layout")
@section("content")
	<div>
		<ol class="breadcrumb">
		  <li><a href="{{ route('user.home') }}">{{ trans('messages.home') }}</a></li>
		  <li class="active">{{ Lang::choice('messages.report', 2) }}</li>
		</ol>
	</div>

<div class="panel panel-primary">
	<div class="panel-heading ">
		<span class="glyphicon glyphicon-user"> {{$patient->name}} </span>
		<span class="small" style="float:right;"> {{$patient->ulin}} </span>

	</div>
	<div class="panel-body">

	    @if(Session::has('message'))
			<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
		@endif
	    	</div>
	    	<table  id="patient_visits_datatable" class="row-border hover table table-bordered table-condensed table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Visit Lab Number</th>
                        <th>Visit Date</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                   <tbody>


                      @forelse($visits as $key => $visit)
				      <tr>
						<td>{{ $visit->visit_lab_number }}</td>
						<td>{{ $visit->created_at }}</td>
						<td>
						<!-- show the patient report(uses the show method found at GET /patientvisits/{id} -->
							<a class="btn btn-sm btn-info" href="{{ URL::to('patientvisitreport/' . $visit->id) }}" >
								<span class="glyphicon glyphicon-eye-open"></span>
								{{trans('messages.view-report')}}
							</a>
						</td>
					</tr>
				@empty
					<tr>
						<td colspan="5">{{trans('messages.no-records-found')}}</td>
					</tr>
				@endforelse
                  </tbody>

            </table>

</div>
@stop
