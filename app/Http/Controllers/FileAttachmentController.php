<?php

namespace App\Http\Controllers;

use App\Models\UnhlsTestResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FileAttachmentController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /fileattachment
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /fileattachment/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /fileattachment
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /fileattachment/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /fileattachment/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /fileattachment/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	public function result_upload(){

			return view("fileupload.upload_result");

		}

	public function updateupload(Request $request)
	{

      //Display File Name
     		$fileInput_field = $request->file('report');
     		$file_ext = "csv";


			$file_name =  $fileInput_field->getClientOriginalName();
			$extension =  $fileInput_field->getClientOriginalExtension();

			$dest_folder = public_path().'/uploads';
			$dest_fileName = time(). $extension;
			$uploaded_file =  $fileInput_field->move($dest_folder, $file_name);

			$uploaded_file = $dest_folder . "/" . $file_name;
			//now save the file to db
			// dd($uploaded_file);
			$query = "select original_file_name from hpv_results";
			$results = DB::select($query);
			//dd($results);
			//check that the file being uploaded has not been yet uploaded
			$existing_file = DB::select("SELECT id FROM unhls_test_results");


			$unsaved_results = $this->save_file_results($uploaded_file,$file_name,$dest_fileName);
			$message = 'Results uploaded successfully';
			$message_type = 'success';
			if(count($unsaved_results))	{
				$message = "the case details for the following ids have not yet been captured, so their results have not been uploaded
				 <br> ".implode(',', $unsaved_results);
				$message_type = 'danger';
			}
			return redirect()->route('unhls_test.index')->with($message_type,$message);
		}

	private function save_file_results($file_path,$original_file_name,$used_file_name){
		// $lines = file($file_path);
		$file = fopen($file_path, 'r');
		$tab = "\t";
		$tab1 = ";";
		$tab2 = " ";
		//dd(\DB::getDatabaseName());
		$count = 0;
		while(($line = fgetcsv($file)) !== FALSE){
			$patient_not_found = [];
			// $line = fgets($file);
			// $row = explode($tab, $line);
			if($count > 0){
				$sampleID = trim($line[0]);
				$row = explode($tab1, $sampleID);
				$labid = $row[10];
				// dd($labid);
				// dd($row[8]);
				// dd($row[12]);
				// if($sampleID === '[end]'){
				// 	break;
				// }else{
					//get the patient
					//$patient = Covid::where('epidNo', '=', $sampleID);
					$patient = DB::select("SELECT ut.id as id, ut.visit_id, ulin FROM unhls_tests ut JOIN unhls_visits uv ON(ut.visit_id = uv.id) JOIN unhls_patients up ON(uv.patient_id = up.id) where up.ulin = '".$labid."'");
					if(count($patient)){
						if(trim($row[8]) == 'ALTL'){
							//negative result
							$measure_id = '120';
						}elseif(trim($row[8]) == 'ASTL'){
							$measure_id = '121';
						}elseif(trim($row[8]) == 'ALB2'){
							$measure_id = '122';
						}elseif(trim($row[8]) == 'ALP2S'){
							$measure_id = '123';
						}elseif(trim($row[8]) == 'AMYL2'){
							$measure_id = '124';
						}
						$create_update = [
							'result' => $row[12],
							'test_id' => $patient['id'],
							'measure_id' => $measure_id,
							'time_entered' => $row[4],
							'received_by' => Auth::user()->id,
							'original_file_name' => $original_file_name,
							'used_file_name' => $used_file_name
						];
						//dd($create_update);
						//Result::updateOrCreate(['patient_id'=>$patient[0]->id],$create_update);
						UnhlsTestResult::updateOrCreate(['test_id' => $patient['id']],$create_update);

					}else{
						//store the unstored patients
						$patient_not_found[] = $labid;
					}
				// }
			}
			$count++;
		}
		return $patient_not_found;
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /fileattachment/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
