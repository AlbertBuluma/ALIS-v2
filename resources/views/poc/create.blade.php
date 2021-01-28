@extends("layout")
@section("content")
<div>
	<ol class="breadcrumb">
		<li><a href="{{{route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		<li><a href="{{ route('poc.index') }}">EID Patient list</a></li>
		<!-- <li><a href="{{ route('bbincidence.bbfacilityreport') }}">Facility Report</a></li> -->
		<li class="active">New Patient </li>
	</ol>
</div>
<div class="panel panel-primary">
	<div class="panel-heading ">

		Facility:: {{ config('constants.FACILITY_NAME') }} || DISTRICT:: {{ config('constants.DISTRICT_NAME') }}
	</div>
	<div class="panel-body">

		<!-- if there are creation errors, they will show here -->
		@if($errors->all())
		<div class="alert alert-danger">
			{{ HTML::ul($errors->all()) }}
		</div>
		@endif
		{{ Form::open(array('url' => 'poc', 'id' => 'form-create-poc', 'autocomplete' => 'on')) }}
		<div class="form-group actions-row" style="text-align:right;">
		</div>
		<div class="panel panel-primary">

			<!-- <h3 class="panel-title" style="text-align:center"><strong>FACILITY BIOSAFETY AND BIOSECURITY INCIDENT/OCCURENCE FORM</strong></h3> -->

			<div class="panel-heading "><strong>Patient Details</strong></div>
			<div class="panel-body">
				<div class="form-group">


					<div class="form-group">
						{{ Form::label('infant_name', 'Infant Name', array('class' =>'col-sm-2 required ')) }}
						{{ Form::text('infant_name', old('infant_name'), array('class' => 'form-control col-sm-4')) }}

						{{ Form::label('exp_no', 'Exp. Number', array('class' =>'col-sm-2 required ')) }}
						{{ Form::text('exp_no', old('exp_no'), array('class' => 'form-control col-sm-4', 'placeholder' => '(If Status is not known)')) }}
					</div>

					<div class="form-group">
						{{ Form::label('age', 'Age in Months', array('class' =>'col-sm-2 required ')) }}
						{{ Form::number('age', old('age'), array('class' => 'form-control col-sm-4', 'placeholder' => '(In months)')) }}

						{{ Form::label('gender', 'Sex:', array('class' =>'col-sm-2 required ')) }}
						<div class="radio-inline">{{ Form::radio('gender', 'Male', false) }} <span class="input-tag">Male</span></div>
						<div class="radio-inline">{{ Form::radio("gender", 'Female', false) }} <span class="input-tag">Female</span></div>
					</div>
				</div>

				<div class="form-group">

					{{ Form::label('caretaker_number', 'Caregiver Phone No.', array('class' =>'col-sm-2 ')) }}
					{{ Form::text('caretaker_number', old('caretaker_number'), array('class' => 'form-control col-sm-4')) }}

					{{ Form::label('contrimoxazole', 'Given Contrimoxazole', array('class' =>'col-sm-2')) }}
					<div class="radio-inline">{{ Form::radio('contrimoxazole', 'Yes', false) }} <span class="input-tag">Yes</span></div>
					<div class="radio-inline">{{ Form::radio("contrimoxazole", 'No', false) }} <span class="input-tag">No</span></div>

				</div>

				<div class="form-group">

					{{ Form::label('delivery_details', 'Delivered at Health Facility:', array('class' =>'col-sm-2')) }}
					<div class="radio-inline">{{ Form::radio('delivery_details', 'Yes', false) }} <span class="input-tag">Yes</span></div>
					<div class="radio-inline">{{ Form::radio("delivery_details", 'No', false) }} <span class="input-tag">No</span></div>
					<div class="radio-inline">{{ Form::radio("delivery_details", 'Unknownl', false) }} <span class="input-tag">Unknown</span></div>
				</div>

				<div class="form-group">

					{{ Form::label('infant_pmtctarv', 'Infant PMTCT ARVs', array('class' =>'col-sm-2 required ')) }}
					{{ Form::text('infant_pmtctarv', old('infant_pmtctarv'), array('class' => 'form-control col-sm-4')) }}
					<!-- {{ Form::label('admission_date', 'Admission Date', array('class' =>'col-sm-2 ')) }}
					{{ Form::text('admission_date', old('admission_date'), array('class' => 'form-control standard-datepicker standard-datepicker-nofuture col-sm-4', 'placeholder' => 'Ignore if not admitted', )) }} -->
				</div>

				<div class="form-group">
					<span><u><b>Infant's code for Infant EMTCT ARVs:</b></u>
						<br>
						<b>1-</b> Received NVP syrup at birth for 6 weeks;
						<b>2-</b>Received NVP syrup at birth for 12 weeks;
						<b>3-</b>AZT/3TC/NVP;
						<b>4-</b>No ARVs taken;
						<b>5-</b>Unknown-<i>Infant eMTCT regimen not known</i>
					</span>
				</div>

				<span><b>Entry Point <i>(Please select one)</i></b></span>
				<br>
				<br>

				<div class="form-group">
					{{ Form::label('entry_point','',array('class' =>'col-sm-2 required ')) }}
					<div class="radio-inline">{{ Form::radio("entry_point", 'EPI', false) }} <span class="input-tag">EPI</span></div>
					<div class="radio-inline">{{ Form::radio("entry_point", 'Childrens ward', false) }} <span class="input-tag">Pediatric Inpatient</span></div>
					<div class="radio-inline">{{ Form::radio("entry_point", 'PMTCT', false) }} <span class="input-tag">Maternity</span></div>
					<div class="radio-inline">{{ Form::radio("entry_point", 'OPD', false) }} <span class="input-tag">Outpatient</span></div>
					<div class="radio-inline">{{ Form::radio("entry_point", 'Nutrition Unit', false) }} <span class="input-tag">Nutrition</span></div>
					<div class="radio-inline">{{ Form::radio("entry_point", 'MBCP', false) }} <span class="input-tag">MBCP/eMTCT</span></div>
					<div class="radio-inline">{{ Form::radio("entry_point", 'Young Child Clinic', false) }} <span class="input-tag">Young Child Clinic</span></div>
				</div>

				<div class="form-group">
					{{ Form::label('other_entry_point', 'Other Entry Point:',array('class' =>'col-sm-2')) }}
					{{ Form::text('other_entry_point', old('other_entry_point'), array('class' => 'form-control col-sm-4')) }}
				</div>


				<!-- <div class="form-group">
				{{ Form::label('provisional_diagnosis', 'Provisional Diagnosis:',array('class' =>'col-sm-2')) }}
				{{ Form::text('provisional_diagnosis', old('provisional_diagnosis'), array('class' => 'form-control col-sm-4')) }}
			</div> -->

			<!-- <div class="form-group">

			{{ Form::label('mother_name', 'Mothers Name', array('class' =>'col-sm-2 ')) }}
			{{ Form::text('mother_name', old('mother_name'), array('class' => 'form-control col-sm-4')) }}
			<!--
			{{ Form::label('mother_hiv_status', 'Mothers HIV Status', array('class' =>'col-sm-2 ')) }}
			{{ Form::select('mother_hiv_status', array_merge(array(null => 'select.....'), $hiv_status), old('mother_hiv_status'), array('class' => 'form-control')) }} -->
			<!-- {{ Form::label('mother_hiv_status', 'Mothers HIV Status', array('class'=>'control-label')) }}
			{{ Form::select('mother_hiv_status', array_merge(array(null => 'Select.....'), $hiv_status), old('mother_hiv_status'), array('class' => 'form-control', 'id' =>'mother_hiv_status')) }}
			@if ($errors->has('mother_hiv_status'))
			<span class="text-danger">
			<strong>{{ $errors->first('mother_hiv_status') }}</strong>
		</span>
		@endif -->

		<!-- {{ Form::label('mother_hiv_status', 'Mothers HIV Status', array('class' =>'col-sm-2')) }}
		<div class="radio-inline">{{ Form::radio("mother_hiv_status", 'Positive', false) }} <span class="input-tag">Positive</span></div>
		<div class="radio-inline">{{ Form::radio('mother_hiv_status', 'Negative', false) }} <span class="input-tag">Negative</span></div>
		<div class="radio-inline">{{ Form::radio("mother_hiv_status", 'Unknown', false) }} <span class="input-tag">Unknown</span></div>
	</div> -->


	<!-- <span>For known HIV Exposed infants, information to enter on this Request Form should be picked from EI register. <br> For all other infants,
	use the inpatient register (HMIS 054)</span></div> -->
	<!-- <span><strong>Note: R1 =</strong> Any repeat before 2nd PCR,
	<strong> R2 = </strong> Any repeat after 2nd PCR before 18 months
	<strong> 2nd PCR</strong> is done 6weeks after cessation of breastfeeding </span>
	<br><br>

	<div class="form-group">
	{{ Form::label('pcr_level', '1st or 2nd PCR? (Tick) :',array('class' =>'col-sm-2 required ')) }}
	<div class="radio-inline">{{ Form::radio('pcr_level', '1st PCR', false) }} <span class="input-tag">1st PCR</span></div>
	<div class="radio-inline">{{ Form::radio("pcr_level", '2nd PCR', false) }} <span class="input-tag">2nd PCR</span></div>
