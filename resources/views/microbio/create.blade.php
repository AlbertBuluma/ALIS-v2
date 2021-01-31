@extends("layout")
@section("content")
	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		  <li><a href="{{ route('unhls_patient.index') }}">{{ Lang::choice('messages.patient',2) }}</a></li>
		  <li class="active">{{trans('messages.sample-patient')}}</li>
		</ol>
	</div>

	<div class="panel panel-primary">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-user"></span>
			{{trans('Recieve Specimen')}}
		</div>
		<div class="panel-body">
		<!-- if there are creation errors, they will show here -->

			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif
			{{ Form::open(array('url' => 'microbio', 'id' => 'form-create-micro')) }}
		<input type="hidden" name="_token" value="{{ Session::token() }}"><!--to be removed function for csrf_token -->
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">

			<fieldset class="scheduler-border">
		    	<legend class="scheduler-border">Patient Information</legend>
				<div class="col-md-6">
					<div class="form-group">
						{{ Form::label('patient_name','Patient Name', array('text-align' => 'right', 'class' => 'required')) }}
						{{ Form::text('patient_name', old('patient_name'), array('class' => 'form-control')) }}
					</div>
					<div class="form-group">
						{{ Form::label('ulin', trans('messages.ulin'), array('class' => 'required')) }}
						@if($ulinFormat == 'Manual')
						{{ Form::text('ulin', old('ulin'),array('class' => 'form-control')) }}
						@else
						{{ Form::text('ulin', '',
						array('class' => 'form-control', 'readonly' =>'true', 'placeholder' => 'Auto generated upon succesfull save!')) }}
						@endif
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						{{ Form::label('gender', trans('messages.sex'), array('class' => 'required')) }}
						<div>{{ Form::radio('gender', '0', true) }}
						<span class="input-tag">{{trans('messages.male')}}</span></div>
						<div>{{ Form::radio("gender", '1', false) }}
						<span class="input-tag">{{trans('messages.female')}}</span></div>
					</div>
					<div class="form-group">
						{{ Form::label('nationality', trans('Nationality'), array('class' => 'required')) }}
						{{ Form::select('nationality',  array_merge(array(' ' => '--- Select Nationality ---'), $nation),
						Illuminate\Support\Facades\Request::get('nationality'),['class' => 'form-control'])  }}
					</div>
				</div>
				<div class="col-md-12">

					<div class="form-group">
						{{ Form::label('dob','Date Of Birth', array('class' => 'required')) }}
						{{ Form::text('dob', old('dob'), array('class' => 'form-control input-sm')) }}
					</div>
					<div class="form-group">
						<label for="age">Age</label>
						<input type="text" name="age" id="age" class="form-control input-sm" size="11">
						<select name="age_units" id="id_age_units" class="form-control input-sm">
							<option value="Y">Years</option>
							<option value="M">Months</option>
							<option value="D">Days</option>
						</select>
					</div>
				</div>
				<div class="col-md-6">
						<div class="form-group">
							{{ Form::label('phone_number', trans('messages.phone-number')) }}
							{{ Form::text('phone_number', old('phone_number'), array('class' => 'form-control', 'placeholder' => 'Patient phone number')) }}
						</div>
						<div class="form-group">
							{{ Form::label('visit_type', trans("messages.visit-type")) }}
							{{ Form::select('visit_type',array_merge(array(' ' => '--- Select visit type  ---'), $visitType),
							Illuminate\Support\Facades\Request::get('visit_type'),['class' => 'form-control'])  }}
						</div>
				</div>
				<div class="col-md-6">
						<div class="form-group">
							{{ Form::label('ward','Ward/Clinic/Health Unit') }}
							{{ Form::select('ward', $ward, Illuminate\Support\Facades\Request::get('ward'), array('class' => 'form-control')) }}
						</div>
						<div class="form-group">
							{{ Form::label('patient_number', trans('messages.patient-number'), array('class' => 'required')) }}
							{{ Form::text('patient_number', old('patient_number'), array('class' => 'form-control')) }}
						</div>
				</div>
			</fieldset>
			<fieldset class="scheduler-border">
		    	<legend class="scheduler-border">Resident Details</legend>
					<div class="col-md-6">
						<div class="form-group">
							{{ Form::label('district_residence', 'District of Residence') }}
							{{ Form::select('district_residence', $districts, Illuminate\Support\Facades\Request::get('district_residence'),['class' => 'form-control']) }}
						</div>
						<div class="form-group">
							{{ Form::label('sub_county_residence', 'Sub County of Residence') }}
							{{ Form::text('sub_county_residence', old('sub_county_residence'), array('class' => 'form-control', 'placeholder' => 'sub county of residence')) }}
						</div>
						<div class="form-group">
							{{ Form::label('village_residence', 'Village of Residence') }}
							{{ Form::text('village_residence', old('village_residence'), array('class' => 'form-control', 'placeholder' => 'village of residence')) }}
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							{{ Form::label('district_workplace', 'District of Work Place') }}
							{{ Form::select('district_workplace', $districts, Illuminate\Support\Facades\Request::get('district_workplace'),['class' => 'form-control']) }}
						</div>
						<div class="form-group">
							{{ Form::label('sub_county_workplace', 'Sub County of Work Place') }}
							{{ Form::text('sub_county_workplace', old('sub_county_workplace'), array('class' => 'form-control', 'placeholder' => 'sub county of workplace')) }}
						</div>
						<div class="form-group">
							{{ Form::label('village_workplace', trans('messages.workplace-village')) }}
							{{ Form::text('village_workplace', old('village_workplace'), array('class' => 'form-control', 'placeholder' => 'village of workplace')) }}
						</div>
					</div>
					<div class="form-group">
					<b>{{"Next of Kin Details"}}</b>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							{{ Form::label('name_next_kin', 'Name') }}
							{{ Form::text('name_next_kin', old('name_next_kin'), array('class' => 'form-control')) }}
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							{{ Form::label('contact_next_kin', 'Contact Number') }}
							{{ Form::text('contact_next_kin', old('contact_next_kin'), array('class' => 'form-control')) }}
						</div>
					</div>
			</fieldset>

			<fieldset class="scheduler-border">
		    	<legend class="scheduler-border">Clinical Information</legend>
					<div class="col-md-6">
						<div class="form-group">
							{{ Form::label('admission_date', 'Admission Date') }}
							{{ Form::text('admission_date', old('admission_date'), array('class' => 'form-control standard-datepicker', 'placeholder' => 'Ignore if not admitted')) }}
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							{{ Form::label('facility_transfered', 'Facility Patient transfered from') }}
							{{ Form::text('facility_transfered', old('facility_transfered'), array('class' => 'form-control')) }}
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							{{ Form::label('hospitalized', 'Hospitalized for more than 48 hours') }}
								<div>{{ Form::radio('hospitalized', '1', false) }}
								<span class="input-tag">Yes</span></div>
								<div>{{ Form::radio("hospitalized", '0', false) }}
								<span class="input-tag">No</span></div>
						</div>
						<div class="form-group">
							{{ Form::label('onAntibiotics', 'Has the patient been on antibiotics during the infection') }}
								<div>{{ Form::radio('onAntibiotics', '1',  false) }}
								<span class="input-tag">Yes</span></div>
								<div>{{ Form::radio("onAntibiotics", '0',  false) }}
								<span class="input-tag">No</span></div>
						</div>
						<div class="form-group">
							{{ Form::label('transfered', 'Patient transferred from another health facility?') }}
							<div>{{ Form::radio('transfered', '1',  false) }}
							<span class="input-tag">Yes</span></div>
							<div>{{ Form::radio("transfered", '0',  false) }}
							<span class="input-tag">No</span></div>
						</div>
						<div id="list_antibiotics" class="form-group hidden">
							<div class="form-group">
							{{Form::label('drug', 'List Antibiotics')}}
							{{ Form::select('antibiotic[drug][]', $antibiotics,
							Illuminate\Support\Facades\Request::get('antibiotic'), ['class' => 'form-control', 'id' => 'select2']) }}
							</div>
							<div class="form-group">
							{{ Form::label('antibiotic_days', 'Days on Antibiotic') }}
							{{Form::text('antibiotic_days', old('antibiotic_days'), array('class' => 'form-control'))}}
							</div>
						</div>
					</div>
						<div class="col-md-6">
							<div class="form-group">
							{{ Form::label('requested_by', 'Requested By') }}
							{{Form::text('requested_by', old('physician'), array('class' => 'form-control'))}}
							</div>
							<div class="form-group">
							{{ Form::label('phone_contact', 'Phone Contact') }}
							{{Form::text('phone_contact', old('phone_contact'), array('class' => 'form-control'))}}
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							{{ Form::label('clinical_notes', 'Provisional diagnosis') }}
							{{Form::textarea('clinical_notes', old('physician'), array('class' => 'form-control', 'rows'=>'2', 'placeholder' => 'Provisional diagnosis'))}}
							</div>
						</div>
				</fieldset>

						<!-- <div class="col-md-6">
							<div class="form-group">
							{{ Form::label('testpurpose', 'Purpose of Test') }}
							{{Form::select('testpurpose', $testpurpose, old('testpurpose'), ['class' => 'form-control']) }}
							</div>
						</div> -->
				<fieldset class="scheduler-border">
		    	<legend class="scheduler-border">Specimen Details</legend>
					<div class="form-pane panel panel-default">
						<div class="col-md-6">
							<div class="form-group">
								{{Form::label('specimen_type', 'Sample Type', array('class' => 'required'))}}
								{{ Form::select('specimen_type', $specimenType,
									Illuminate\Support\Facades\Request::get('specimenType'),	['class' => 'form-control specimen-type']) }}
							</div>
						<div class="form-group">
								<label for="collection_date">Time of Sample Collection</label>
									<input class="form-control"
										data-format="YYYY-MM-DD HH:mm"
										data-template="DD / MM / YYYY HH : mm"
										name="collection_date"
										type="text"
										id="collection-date"
										value="{{$collectionDate}}">
						</div>
						<div class="form-group">
								<label for="reception_date">Time Sample was Received in Lab</label>
									<input class="form-control"
										data-format="YYYY-MM-DD HH:mm"
										data-template="DD / MM / YYYY HH : mm"
										name="reception_date"
										type="text"
										id="reception-date"
										value="{{$receptionDate}}">
						</div>
						<div class="form-group">
						        {{Form::label('test_type_category', 'Lab Section')}}
						    	{{ Form::select('test_type_category', $testCategory, Illuminate\Support\Facades\Request::get('testCategory'),
								    ['class' => 'form-control test-type-category']) }}
											</div>
						</div>
							<div class="col-md-6 test-type-list">
							</div>
					        <div class="col-md-12">
							    <a class="btn btn-default add-test-to-list"
							      	href="javascript:void(0);"
							        data-measure-id="0"
							        data-new-measure-id="">
							    <span class="glyphicon glyphicon-plus-sign"></span>Add Test to List</a>
							</div>
					</div>
				<div class="form-pane panel panel-default test-list-panel">
					    <div class=" test-list col-md-12">
					        <div class="col-md-4">
								<b>Specimen</b>
						    </div>
							<div class="col-md-4">
									<b>Lab Section</b>
							</div>
							<div class="col-md-4">
								<div class="col-md-11"><b>Test</b></div>
							 	<div class="col-md-1"></div>
						    </div>
					    </div>
				</div>
			</fieldset>
				<div class="form-group actions-row">
						{{ Form::button("<span class='glyphicon glyphicon-save'></span> ".trans('messages.save-test'),
						['class' => 'btn btn-primary', 'onclick' => 'submit()', 'alt' => 'save_new_test']) }}
				</div>
			</div>

				<div class="hidden test-list-loader">
				    <div class="col-md-12 new-test-list-row">
				        <div class="col-md-4 specimen-name">
				        </div>
				        <div class="col-md-4 test-type-category-name">
				        </div>
				        <div class="col-md-4">
				            <div class="col-md-11 test-type-name">
				                <input class="specimen-type-id" type="hidden">
				                <input class="test-type-id" type="hidden">
				            </div>
				            <button class="col-md-1 delete-test-from-list close" aria-hidden="true" type="button"
				                title="{{trans('messages.delete')}}">×</button>
				        </div>
				    </div><!-- Test List Item -->
				</div><!-- Test List Item Loader-->
			</div>
		</div>
	</div>
	{{ Form::close() }}
	</div>
</div>

@stop
