@extends("layout")
@section("content")
	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		  <li><a href="{{ URL::route('unhls_patient.index') }}">{{ Lang::choice('messages.patient',2) }}</a></li>
		  <li class="active">{{trans('messages.create-patient')}}</li>
		</ol>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-user"></span>
			{{trans('Create EID Patient')}}
		</div>
		<div class="panel-body">
		<!-- if there are creation errors, they will show here -->

			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif

			{{ Form::open(array('url' => 'unhls_patient', 'id' => 'form-create-patient')) }}
				<div class="form-group col-md-12">
					<div class='col-md-4'>
					{{ Form::label('patient_number', trans('messages.patient-number'), array ('class' => 'col-md-2')) }}
					{{ Form::text('patient_number', Input::old('patient_number'),
						array('class' => 'form-control')) }}
					</div>
				</div>

				<div class="form-group col-md-12">
					<div class="col-md-4">
					{{ Form::label('name', "Infant Name", array('class' => 'required col-md-2')) }}
					{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
					</div>

					<div class="col-md-4">
					{{ Form::label('health_unit', "Health Unit:", array('class' => 'required col-md-2')) }}
					{{ Form::text('health_unit', \Config::get('constants.FACILITY_NAME'), array('class' => 'form-control')) }}
					</div>
				</div>

				<div class="form-group col-md-12">
					<div class="col-md-4">
						{{ Form::label('gender', trans('messages.sex'), array('class' => 'required col-md-2')) }}
						<div>{{ Form::radio('gender', '0', true) }}
						<span class="input-tag">{{trans('messages.male')}}</span></div>
						<div>{{ Form::radio("gender", '1', false) }}
						<span class="input-tag">{{trans('messages.female')}}</span></div>
					</div>

					<div class="col-md-4">
					 <div ><label class='required' for="age">Age</label> </div>
					 <div class='col-md-2'>
					 	<div class='input-group' >
							 <input type="text" name="age" id="age" class="form-control input-sm" size="5">
							<select name="age_units" id="id_age_units" class="form-control input-sm hidden">
								<option value="M">Months</option>
							</select><span class="input-group-addon">Months</span>
						</div>
					 </div>
					</div>

					<div class="col-md-4">
						{{ Form::label('district', "District:", array('class' => 'required, col-md-2')) }}
						{{ Form::text('district', \Config::get('constants.DISTRICT_NAME') , array('class' => 'form-control')) }}
					</div>

					                                      
			</div>
				<div class="form-group hidden">
					<label class= 'required' for="dob">Date Of Birth</label>
					<input type="text" name="dob" id="dob" class="form-control input-sm" size="11">
				</div>

				<div class="form-group col-md-12">
					<div class="col-md-4">
					{{ Form::label('exp_no', "EXP No (If Status Known): ", array('class' => 'col-md-2')) }}
					{{ Form::text('exp_no', Input::old('exp_no'), array('class' => 'form-control')) }}
					</div>

					<div class="col-md-4">
					{{ Form::label('breastfeeding', "Is the Child Breastfeeding ?", array('class' => 'col-md-4')) }}
					<div>{{ Form::radio('breastfeeding', '1', true) }}
					<span class="input-tag">{{"Yes"}}</span></div>
					<div>{{ Form::radio("breastfeeding", '0', false) }}
					<span class="input-tag">{{"No"}}</span></div>
					</div>
				</div>

				<div class="form-group col-md-12">
					<div class="col-md-4">
					{{ Form::label('caretaker_tel_no', "Caretaker Tel. No. ", array('class' => 'col-md-2')) }}
					{{ Form::text('caretaker_tel_no', Input::old('caretaker_tel_no'), array('class' => 'form-control')) }}
					</div>

					<div class="col-md-4">
					{{ Form::label('admission_date', "Admission date:", ['class' => 'col-md-2 control-label']) }}
					{{ Form::text('admission_date', Input::old('admission_date'), array('class' => 'form-control standard-datepicker purchase-date')) }}
					</div>
				</div>


				<div class="form-group col-md-12">
					<div class="col-md-4">
					{{ Form::label('entry_point', "Entry Point: ", array('class' => 'col-md-2')) }}
					{{ Form::select('entry_point', [' ' => '-- Select --','0' => 'Nutrition','1' => 'Pediatric Ward', '2' => 'MBCP', 
					'3' => 'OPD', '4' => 'YCC', '5' => 'EPI'], null, array('class' => 'form-control')) }}
					</div>
				</div>



				<div class="panel ">
				<div class="panel-heading "><strong>Provisional Diagnosis: </strong></div>
				<div class="panel-body">

					<div class="form-group col-md-12">
						<div class="col-md-4">
						{{ Form::label('mothers_name', "Mother’s Name:", array('class' => 'required col-md-2')) }}
						{{ Form::text('mothers_name', Input::old('mothers_name'), array('class' => 'form-control')) }}
						</div>

						<div class="col-md-4">
						{{ Form::label('mother_hiv_status', "Mother’s HIV Status:", array('class' => 'required col-md-2')) }}
						{{ Form::select('mother_hiv_status', [' ' => '-- Select --','0' => 'Positive','1' => 'Negative', '2' => 'Unknown'], null, array('class' => 'form-control')) }}
						</div>

						<div class="col-md-4">
						{{ Form::label('sample_date', "Sample collection date: ", ['class' => 'col-md-2 control-label']) }}
						{{ Form::text('sample_date', Input::old('sample_date'), array('class' => 'form-control standard-datepicker purchase-date')) }}
						</div>


					</div>

				</div>

				<div class="panel ">
				<div class="panel-heading "><strong>For known HIV Exposed infants, information to enter on this Request Form should be picked 
					from EI register. For all other infants, use the inpatient register (HMIS 054) </strong></div>
				<div class="panel-body">

					<div class="form-group col-md-12">
						<div class="col-md-4">
						{{ Form::label('pcr', "1st or 2nd PCR ? (tick)", array('class' => 'required col-md-3')) }}
						<div>{{ Form::radio('pcr', '1') }}
						<span class="input-tag">{{"Ist PCR"}}</span></div>
						<div>{{ Form::radio("pcr", '0') }}
						<span class="input-tag">{{"2nd PCR"}}</span></div>
						</div>

						<div class="col-md-4">
						{{ Form::label('non_routine_pcr', "Non routine PCR R1/R2 ? (tick)", array('class' => 'required col-md-3')) }}
						<div>{{ Form::radio('non_routine_pcr', '1') }}
						<span class="input-tag">{{"R1"}}</span></div>
						<div>{{ Form::radio("non_routine_pcr", '0') }}
						<span class="input-tag">{{"R2"}}</span></div>
						</div>


						<div class="col-md-4">
						{{ Form::label('pmtct_arv', "If known HEI, Infant’s PMTCT ARVs: ", ['class' => 'col-md-2 control-label']) }}
						{{ Form::select('pmtct_arv', [' ' => '-- Select --','0' => 'Daily NVP from birth to 6 weeks','1' => 'NVP for 12 weeks for high risk infants', '2' => 'No ARVs taken at birth', '3' => 'Unknown'], null, array('class' => 'form-control')) }}
						</div>
						<div><p><strong>Note:</strong> R1 = Any repeat before 2nd PCR <br>
							<strong>R2</strong> = Any repeat after 2nd PCR before 18 months. <br>
							<strong>2nd PCR </strong>is done 6 weeks after cessation of breastfeeding </p></div>

						<div class="col-md-12">
							<p><strong>If Mother is HIV positive, Mother’s PMTCT ARVs (Circle number below)</strong> </p>
							<div class='col-md-4'>	
							{{ Form::label('ante_natal', "Ante-natal", ['class' => 'col-md-3 control-label']) }}
							{{ Form::select('ante_natal', [' ' => '-- Select --','0' => 'Lifelong ART','1' => 'No ART', '2' => 'Unknown'], null, array('class' => 'form-control')) }}
							</div>

							<div class='col-md-4'>

							{{ Form::label('delivery', "Delivery", ['class' => 'col-md-3 control-label']) }}
							{{ Form::select('delivery', [' ' => '-- Select --','0' => 'Lifelong ART','1' => 'No ART', '2' => 'Unknown'], null, array('class' => 'form-control')) }}
							</div>

							<div class='col-md-4'>

							{{ Form::label('post_natal', "Post-natal", ['class' => 'col-md-3 control-label']) }}
							{{ Form::select('post_natal', [' ' => '-- Select --','0' => 'Lifelong ART','1' => 'No ART', '2' => 'Unknown'], null, array('class' => 'form-control')) }}
							</div>

						</div>



					</div>

				</div>

				</div>

				<div class="form-group actions-row">
					{{ Form::button('<span class="glyphicon glyphicon-save"></span> '.trans('messages.save'),
						['class' => 'btn btn-primary', 'onclick' => 'submit()']) }}
				</div>

			{{ Form::close() }}
		</div>
	</div>

@stop