</div>
<br>

{{ Form::label('pcr_level', 'Non Routine PCR; R1 / R2 (Tick):',array('class' =>'col-sm-2 required ')) }}
<div class="radio-inline">{{ Form::radio('pcr_level', 'R1', false) }} <span class="input-tag">R1</span></div>
<div class="radio-inline">{{ Form::radio("pcr_level", 'R2', false) }} <span class="input-tag">R2</span></div>
<br>
<br>

<div class="form-group">
	<span>If Mother is HIV positive, Mother's PMTCT ARV's (Select all that apply)</span>
	<br>
	<br>
</div>

<div class="form-group">
	<!--{{ Form::label('pmtct_delivery', 'PMTCT Delivery:',array('class' =>'col-sm-2 required ')) }}
		{{ Form::select('pmtct_delivery', array_merge(array(null => 'Select...	'), $antenatal), old('pmtct_delivery'), array('class' => 'form-control')) }}
	</div> -->
	<!-- {{ Form::label('pmtct_antenatal', 'PMTCT Antenatal', array('class' =>'col-sm-2')) }}
		<div class="radio-inline">{{ Form::radio('pmtct_antenatal', 'Lifelong ART', false) }} <span class="input-tag">Lifelong ART</span></div>
		<div class="radio-inline">{{ Form::radio("pmtct_antenatal", 'No ART', false) }} <span class="input-tag">No Art</span></div>
		<div class="radio-inline">{{ Form::radio("pmtct_antenatal", 'Unknown', false) }} <span class="input-tag">Unknown</span></div> -->

	</div>
