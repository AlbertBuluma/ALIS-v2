@extends("layout")
@section("content")
<div>
	<ol class="breadcrumb">
		<li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		<li class="active">{{ Lang::choice('messages.report',2) }}</li>
		<li class="active">HMIS 105</li>
	</ol>
</div>
<br />
<div class="panel panel-primary">
	<div class="panel-heading ">
		<span class="glyphicon glyphicon-stats"></span>
		HMIS 105 | 
		<a title="Previous Month"
			href="{{URL::to('/hmis105/'.date('Y-m',strtotime(date('Y-m',strtotime($month)).' -1 month')))}}">
			<span class="btn btn-default ion-android-arrow-back"></span></a>
		{{date('Y-M',strtotime($month))}}
		<a title="Next Month"
			href="{{URL::to('/hmis105/'.date('Y-m',strtotime(date('Y-m',strtotime($month)).' +1 month')))}}">
			<span class="btn btn-default ion-android-arrow-forward"></span></a>
	</div>
	<div class="panel-body">
	@if (Session::has('message'))
		<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
	@endif	
		<div class="table-responsive">
			<table class="table table-condensed report-table-border">
				<tbody>
					<tr>
						<th colspan="13" style="background-color: #cccccc;">7. LABORATORY TESTS</th>
					</tr>
					<tr>
						<td colspan="2">LABORATORY TESTS</td>
						<td colspan="2">NUMBER DONE</td>
						<td colspan="2">NUMBER POSITIVE</td>
						<td></td>
						<td colspan="2">LABORATORY TESTS</td>
						<td colspan="2">NUMBER DONE</td>
						<td colspan="2">NUMBER POSITIVE</td>
					</tr>
					<tr>
						<td colspan="6" style="background-color: #cccccc;">7.1 HEMATOLOGY (BLOOD)</td>
						<td></td>
						<td colspan="2">38. Hepatitis B</td>
						<td colspan="2">
							{{(isset($testTypeCountArray['hepatitis_b']['hepatitis_b']))?$testTypeCountArray['hepatitis_b']['hepatitis_b']['total']:''}}</td>
						<td colspan="2">
							{{(isset($testTypeCountArray['hepatitis_b']['hepatitis_b']))?$testTypeCountArray['hepatitis_b']['hepatitis_b']['positive']:''}}</td>
					</tr>
					<tr>
						<td colspan="2">01. Hb</td>
						<td colspan="2">
							@if(isset($testTypeCountArray['hb']))
							{{(isset($testTypeCountArray['hb']['hb']))?$testTypeCountArray['hb']['hb']['total']:''}}
							@endif
						</td>
						<td colspan="2" style="background-color: #777777;"></td>
						<td></td>
						<td colspan="2">39. Brucella</td>
						<td colspan="2">{{(isset($testTypeCountArray['brucella']['brucella']))?$testTypeCountArray['brucella']['brucella']['total']:''}}</td>
						<td colspan="2">{{(isset($testTypeCountArray['brucella']['brucella']))?$testTypeCountArray['brucella']['brucella']['positive']:''}}</td>
					</tr>
					<tr>
						<td colspan="2">02. HBG<8</td>
						<td colspan="2">
							@if(isset($testTypeCountArray['cbc']))
								{{(isset($testTypeCountArray['cbc']['hgb']))?$testTypeCountArray['cbc']['hgb']['hbg_less_8']:''}}
							@endif
						</td>
						<td colspan="2" style="background-color: #777777;"></td>
						<td></td>
						<td colspan="2">40. Pregnancy Test</td>
						<td colspan="2">
							{{(isset($testTypeCountArray['pregnancy_test']['pregnancy_test']))?$testTypeCountArray['pregnancy_test']['pregnancy_test']['total']:''}}
						</td>
						<td colspan="2">
							{{(isset($testTypeCountArray['pregnancy_test']['pregnancy_test']))?$testTypeCountArray['pregnancy_test']['pregnancy_test']['positive']:''}}
						</td>
					</tr>
					<tr>
						<td colspan="2">03. HBG≥8</td>
						<td colspan="2">
							@if(isset($testTypeCountArray['cbc']))
								{{(isset($testTypeCountArray['cbc']['hgb']))?$testTypeCountArray['cbc']['hgb']['hbg_equal_8']:''}}
							@endif
						</td>
						<td colspan="2" style="background-color: #777777;"></td>
						<td></td>
						<td colspan="2">41. Rheumatoid Factor</td>
						<td colspan="2">
							{{(isset($testTypeCountArray['rheumatoid_factor']['rheumatoid_factor']))?$testTypeCountArray['rheumatoid_factor']['rheumatoid_factor']['total']:''}}
						</td>
						<td colspan="2">
							{{(isset($testTypeCountArray['rheumatoid_factor']['rheumatoid_factor']))?$testTypeCountArray['rheumatoid_factor']['rheumatoid_factor']['positive']:''}}
						</td>
					</tr>
					<tr>
						<td colspan="2">04. WBC Total</td>
						<td colspan="2">
							@if(isset($testTypeCountArray['cbc']))
								{{(isset($testTypeCountArray['cbc']['wbc']))?$testTypeCountArray['cbc']['wbc']['total']:''}}
							@endif
						</td>
						<td colspan="2" style="background-color: #777777;"></td>
						<td></td>
						<td colspan="2" rowspan="4">42. Others</td>
						<td colspan="2"></td>
						<td colspan="2"></td>
					</tr>
					<tr>
						<td colspan="2">05. WBC Differential</td>
						<td colspan="2">{{(isset($testTypeCountArray['cbc']['wbc']))?$testTypeCountArray['cbc']['wbc']['total']:''}}</td>
						<td colspan="2" style="background-color: #777777;"></td>
						<td></td>
						<td colspan="2"></td>
						<td colspan="2"></td>
					</tr>
					<tr>
						<td colspan="2">06. Film Comment</td>
						<td colspan="2">{{(isset($testTypeCountArray['film_comment']))?$testTypeCountArray['film_comment']['total']:''}}</td>
						<td colspan="2" style="background-color: #777777;"></td>
						<td></td>
						<td colspan="2"></td>
						<td colspan="2"></td>
					</tr>
					<tr>
						<td colspan="2">07. ESR</td>
						<td colspan="2">{{(isset($testTypeCountArray['esr']['esr']))?$testTypeCountArray['esr']['esr']['total']:''}}</td>
						<td colspan="2" style="background-color: #777777;"></td>
						<td></td>
						<td colspan="2"></td>
						<td colspan="2"></td>
					</tr>
					<tr>
						<td colspan="2">08. RBC</td>
						<td colspan="2">
						@if(isset($testTypeCountArray['cbc']))
							{{(isset($testTypeCountArray['cbc']['rbc']))?$testTypeCountArray['cbc']['rbc']['total']:''}}
						@endif
						</td>
						<td colspan="2" style="background-color: #777777;"></td>
						<td></td>
						<td colspan="6" style="background-color: #cccccc;">7.5 IMMUNOLOGY</td>
					</tr>
					<tr>
						<td colspan="2">09. Bleeding time</td>
						<td colspan="2">{{(isset($testTypeCountArray['bleeding_time']))?$testTypeCountArray['bleeding_time']['bleeding_time']['total']:''}}</td>
						<td colspan="2" style="background-color: #777777;"></td>
						<td></td>
						<td colspan="2">43. CD4 tests</td>
						<td colspan="2">{{(isset($testTypeCountArray['cd4']))?$testTypeCountArray['cd4']['cd4']['total']:''}}</td>
						<td colspan="2" style="background-color: #777777;"></td>
					</tr>
					<tr>
						<td colspan="2">10 Prothrombin Time</td>
						<td colspan="2">
							{{(isset($testTypeCountArray['prothrombin_time']))?$testTypeCountArray['prothrombin_time']['prothrombin_time']['total']:''}}
						</td>
						<td colspan="2" style="background-color: #777777;"></td>
						<td></td>
						<td colspan="2">44. Viral Load Tests</td>
						<td colspan="2">{{(isset($testTypeCountArray['viral_load']))?$testTypeCountArray['viral_load']['viral_load']['total']:''}}</td>
						<td colspan="2" style="background-color: #777777;"></td>
					</tr>
					<tr>
						<td colspan="2">11. Clotting Time</td>
						<td colspan="2">
							{{(isset($testTypeCountArray['clotting_time']['clotting_time']))?$testTypeCountArray['clotting_time']['clotting_time']['total']:''}}
						</td>
						<td colspan="2" style="background-color: #777777;"></td>
						<td></td>
						<td colspan="2">45. Others</td>
						<td colspan="2"></td>
						<td colspan="2" style="background-color: #777777;"></td>
					</tr>
					<tr>
						<td colspan="2" rowspan="3">12. Others</td>
						<td colspan="2"></td>
						<td colspan="2" style="background-color: #777777;"></td>
						<td></td>
						<td colspan="6" style="background-color: #cccccc;">7.6 MICROBIOLOGY (CSF URINE, STOOL, BLOOD, SPUTUM, SWABS)</td>
					</tr>

					<tr>
						<td colspan="2"></td>
						<td colspan="2" style="background-color: #777777;"></td>
						<td></td>
						<td colspan="2">46. ZN for AFBs</td>
						<td colspan="2">{{(isset($testTypeCountArray['zn']['zn']))?$testTypeCountArray['zn']['zn']['total']:''}}</td>
						<td colspan="2">{{(isset($testTypeCountArray['zn']['zn']))?$testTypeCountArray['zn']['zn']['positive']:''}}</td>
					</tr>
					<tr>
						<td colspan="2"></td>
						<td colspan="2" style="background-color: #777777;"></td>
						<td></td>
						<td colspan="2">47.Routine Cultures & Sensitivities</td>
						<td colspan="2">
							{{(isset($testTypeCountArray['culture_sensitivity']['culture_sensitivity']))?
								$testTypeCountArray['culture_sensitivity']['culture_sensitivity']['total']:''}}
						</td>
						<td colspan="2">
							{{(isset($testTypeCountArray['culture_sensitivity']['culture_sensitivity']))?
								$testTypeCountArray['culture_sensitivity']['culture_sensitivity']['positive']:''}}
						</td>
					</tr>
					<tr>
						<td colspan="6" style="background-color: #cccccc;">7.2 BLOOD TRANSFUSION</td>
						<td></td>
						<td colspan="2">48. Gram</td>
						<td colspan="2">
							{{(isset($testTypeCountArray['gram_stain']['gram_stain']))?$testTypeCountArray['gram_stain']['gram_stain']['total']:''}}
						</td>
						<td colspan="2">
							{{(isset($testTypeCountArray['gram_stain']['gram_stain']))?$testTypeCountArray['gram_stain']['gram_stain']['positive']:''}}
						</td>
					</tr>
					<tr>
						<td colspan="2">13. ABO Grouping</td>
						<td colspan="2">
							{{(isset($testTypeCountArray['abo_grouping']['abo_grouping']))?$testTypeCountArray['abo_grouping']['abo_grouping']['total']:''}}
						</td>
						<td colspan="2" style="background-color: #777777;"></td>
						<td></td>
						<td colspan="2">49. India Ink</td>
						<td colspan="2">{{(isset($testTypeCountArray['india_ink']['india_ink']))?$testTypeCountArray['india_ink']['india_ink']['total']:''}}</td>
						<td colspan="2">{{(isset($testTypeCountArray['india_ink']['india_ink']))?$testTypeCountArray['india_ink']['india_ink']['positive']:''}}</td>
					</tr>
					<tr>
						<td colspan="2">14. Combs</td>
						<td colspan="2">{{(isset($testTypeCountArray['combs']['combs']))?$testTypeCountArray['combs']['combs']['total']:''}}</td>
						<td colspan="2">{{(isset($testTypeCountArray['combs']['combs']))?$testTypeCountArray['combs']['combs']['positive']:''}}</td>
						<td></td>
						<td colspan="2">50. Wet Preps</td>
						<td colspan="2">{{(isset($testTypeCountArray['wet_preps']))?$testTypeCountArray['wet_preps']['total']:''}}</td>
						<td colspan="2">{{(isset($testTypeCountArray['wet_preps']))?$testTypeCountArray['wet_preps']['positive']:''}}</td>
					</tr>
					<tr>
						<td colspan="2">15. Cross Matching</td>
						<td colspan="2">
							{{(isset($testTypeCountArray['cross_matching']['cross_matching']))?$testTypeCountArray['cross_matching']['cross_matching']['total']:''}}
						</td>
						<td colspan="2" style="background-color: #777777;"></td>
						<td></td>
						<td colspan="2">51. Urine Microscopy</td>
						<td colspan="2">{{(isset($testTypeCountArray['urine_microscopy']))?$testTypeCountArray['urine_microscopy']['total']:''}}</td>
						<td colspan="2">{{(isset($testTypeCountArray['urine_microscopy']))?$testTypeCountArray['urine_microscopy']['positive']:''}}</td>
					</tr>
					<tr>
						<td colspan="2">16. Blood Collected (Units)</td>
						<td colspan="2"></td>
						<td colspan="2" style="background-color: #777777;"></td>
						<td></td>
						<td colspan="6" style="background-color: #cccccc;">7.7 CLINICAL CHEMISTRY</td>
					</tr>
					<tr>
						<td colspan="2">17. Blood Transfusion(Lts)</td>
						<td colspan="2"></td>
						<td colspan="2" style="background-color: #777777;"></td>
						<td></td>
						<td colspan="6">Renal Profile</td>
					</tr>
					<tr>
						<td colspan="6" style="background-color: #cccccc;">7.3 PARASITOLOGY</td>
						<td></td>
						<td colspan="2">52. Urea</td>
						<td colspan="2">{{(isset($testTypeCountArray['urea']['urea']))?$testTypeCountArray['urea']['urea']['total']:''}}</td>
						<td colspan="2">{{(isset($testTypeCountArray['urea']['urea']))?$testTypeCountArray['urea']['urea']['positive']:''}}</td>
					</tr>
					<tr>
						<td colspan="2">CATEGORY</td>
						<td colspan="1">0-4 years</td>
						<td colspan="1">5 and over</td>
						<td colspan="1">0-4 years</td>
						<td colspan="1">5 and over</td>
						<td></td>
						<td colspan="2">53. Calcium</td>
						<td colspan="2">
							{{(isset($testTypeCountArray['calcium']['calcium']))?$testTypeCountArray['calcium']['calcium']['total']:''}}
						</td>
						<td colspan="2">
							{{(isset($testTypeCountArray['calcium']['calcium']))?$testTypeCountArray['calcium']['calcium']['positive']:''}}
						</td>
					</tr>
					<tr>
						<td colspan="2">18. Malaria Microscopy</td>
						<td colspan="1">{{(isset($testTypeCountArray['malaria_microscopy']))?$testTypeCountArray['malaria_microscopy']['total']['under_5']:''}}</td>
						<td colspan="1">{{(isset($testTypeCountArray['malaria_microscopy']))?$testTypeCountArray['malaria_microscopy']['total']['above_5']:''}}</td>
						<td colspan="1">{{(isset($testTypeCountArray['malaria_microscopy']))?$testTypeCountArray['malaria_microscopy']['positive']['under_5']:''}}</td>
						<td colspan="1">{{(isset($testTypeCountArray['malaria_microscopy']))?$testTypeCountArray['malaria_microscopy']['positive']['above_5']:''}}</td>
						<td></td>
						<td colspan="2">54. Potassium</td>
						<td colspan="2">
							{{(isset($testTypeCountArray['potassium']['potassium']))?$testTypeCountArray['potassium']['potassium']['total']:''}}
						</td>
						<td colspan="2">
							{{(isset($testTypeCountArray['potassium']['potassium']))?$testTypeCountArray['potassium']['potassium']['positive']:''}}
						</td>
					</tr>
					<tr>
						<td colspan="2">19. Malaria RDTs</td>
						<td colspan="1">{{(isset($testTypeCountArray['malaria_rdts']))?$testTypeCountArray['malaria_rdts']['total']['under_5']:''}}</td>
						<td colspan="1">{{(isset($testTypeCountArray['malaria_rdts']))?$testTypeCountArray['malaria_rdts']['total']['above_5']:''}}</td>
						<td colspan="1">{{(isset($testTypeCountArray['malaria_rdts']))?$testTypeCountArray['malaria_rdts']['positive']['under_5']:''}}</td>
						<td colspan="1">{{(isset($testTypeCountArray['malaria_rdts']))?$testTypeCountArray['malaria_rdts']['positive']['above_5']:''}}</td>
						<td></td>
						<td colspan="2">55. Sodium</td>
						<td colspan="2">
							{{(isset($testTypeCountArray['sodium']['sodium']))?$testTypeCountArray['sodium']['sodium']['total']:''}}
						</td>
						<td colspan="2">
							{{(isset($testTypeCountArray['sodium']['sodium']))?$testTypeCountArray['sodium']['sodium']['positive']:''}}
						</td>
					</tr>
					<tr>
						<td colspan="2">20. Trypanosoma</td>
						<td colspan="2"></td>
						<td colspan="2"></td>
						<td></td>
						<td colspan="2">56. Creatinine</td>
						<td colspan="2">
							{{(isset($testTypeCountArray['creatinine']['creatinine']))?$testTypeCountArray['creatinine']['creatinine']['total']:''}}
						</td>
						<td colspan="2">
							{{(isset($testTypeCountArray['creatinine']['creatinine']))?$testTypeCountArray['creatinine']['creatinine']['positive']:''}}
						</td>
					</tr>
					<tr>
						<td colspan="2">21. Microfilaria</td>
						<td colspan="2"></td>
						<td colspan="2"></td>
						<td></td>
						<td colspan="6">Liver Profile</td>
					</tr>
					<tr>
						<td colspan="2">22. Leishmania</td>
						<td colspan="2"></td>
						<td colspan="2"></td>
						<td></td>
						<td colspan="2">57. ALT</td>
						<td colspan="2">{{(isset($testTypeCountArray['alt']['alt']))?$testTypeCountArray['alt']['alt']['total']:''}}</td>
						<td colspan="2">{{(isset($testTypeCountArray['alt']['alt']))?$testTypeCountArray['alt']['alt']['positive']:''}}</td>
					</tr>
					<tr>
						<td colspan="2">23. Trichinella</td>
						<td colspan="2"></td>
						<td colspan="2"></td>
						<td></td>
						<td colspan="2">58. AST</td>
						<td colspan="2">{{(isset($testTypeCountArray['ast']['ast']))?$testTypeCountArray['ast']['ast']['total']:''}}</td>
						<td colspan="2">{{(isset($testTypeCountArray['ast']['ast']))?$testTypeCountArray['ast']['ast']['positive']:''}}</td>
					</tr>
					<tr>
						<td colspan="2">24. Borrella</td>
						<td colspan="2"></td>
						<td colspan="2"></td>
						<td></td>
						<td colspan="2">59. Albumin</td>
						<td colspan="2">{{(isset($testTypeCountArray['albumin']['albumin']))?$testTypeCountArray['albumin']['albumin']['total']:''}}</td>
						<td colspan="2">{{(isset($testTypeCountArray['albumin']['albumin']))?$testTypeCountArray['albumin']['albumin']['positive']:''}}</td>
					</tr>
					<tr>
						<td colspan="2">Stool Microscopy</td>
						<td colspan="4" style="background-color: #777777;"></td>
						<td></td>
						<td colspan="2">60. Total Protein</td>
						<td colspan="2">{{(isset($testTypeCountArray['total_protein']['total_protein']))?$testTypeCountArray['total_protein']['total_protein']['total']:''}}</td>
						<td colspan="2">{{(isset($testTypeCountArray['total_protein']['total_protein']))?$testTypeCountArray['total_protein']['total_protein']['positive']:''}}</td>
					</tr>
					<tr>
						<td colspan="2">25. Entamoeba</td>
						<td colspan="2"></td>
						<td colspan="2"></td>
						<td></td>
						<td colspan="6">Lipid/Cardiac Profile</td>
					</tr>
					<tr>
						<td colspan="2">26. Glardia Lamblia</td>
						<td colspan="2"></td>
						<td colspan="2"></td>
						<td></td>
						<td colspan="2">61. Triglycerides</td>
						<td colspan="2">{{(isset($testTypeCountArray['triglycerides']['triglycerides']))?$testTypeCountArray['triglycerides']['triglycerides']['total']:''}}</td>
						<td colspan="2">{{(isset($testTypeCountArray['triglycerides']['triglycerides']))?$testTypeCountArray['triglycerides']['triglycerides']['positive']:''}}</td>
					</tr>
					<tr>
						<td colspan="2">27. Trichomonas</td>
						<td colspan="2"></td>
						<td colspan="2"></td>
						<td></td>
						<td colspan="2">62. Cholesterol</td>
						<td colspan="2">{{(isset($testTypeCountArray['cholesterol']['cholesterol']))?$testTypeCountArray['cholesterol']['cholesterol']['total']:''}}</td>
						<td colspan="2">{{(isset($testTypeCountArray['cholesterol']['cholesterol']))?$testTypeCountArray['cholesterol']['cholesterol']['positive']:''}}</td>
					</tr>
					<tr>
						<td colspan="2">28. Stronyloides</td>
						<td colspan="2"></td>
						<td colspan="2"></td>
						<td></td>
						<td colspan="2">63. CK</td>
						<td colspan="2">{{(isset($testTypeCountArray['ck']['ck']))?$testTypeCountArray['ck']['ck']['total']:''}}</td>
						<td colspan="2">{{(isset($testTypeCountArray['ck']['ck']))?$testTypeCountArray['ck']['ck']['positive']:''}}</td>
					</tr>
					<tr>
						<td colspan="2">29. Shistosoma</td>
						<td colspan="2"></td>
						<td colspan="2"></td>
						<td></td>
						<td colspan="2">64. LDH</td>
						<td colspan="2">{{(isset($testTypeCountArray['ldh']['ldh']))?$testTypeCountArray['ldh']['ldh']['total']:''}}</td>
						<td colspan="2">{{(isset($testTypeCountArray['ldh']['ldh']))?$testTypeCountArray['ldh']['ldh']['positive']:''}}</td>
					</tr>
					<tr>
						<td colspan="2">30. Taenia</td>
						<td colspan="2"></td>
						<td colspan="2"></td>
						<td></td>
						<td colspan="2">65. HDL</td>
						<td colspan="2">{{(isset($testTypeCountArray['hdl']['hdl']))?$testTypeCountArray['hdl']['hdl']['total']:''}}</td>
						<td colspan="2">{{(isset($testTypeCountArray['hdl']['hdl']))?$testTypeCountArray['hdl']['hdl']['positive']:''}}</td>
					</tr>
					<tr>
						<td colspan="2">31. Askaris</td>
						<td colspan="2"></td>
						<td colspan="2"></td>
						<td></td>
						<td colspan="6">Other Clinical Chemistry Tests</td>
					</tr>
					<tr>
						<td colspan="2">32. Hookworm</td>
						<td colspan="2"></td>
						<td colspan="2"></td>
						<td></td>
						<td colspan="2">66. Alkaline Phos</td>
						<td colspan="2">{{(isset($testTypeCountArray['alkaline_phosphates']['alkaline_phosphates']))?$testTypeCountArray['alkaline_phosphates']['alkaline_phosphates']['total']:''}}</td>
						<td colspan="2">{{(isset($testTypeCountArray['alkaline_phosphates']['alkaline_phosphates']))?$testTypeCountArray['alkaline_phosphates']['alkaline_phosphates']['positive']:''}}</td>
					</tr>
					<tr>
						<td colspan="2">33. Trichuris</td>
						<td colspan="2"></td>
						<td colspan="2"></td>
						<td></td>
						<td colspan="2">67. Amylase</td>
						<td colspan="2">{{(isset($testTypeCountArray['amylase']['amylase']))?$testTypeCountArray['amylase']['amylase']['total']:''}}</td>
						<td colspan="2">{{(isset($testTypeCountArray['amylase']['amylase']))?$testTypeCountArray['amylase']['amylase']['positive']:''}}</td>
					</tr>
					<tr>
						<td colspan="2">34. Other Parasites</td>
						<td colspan="2"></td>
						<td colspan="2"></td>
						<td></td>
						<td colspan="2">68. Glucose</td>
						<td colspan="2">
							@if(isset($testTypeCountArray['glucose']))
								{{(isset($testTypeCountArray['glucose']['glucose']))?$testTypeCountArray['glucose']['glucose']['total']:''}}
							@endif
						</td>
						<td colspan="2">
							@if(isset($testTypeCountArray['glucose']))
								{{(isset($testTypeCountArray['glucose']['glucose']))?$testTypeCountArray['glucose']['glucose']['positive']:''}}
							@endif
						</td>
					</tr>
					<tr>
						<td colspan="6" style="background-color: #cccccc;">7.4 SEROLOGY</td>
						<td></td>
						<td colspan="2">69. Uric Acid</td>
						<td colspan="2">
							{{(isset($testTypeCountArray['uric_acid']['uric_acid']))?$testTypeCountArray['uric_acid']['uric_acid']['total']:''}}</td>
						<td colspan="2">
							{{(isset($testTypeCountArray['uric_acid']['uric_acid']))?$testTypeCountArray['uric_acid']['uric_acid']['positive']:''}}</td>
					</tr>
					<tr>
						<td colspan="2">35. VDRL/RPR</td>
						<td colspan="2">{{(isset($testTypeCountArray['vdrl_rpr']))?$testTypeCountArray['vdrl_rpr']['total']:''}}</td>
						<td colspan="2">{{(isset($testTypeCountArray['vdrl_rpr']))?$testTypeCountArray['vdrl_rpr']['positive']:''}}</td>
						<td></td>
						<td colspan="2">70. Lactate</td>
						<td colspan="2">{{(isset($testTypeCountArray['lactate']['lactate']))?$testTypeCountArray['lactate']['lactate']['total']:''}}</td>
						<td colspan="2">{{(isset($testTypeCountArray['lactate']['lactate']))?$testTypeCountArray['lactate']['lactate']['positive']:''}}</td>
					</tr>
					<tr>
						<td colspan="2">36. TPHA</td>
						<td colspan="2">{{(isset($testTypeCountArray['tpha']['tpha']))?$testTypeCountArray['tpha']['tpha']['total']:''}}</td>
						<td colspan="2">{{(isset($testTypeCountArray['tpha']['tpha']))?$testTypeCountArray['tpha']['tpha']['positive']:''}}</td>
						<td></td>
						<td colspan="2" rowspan="2">71. Others</td>
						<td colspan="2"></td>
						<td colspan="2"></td>
					</tr>
					<tr>
						<td colspan="2">37. Shigella Dysentery</td>
						<td colspan="2">{{(isset($testTypeCountArray['shigella_dysentery']))?$testTypeCountArray['shigella_dysentery']['total']:''}}</td>
						<td colspan="2">{{(isset($testTypeCountArray['shigella_dysentery']))?$testTypeCountArray['shigella_dysentery']['positive']:''}}</td>
						<td></td>
						<td colspan="2"></td>
						<td colspan="2"></td>
					</tr>
				</tbody>
			</table>
			<br>
			<table  class="table table-condensed report-table-border">
				<tr>
					<td colspan="7" style="background-color: #cccccc;">7.8 SUMMARY OF HIV TEST BY PURPOSE</td>
				</tr>
				<tr>
					<td>CATEGORY</td>
					<td>HCT</td>
					<td>PMTCT</td>
					<td>CLINICAL DIAGNOSIS</td>
					<td>QUALITY CONTROL</td>
					<td>SMC</td>
					<td>TOTAL</td>
				</tr>
				<tr>
					<td>72. DETERMINE</td>
					<td>{{(isset($testTypeCountArray['hiv']))?$testTypeCountArray['hiv']['determine']['HCT']:''}}</td>
					<td>{{(isset($testTypeCountArray['hiv']))?$testTypeCountArray['hiv']['determine']['PMTCT']:''}}</td>
					<td>{{(isset($testTypeCountArray['hiv']))?$testTypeCountArray['hiv']['determine']['CLINICAL DIAGNOSIS']:''}}</td>
					<td>{{(isset($testTypeCountArray['hiv']))?$testTypeCountArray['hiv']['determine']['QUALITY CONTROL']:''}}</td>
					<td>{{(isset($testTypeCountArray['hiv']))?$testTypeCountArray['hiv']['determine']['SMC']:''}}</td>
					<td>{{(isset($testTypeCountArray['hiv']))?$testTypeCountArray['hiv']['determine']['total']:''}}</td>
				</tr>
				<tr>
					<td>73. STAT PAK</td>
					<td>{{(isset($testTypeCountArray['hiv']))?$testTypeCountArray['hiv']['start_pak']['HCT']:''}}</td>
					<td>{{(isset($testTypeCountArray['hiv']))?$testTypeCountArray['hiv']['start_pak']['PMTCT']:''}}</td>
					<td>{{(isset($testTypeCountArray['hiv']))?$testTypeCountArray['hiv']['start_pak']['CLINICAL DIAGNOSIS']:''}}</td>
					<td>{{(isset($testTypeCountArray['hiv']))?$testTypeCountArray['hiv']['start_pak']['QUALITY CONTROL']:''}}</td>
					<td>{{(isset($testTypeCountArray['hiv']))?$testTypeCountArray['hiv']['start_pak']['SMC']:''}}</td>
					<td>{{(isset($testTypeCountArray['hiv']))?$testTypeCountArray['hiv']['start_pak']['total']:''}}</td>
				</tr>
				<tr>
					<td>74. UNIGOLD</td>
					<td>{{(isset($testTypeCountArray['hiv']))?$testTypeCountArray['hiv']['unigold']['HCT']:''}}</td>
					<td>{{(isset($testTypeCountArray['hiv']))?$testTypeCountArray['hiv']['unigold']['PMTCT']:''}}</td>
					<td>{{(isset($testTypeCountArray['hiv']))?$testTypeCountArray['hiv']['unigold']['CLINICAL DIAGNOSIS']:''}}</td>
					<td>{{(isset($testTypeCountArray['hiv']))?$testTypeCountArray['hiv']['unigold']['QUALITY CONTROL']:''}}</td>
					<td>{{(isset($testTypeCountArray['hiv']))?$testTypeCountArray['hiv']['unigold']['SMC']:''}}</td>
					<td>{{(isset($testTypeCountArray['hiv']))?$testTypeCountArray['hiv']['unigold']['total']:''}}</td>
				</tr>
			</table>
		</div>
	</div>
</div>

@stop