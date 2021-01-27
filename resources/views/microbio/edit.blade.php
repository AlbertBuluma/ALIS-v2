@extends("layout")
@section("content")
<div>
	<ol class="breadcrumb">
		<li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		<li><a href="{{ URL::route('unhls_patient.index') }}">{{ Lang::choice('messages.patient',2) }}</a></li>
		<li class="active">{{trans('Edit')}}</li>
	</ol>
</div>
<div class="panel panel-primary">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-edit"></span>
			{{trans('Edit Specimen')}}
		</div>
		<div class="panel-body">
		<!-- if there are creation errors, they will show here -->

			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif
			{{ Form::model($patient, array('route' => array('microbio.update', $patient->id), 'method' => 'PUT',
				'id' => 'form-edit-patient')) }}
		<input type="hidden" name="_token" value="{{ Session::token() }}"><!--to be removed function for csrf_token -->
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
						
			<div class="form-pane panel panel-default">			
				<div class="col-md-6">
					<div class="form-group">
						{{ Form::label('patient_name','Patient Name', array('text-align' => 'right', 'class' => 'required')) }}
						{{ Form::text('patient_name', $patient->name, array('class' => 'form-control')) }}
					</div>
					<div class="form-group">
						{{ Form::label('ulin', trans('messages.ulin'), array('class' => 'required')) }}
						{{ Form::text('ulin', $patient->ulin,	array('class' => 'form-control', 'readonly' =>'true')) }}
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
						{{ Form::label('nationality', trans('Nationality')) }}
						{{ Form::select('nationality', [' ' => '--- Select Nationality ---',
							'0' => trans('National'),'1' => trans('Refugee'),'2' => trans('Foreigner')], $patient->nationality,
						array('class' => 'form-control')) }}
					</div>
				</div>
				<div class="col-md-12">
					
					<div class="form-group">
						{{ Form::label('dob','Date Of Birth', array('class' => 'required')) }}
						{{ Form::text('dob', Input::old('dob'), array('class' => 'form-control input-sm')) }}
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
							{{ Form::text('phone_number', $patient->phone_number, array('class' => 'form-control', 'placeholder' => 'Patient phone number')) }}
						</div>
						<div class="form-group">
							{{ Form::label('visit_type', trans("messages.visit-type")) }}
							{{ Form::select('visit_type', [' ' => '--- Select visit type ---',
							'0' => trans("messages.out-patient"),'1' => trans("messages.in-patient"),'2' => trans("messages.refferrals")], null,
							 array('class' => 'form-control')) }}
						</div>
						<div class="form-group">
							{{ Form::label('facility','Facility Name:') }}
							{{ Form::select('facility', $facilities, $patient->visits, array('class' => 'form-control')) }}
						</div>
				</div>
				<div class="col-md-6">	
						<div class="form-group">
							{{ Form::label('ward','Ward/Clinic/Health Unit') }}
							{{ Form::select('ward', $ward, Input::old('ward_id'), array('class' => 'form-control')) }}
						</div>				
						<div class="form-group">
							{{ Form::label('bed_no','Bed No:', array('text-align' => 'right')) }}
							{{ Form::text('bed_no', Input::old('bed_no'), array('class' => 'form-control')) }}
						</div>						
						<div class="form-group">
							{{ Form::label('facility_lab_number','Facility Lab No:', array('text-align' => 'right')) }}
							{{ Form::text('facility_lab_number', Input::old('facility_lab_number'), array('class' => 'form-control')) }}
						</div>					
				</div>
			</div>
			<div class="form-pane panel panel-default">	
					<div class="col-md-6">
						<div class="form-group">
							{{ Form::label('district_residence', 'District of Residence') }}
							{{ Form::select('district_residence', $districts, $patient->district_residence,['class' => 'form-control']) }}
						</div>
						<div class="form-group">
							{{ Form::label('sub_county_residence', 'Sub County of Residence') }}
							{{ Form::text('sub_county_residence', $patient->microDetails->sub_county_residence, array('class' => 'form-control', 'placeholder' => 'sub county of residence')) }}
						</div>
						<div class="form-group">
							{{ Form::label('village_residence', 'Village of Residence') }}
							{{ Form::text('village_residence', Input::old('village_residence'), array('class' => 'form-control', 'placeholder' => 'village of residence')) }}
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							{{ Form::label('district_workplace', 'District of Work Place') }}
							{{ Form::select('district_workplace', $districts, $patient->district_workplace,['class' => 'form-control']) }}
						</div>
						<div class="form-group">
							{{ Form::label('sub_county_workplace', 'Sub County of Work Place') }}
							{{ Form::text('sub_county_workplace', $patient->microDetails->sub_county_workplace, array('class' => 'form-control', 'placeholder' => 'sub county of workplace')) }}
						</div>
						<div class="form-group">
							{{ Form::label('village_workplace', trans('messages.workplace-village')) }}
							{{ Form::text('village_workplace', Input::old('village_workplace'), array('class' => 'form-control', 'placeholder' => 'village of workplace')) }}
						</div>
					</div>
					<div class="form-group">
					<b>{{"Next of Kin Details"}}</b>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							{{ Form::label('name_next_kin', 'Name') }}
							{{ Form::text('name_next_kin', $patient->microDetails->name_next_kin, array('class' => 'form-control')) }}
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							{{ Form::label('contact_next_kin', 'Contact Number') }}
							{{ Form::text('contact_next_kin', $patient->microDetails->contact_next_kin, array('class' => 'form-control')) }}
						</div>
					</div>
			</div>
			<div class="panel-heading">
				<h3 class="panel-title"><b>{{"Clinical Information"}}</b></h3>
			</div>
				<div class="form-pane panel panel-default">								
					<div class="col-md-6">
						<div class="form-group">
							{{ Form::label('admission_date', 'Admission Date') }}
							{{ Form::text('admission_date', $patient->microDetails->admission_date, array('class' => 'form-control standard-datepicker', 'placeholder' => 'Ignore if not admitted')) }}
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							{{ Form::label('facility_transfered', 'Facility Patient transfered from') }}
							{{ Form::text('facility_transfered', $patient->microDetails->facility_transfered, array('class' => 'form-control')) }}
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							{{ Form::label('hospitalized', 'Hospitalized for more than 48 hours') }}
								<div>{{ Form::radio('hospitalized', '1', ($visits->hospitalized == 1) ? 'checked' : '' ) }}
								<span class="input-tag">Yes</span></div>
								<div>{{ Form::radio('hospitalized', '0', ($visits->hospitalized == 0) ? 'checked' : '' ) }}
								<span class="input-tag">No</span></div>
						</div>						
						<div class="form-group">
							{{ Form::label('onAntibiotics', 'Has the patient been on antibiotics during the infection') }}
								<div>{{ Form::radio('onAntibiotics', '1',  ($visits->on_antibiotics == 1) ? 'checked' : '' ) }}
								<span class="input-tag">Yes</span></div>
								<div>{{ Form::radio("onAntibiotics", '0',  ($visits->on_antibiotics == 0) ? 'checked' : '' ) }}
								<span class="input-tag">No</span></div>
						</div>
						<div class="form-group">
							{{ Form::label('transfered', 'Patient transferred from another health facility?') }}
							<div>{{ Form::radio('transfered', '1',  ($patient->microDetails->transfered == 1) ? 'checked' : '' ) }}
							<span class="input-tag">Yes</span></div>
							<div>{{ Form::radio("transfered", '0',  ($patient->microDetails->transfered == 0)  ? 'checked' : '' ) }}
							<span class="input-tag">No</span></div>
						</div>
						<div id="list_antibiotics" class="form-group @if($visits->on_antibiotics != 1) hidden @endif ">
							<div class="form-group">
							{{Form::label('drug', 'List Antibiotics')}}
							{{ Form::select('antibiotic[drug][]', $antibiotics, 
							$patientAntibiotics, ['class' => 'form-control', 'id' => 'select2']) }}
							</div>
							<div class="form-group">
							{{ Form::label('antibiotic_days', 'Days on Antibiotic') }}
							{{Form::text('antibiotic_days', $patient->microDetails->days_on_antibiotic, array('class' => 'form-control'))}}
							</div>
						</div>
					</div>
						<div class="col-md-6">
							<div class="form-group">
							{{ Form::label('requested_by', 'Requested By') }}
							{{Form::text('requested_by', $patient->microDetails->requested_by, array('class' => 'form-control'))}}
							</div>
							<div class="form-group">
							{{ Form::label('phone_contact', 'Phone Contact') }}
							{{Form::text('phone_contact', $patient->microDetails->clinician_contact, array('class' => 'form-control'))}}
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							{{ Form::label('clinical_notes', 'Clinical Notes') }}
							{{Form::textarea('clinical_notes', $patient->microDetails->clinical_notes, array('class' => 'form-control', 'rows'=>'2', 'placeholder' => 'Provisional diagnosis'))}}
							</div>
						</div>
				</div>
				<div class="panel-heading">
					<h3 class="panel-title">{{"Specimen Details"}}</h3>
				</div>
						<div class="col-md-6">
							<div class="form-group">
							{{ Form::label('testpurpose', 'Purpose of Test') }}
							{{Form::select('testpurpose', $testpurpose, Input::old('testpurpose'), ['class' => 'form-control']) }}
							</div>
						</div>
					<div class="form-pane panel panel-default">
						<div class="col-md-6">
							<div class="form-group">
								{{Form::label('specimen_type', 'Sample Type')}}
								{{ Form::select('specimen_type', $specimenType,
									Input::get('specimenType'),	['class' => 'form-control specimen-type']) }}
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
						    	{{ Form::select('test_type_category', $testCategory, Input::get('testCategory'),
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