</div>

<!-- <div class="form-group">

	{{ Form::label('pmtct_postnatal', 'PMTCT Post Natal:',array('class' =>'col-sm-2 required ')) }}
	{{ Form::select('pmtct_postnatal', array_merge(array(null => 'Select...	'), $antenatal), old('pmtct_postnatal'), array('class' => 'form-control')) }}
	{{ Form::label('pmtct_delivery', 'PMTCT Delivery', array('class' =>'col-sm-2')) }}
	<div class="radio-inline">{{ Form::radio('pmtct_delivery', 'Lifelong ART', false) }} <span class="input-tag">Lifelong ART</span></div>
	<div class="radio-inline">{{ Form::radio("pmtct_delivery", 'No ART', false) }} <span class="input-tag">No ART</span></div>
	<div class="radio-inline">{{ Form::radio("pmtct_delivery", 'Unknown', false) }} <span class="input-tag">Unknown</span></div>

</div>

<div class="form-group">
	{{ Form::label('pmtct_antenatal', 'PMTCT Antenatal:',array('class' =>'col-sm-2 required ')) }}
	{{ Form::select('pmtct_antenatal', array_merge(array(null => 'Select...	'), $antenatal), old('pmtct_antenatal'), array('class' => 'form-control')) }}

	{{ Form::label('pmtct_postnatal', 'PMTCT Postnatal', array('class' =>'col-sm-2')) }}
	<div class="radio-inline">{{ Form::radio('pmtct_postnatal', 'Lifelong ART', false) }} <span class="input-tag">Lifelong ART</span></div>
	<div class="radio-inline">{{ Form::radio("pmtct_postnatal", 'No ART', false) }} <span class="input-tag">No ART</span></div>
	<div class="radio-inline">{{ Form::radio("pmtct_postnatal", 'Unknown', false) }} <span class="input-tag">Unknown</span></div>


</div>
<br>
<br>

<span>If known HEI, Infant's PMTCT ARVs (Select code:)</span>
<br>
<br>
<div class="form-group">

	{{ Form::label('infant_pmtctarv', 'Infant PMTCTARV Status:',array('class' =>'col-sm-2 required ')) }}
	<div class="radio-inline">{{ Form::radio("infant_pmtctarv", 'Daily NVP from birth to 6 weeks',false) }} <span class="input-tag">Daily NVP from birth to 6 weeks</span></div>
	<div class="radio-inline">{{ Form::radio("infant_pmtctarv", 'NVP for 12 weeks for high risk infants', false) }} <span class="input-tag">NVP for 12 weeks for high risk infants</span></div>
	<div class="radio-inline">{{ Form::radio("infant_pmtctarv", 'No ARVs taken at birth', false) }} <span class="input-tag">No ARVs taken at birth</span></div>
	<div class="radio-inline">{{ Form::radio("infant_pmtctarv", 'UNKNOWN', false) }} <span class="input-tag">unknown</span></div>
	<br>
	<br>
</div>
</div> -->

<div class="panel panel-primary">
	<div class="panel-heading "><strong>Sample Details</strong></div>
	<div class="panel-body">

		<div class="form-group">
			{{ Form::label('collection_date', 'Sample Collection Date:', array('class' =>'col-sm-2 ')) }}
			{{ Form::text('collection_date', old('collection_date'), array('class' => 'form-control standard-datepicker standard-datepicker-nofuture col-sm-4', 'placeholder' => 'YYYY-MM-DD')) }}

			{{ Form::label('sample_id', 'Sample ID:',array('class' =>'col-sm-2 required ')) }}
			{{ Form::text('sample_id', old('sample_id'), array('class' => 'form-control col-sm-4')) }}
		</div>

		<div class="form-group">
			<span><strong>Note: R<sub>1</sub> =</strong> Any repeat before 2nd PCR,
				<strong> R<sub>2</sub> = </strong> Any repeat before 3rd PCR,
				<strong> R<sub>3</sub>=</strong>Any repeat after 3<sup>rd</sup> PCR,

				<strong>2<sup>nd</sup></strong> PCR is done 6weeks at 9months or at any point after 9months while breastfeeding
				<strong>3<sup>rd</sup> </strong>PCR is done 6weeks after cessation of breastfeeding  </span>
				<br><br>

				<div class="form-group">
					{{ Form::label('pcr_level', 'Type of test (Tick) :',array('class' =>'col-sm-2 required ')) }}
					<div class="radio-inline">{{ Form::radio('pcr_level', '1st PCR', false) }} <span class="input-tag">1<sup>st</sup></span></div>
					<div class="radio-inline">{{ Form::radio('pcr_level', '2nd PCR', false) }} <span class="input-tag">2<sup>nd</sup></span></div>
					<div class="radio-inline">{{ Form::radio('pcr_level', '3rd PCR', false) }} <span class="input-tag">3<sup>rd</sup></span></div>
					<div class="radio-inline">{{ Form::radio("pcr_level", 'PCR', false) }} <span class="input-tag">PCR</span></div>
					<div class="radio-inline">{{ Form::radio("pcr_level", 'SCD', false) }} <span class="input-tag">SCD</span></div>
				</div>
				<br>

				{{ Form::label('pcr_level', 'Non Routine PCR (Tick):',array('class' =>'col-sm-2 required ')) }}
				<div class="radio-inline">{{ Form::radio('non_routine', 'R1', false) }} <span class="input-tag">R<sub>1</sub></span></div>
				<div class="radio-inline">{{ Form::radio('non_routine', 'R2', false) }} <span class="input-tag">R<sub>2</sub></span></div>
				<div class="radio-inline">{{ Form::radio('non_routine', 'R3', false) }} <span class="input-tag">R<sub>3</sub></span></div>
			</div>

			<div class="form-group">
				{{ Form::label('requesting_officer', 'Recieved By:', array('class' =>'col-sm-2 ')) }}
				{{ Form::text('requesting_officer', Auth::user()->name, array('class' => 'form-control col-sm-4')) }}

				{{ Form::label('clinician_phone', 'Mobile Number:', array('class' =>'col-sm-2 ')) }}
				{{ Form::text('clinician_phone', Auth::user()->phone_contact, array('class' => 'form-control col-sm-4')) }}
				<!-- {{ Form::text('collection_date', old('collection_date'), array('class' => 'form-control standard-datepicker col-sm-4', 'placeholder' => 'DD/ MM /YYYY')) }} -->
			</div>
		</div>
	</div>


	<div class="panel panel-primary">
		<div class="panel-heading "><strong>INFANT FEEDING STATUS AT TEST</strong></div>
		<div class="panel-body">

			<div class="form-group">
				<div class="radio-inline">{{ Form::radio('feeding_status', 'EBF Exclusive Breast Feeding', false) }} <span class="input-tag"><b>EBF:</b> 	Exclusive Breast Feeding</span></div>
				<div class="radio-inline">{{ Form::radio('feeding_status', 'MF Mixed Feeding (below 6months)', false) }} <span class="input-tag"><b>MF:</b> Mixed Feeding (below 6months)</span></div>
				<div class="radio-inline">{{ Form::radio('feeding_status', 'W Wean from breastfeeding', false) }} <span class="input-tag"><b>W:</b> Wean from breastfeeding</span></div>
				<div class="radio-inline">{{ Form::radio("feeding_status", 'RF Replacement Feeding (never breastfed)', false) }} <span class="input-tag"><b>RF:</b> Replacement Feeding (never breastfed)</span></div>
				<div class="radio-inline">{{ Form::radio("feeding_status", 'CF  Complimentary Feeding (above 6 months)', false) }} <span class="input-tag"><b>CF:</b> Complimentary Feeding (above 6 months)</span></div>
				<div class="radio-inline">{{ Form::radio("feeding_status", 'No longer Breastfeeding', false) }} <span class="input-tag"><b>NLB:</b> No longer Breastfeeding</span></div>
			</div>
		</div>
	</div>

	<div class="panel panel-primary">
		<div class="panel-heading "><strong>MOTHER INFORMATION</strong><i>(use codes below)</i></div>
		<div class="panel-body">

			<div class="form-group">
				{{ Form::label('mother_hts', 'Mother HTS No.:', array('class' =>'col-sm-2 ')) }}
				{{ Form::text('mother_hts', old('mother_hts'), array('class' => 'form-control')) }}

				{{ Form::label('mother_art', 'ART No.:',array('class' =>'col-sm-2 required ')) }}
				{{ Form::text('mother_art', old('mother_art'), array('class' => 'form-control col-sm-4')) }}

				{{ Form::label('mother_nin', 'NIN:',array('class' =>'col-sm-2')) }}
				{{ Form::text('mother_nin', old('mother_nin'), array('class' => 'form-control col-sm-4')) }}

			</div>

			<div class="form-group">
				{{ Form::label('pmtct_antenatal', 'PMTCT Antenatal:',array('class' =>'col-sm-2 required ')) }}
				{{ Form::select('pmtct_antenatal', array_merge(array(null => 'Select...	'), $antenatal), old('pmtct_antenatal'), array('class' => 'form-control')) }}
			</div>
				<div class="form-group">
				{{ Form::label('pmtct_delivery', 'PMTCT Delivery:',array('class' =>'col-sm-2 required ')) }}
				{{ Form::select('pmtct_delivery', array_merge(array(null => 'Select...	'), $antenatal), old('pmtct_delivery'), array('class' => 'form-control')) }}
</div>
	<div class="form-group">
				{{ Form::label('pmtct_postnatal', 'PMTCT Post Natal:',array('class' =>'col-sm-2 required ')) }}
				{{ Form::select('pmtct_postnatal', array_merge(array(null => 'Select...	'), $antenatal), old('pmtct_postnatal'), array('class' => 'form-control')) }}

				<!-- <div class="radio-inline">{{ Form::radio('mother_antenatal', 'Antenatal', false) }} <span class="input-tag">Antenatal</span></div>
					<div class="radio-inline">{{ Form::radio("mother_delivery", 'Delivery', false) }} <span class="input-tag">Delivery</span></div>
					<div class="radio-inline">{{ Form::radio("mother_postnatal", 'Postnatal', false) }} <span class="input-tag">Postnatal</span></div> -->

					<!-- <div class="radio-inline">{{ Form::radio('pmtct_delivery', 'Lifelong ART', false) }} <span class="input-tag">Lifelong ART</span></div>
						<div class="radio-inline">{{ Form::radio("pmtct_delivery", 'No ART', false) }} <span class="input-tag">No ART</span></div>
						<div class="radio-inline">{{ Form::radio("pmtct_delivery", 'Unknown', false) }} <span class="input-tag">Unknown</span></div> -->

						<!--
							{{ Form::label('pmtct_postnatal', 'PMTCT Postnatal', array('class' =>'col-sm-2')) }}
							<div class="radio-inline">{{ Form::radio('pmtct_postnatal', 'Lifelong ART', false) }} <span class="input-tag">Lifelong ART</span></div>
							<div class="radio-inline">{{ Form::radio("pmtct_postnatal", 'No ART', false) }} <span class="input-tag">No ART</span></div>
							<div class="radio-inline">{{ Form::radio("pmtct_postnatal", 'Unknown', false) }} <span class="input-tag">Unknown</span></div> -->

						</div>
					</div>
				</div>

				<div class="form-group actions-row" style="text-align:right;">
					{{ Form::button('<span class="glyphicon glyphicon-save"></span> '.'SAVE',
					['class' => 'btn btn-primary', 'onclick' => 'submit()']) }}
				</div>


				{{ Form::close() }}
				<script>
					$(".standard-datepicker-nofuture").datepicker({
						maxDate: new Date(),
						dateFormat: "yy-mm-dd",
						changeMonth: true,
						changeYear: true,
					});
				</script>

			</div>
			<div class="form-group">
				<span> * To request POC EID supplies or ask any questions, immediately call the National EID Coordinating Office on <strong>Toll Free: 0800 221 100 or 0772 391 676, <u>customercare@cphl.go.ug</u></strong></span>
				<br>
				<br>
				<!-- <span> * For every Positive result, manage the child as HIV Positive, but collect a Dried Blood Spot sample and refer to CPHL for reference testing as per National HTS Guidelines</span> -->
				<p align="right" style="color:gray"><i>Print version September 2019</i></p>
				<br>
				<br>
			</div>
		</div>
	@stop
