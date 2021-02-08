<?php
/**
 * Change a date from MySQL database Format (yyyy-mm-dd) to the format displayed on pages(mm/dd/yyyy)
 * 
 * If the date from the database is NULL, it is transformed to an empty string for display on the pages 
 *
 * @param String $mysqldate The date in MySQL format 
 * @return String the date in short date format, or an empty string if no date is provided 
 */
function changeMySQLDateToPageFormat($mysqldate) {
	if (isEmptyString($mysqldate)) {
		return $mysqldate;
	} else {
		return date('d/m/Y', strtotime($mysqldate));
	}
}

/**
 * Transform a date from the format displayed on pages(mm/dd/yyyy) to the MySQL database date format (yyyy-mm-dd). 
 * If the date from the database is an empty string or the string NULL, it is transformed to a NULL value.
 *
 * @param String $pagedate The string representing the date
 * @return String The MYSQL datetime format or NULL if the provided date is an empty string or the string NULL 
 */
function changeDateFromPageToMySQLFormat($pagedate) {
	if ($pagedate == "NULL") {
		return NULL;
	}
	if (isEmptyString($pagedate)) {
		return NULL;
	} else {
		return date("Y-m-d H:i:s", strtotime($pagedate));
	}
}


/**
 * Check whether or not the value of the key in the specified array is empty
 *
 * @param String $key The key whose value is to be checked
 * @param Array $arr The array to check  
 * 
 * @return bool Whether or not the array key is empty
 */
function isArrayKeyAnEmptyString($key, $arr) {
	if (!array_key_exists($key, $arr)) {
		return true; 
	}
	if (empty($arr[$key])) {
		return true; 
	}
	if (is_string($arr[$key])) {
		return isEmptyString($arr[$key]);
	}
	return false; 
}
/**
 * Check whether or not the string is empty. The string is emptied
 *
 * @param String $str The string to be checked
 * 
 * @return boolean Whether or not the string is empty
 */
function isNotAnEmptyString($str) {
	return ! isEmptyString($str);
}

/**
 * Return a debug message with a break tag before and two break tags after
 *
 * @param Object $obj The object to be printed
 */
function debugMessage($obj) {
	echo "<br />";
	print_r($obj);
	echo "<br /><br />";
}
/**
 * Print the Doctrine management entity
 *
 * @param Object $obj The object to be printed
 
function debugEntity($obj) {
    echo "<br />";
    \Doctrine\Common\Util\Debug::dump($obj);
    echo "<br /><br />";
}*/

/**
 *  Merge the arrays passed to the function and keep the keys intact.
 *  If two keys overlap then it is the last added key that takes precedence.
 * 
 * @return Array the merged array
 */
function array_merge_maintain_keys() {
	$args = func_get_args();
	$result = array();
	foreach ( $args as &$array ) {
		foreach ( $array as $key => &$value ) {
			$result[$key] = $value;
		}
	}
	return $result;
}

# function that trims every value of an array
function trim_value(&$value) {
	$value = trim($value);
}

/**
 * Recursively Remove empty values from an array. If any of the keys contains an 
 * array, the values are also removed.
 *
 * @param Array $input The array
 * @return Array with the specified values removed or the filtered values
 */
function array_remove_empty($arr) {
	$narr = array();
	while ( list ($key, $val) = each($arr) ) {
		if (is_array($val)) {
			$val = array_remove_empty($val);
			// does the result array contain anything?
			if (count($val) != 0) {
				// yes :-)
				$narr[$key] = $val;
			}
		} else {
			if (! isEmptyString($val)) {
				$narr[$key] = $val;
			}
		}
	}
	unset($arr);
	return $narr;

}


/**
 * Wrapper function for the encoding of the urls using base64_encode 
 *
 * @param String $str The string to be encoded
 * @return String The encoded string 
 */
function encode($str) {
	return base64_encode($str); 
}
/**
 * Wrapper function for the decoding of the urls using base64_decode 
 *
 * @param String $str The string to be decoded
 * @return String The encoded string 
 */
function decode($str) {
	return base64_decode($str); 
}

/**
 * Function to generate a JSON string from an array of data, using the keys and values
 *
 * @param $data The data to be converted into a string
 * @param $default_option_value Value of the default option
 * @param $default_option_text Test for the default 
 * 
 * @return the JSON string containing the select options
 */
function generateJSONStringForSelectChain($data, $default_option_value = "", $default_option_text = "<Select One>") {
	$values = array(); 
	//debugMessage($data);
	if (!isEmptyString($default_option_value)) {
		# use the text and option from the data
		if(!isArrayKeyAnEmptyString($default_option_value, $data)){
			$values[] = '{"id":"' . $default_option_value . '", "label":"' . $data[$default_option_value] . '"}';
			// remove the default option from the available options
			unset($data[$default_option_value]);
		}
	}
	# add a default option
	$values[] = '{"id":"", "label":"' . $default_option_text . '"}';
	foreach ( $data as $key => $value ) {
		$values[] = '{"id":"'.$key.'", "label":"' . $value . '"}';
		//debugMessage($strstring);
	}
	# remove the first comma at the end
	return '[' . implode("," , $values). "]";
}

/**
 * Generate an HTML list from an array of values
 *
 * @param Array $array
 * @return String 
 */
function createHTMLListFromArray($array) {
	$str = ""; 
	// return empty string if no array is passed
	if (!is_array($array)) {
		return $str; 
	}
	// return an empty string if the array is empty
	if (!$array) {
		return $str; 
	}
	
	// opening list tag and the first li element
	$str  = "<ul><li>";
	// explode the array and generate the inner list items
	$str .= implode($array, "</li><li>");
	// close the last list item, and the ul
	$str .= "</li></ul>"; 
	
	return $str; 
}


/**
	 * Decode all html entities of an array  
	 * @param Array $elem the array to be decoded
	 */
	function decodeHtmlEntitiesInArray(&$elem){ 
  		if (!is_array($elem)) { 
    		$elem=html_entity_decode($elem); 
		}  else  { 
			foreach ($elem as $key=>$value){
				$elem[$key]=decodeHtmlEntitiesInArray($value);
			} 
  		} 
		return $elem; 
	}
	
	/**
	 * Get a database connection to execute straight SQL queries
	 * 
	 * @return Doctrine\DBAL\Connection 
	 */
	
	
	
	function isValidObject($object){
		return is_object($object) && (count(get_object_vars($object)) > 0);
	}
	
	
	/**
	 * Generate a 10 digit activation key  
	 * 
	 * @return String An activation key
	 */
    function generateActivationKey() {
		return substr(md5(uniqid(mt_rand(), 1)), 0, 10);
    }
    /**
     * Return the file extension from a file name
     * @param string $filename
     * @return string The file extension
     */
    function findExtension($filename){
        return substr(strrchr($filename,'.'),1);
    }
    /** Displays the file siz in bytes, KB, MB or GB depending on your selection, from the size stored for the
     * document.
     *
     * @param integer $size The size of the file
     * @param integer $precision The number of decimal places to show  
     *
     * @return String The file size with the defined type of FALSE if there is an invalid size
     */
    function formatBytes($size, $precision = 2) {
        $base = log($size) / log(1024);
        $suffixes = array('', 'KB', 'MB', 'GB', 'TB');
    
        return round(pow(1024, $base - floor($base)), $precision) . " ".$suffixes[floor($base)];
    }
    /**
	 * Trims a given string with a length more than a specified length with a more link to view the details 
	 *
	 * @param string $text
	 * @param int $length
	 * @param string $tail
	 * @return string the substring with a more link as the tail
	 */
	function snippet($text, $length, $tail) {
		$text = trim($text);
		$txtl = strlen($text);
		if ($txtl > $length) {
			for($i = 1; $text[$length - $i] != " "; $i ++) {
				if ($i == $length) {
					return substr($text, 0, $length) . $tail;
				}
			}
			for(; $text[$length - $i] == "," || $text[$length - $i] == "." || $text[$length - $i] == " "; $i ++) {
				;
			}
			$text = substr($text, 0, $length - $i + 1) . $tail;
		}
		return $text;
	}
	
 	function printtoScreen(){
	 echo 'common functions works find';
	}
	
	function generateContextMenu($currenturl){
		$links = '';
		if (strpos($currenturl, 'hub') !== false){
			$links .= '<li> <a href="'.route('hub.index').'">All hubs</a></li>';
			$links .= '<li> <a href="'.route('hub.create').'">New hub</a></li>';
		}elseif(strpos($currenturl, 'organization') != false){
			$links .= '<li> <a href="'.route('organization.index').'">All IPs</a></li>';
			$links .= '<li> <a href="'.route('organization.create').'">New IP</a></li>';
		}elseif(strpos($currenturl, 'facility') != false){
			$links .= '<li> <a href="'.route('facility.index').'">All facilities</a></li>';
			$links .= '<li> <a href="'.route('facility.create').'">New facility</a></li>';
		}elseif(strpos($currenturl, 'equipment') != false){
			$links .= '<li> <a href="'.route('equipment.index').'">All bikes</a></li>';
			if(!(Auth::user()->hasRole('In_charge'))){
				$links .= '<li> <a href="'.route('equipment.create').'">New bike</a></li>';
			}
		}elseif(strpos($currenturl, 'staff/list/2') != false || strpos($currenturl, 'staff/new/2') != false){
			$links .= '<li> <a href="'.url('staff/list/2').'">All sample receptionists</a></li>';
			$links .= '<li> <a href="'.url('staff/new/2').'">New sample receptionist</a></li>';
		}elseif(strpos($currenturl, 'staff/list/1') != false || strpos($currenturl, 'staff/new/1') != false){
			$links .= '<li> <a href="'.url('staff/list/1').'">All sample transporters</a></li>';
			$links .= '<li> <a href="'.url('staff/new/1').'">New transporter</a></li>';
		}elseif(strpos($currenturl, 'roles') != false || strpos($currenturl, 'permissions') != false || strpos($currenturl, 'users') != false){
			if(!(Auth::user()->hasRole('Admin'))){
				$links .= '<li> <a href="'.route('roles.index').'">All roles</a></li>';
				$links .= '<li> <a href="'.route('roles.create').'">Create role</a></li>';
				$links .= '<li> <a href="'.route('permissions.index').'">All permissions</a></li>';
				$links .= '<li> <a href="'.route('permissions.create').'">Add Permission</a></li>';				
			}
			if(!(Auth::user()->hasRole(['In_charge', 'Admin']))){
				$links .= '<li> <a href="'.route('users.index').'">All users</a></li>';
				$links .= '<li> <a href="'.route('users.create').'">New user</a></li>';
			}
			
		}elseif (strpos($currenturl, 'sampletracking') !== false){
			$links .= '<li> <a href="'.route('sampletracking.index').'">All Refered Samples</a></li>';
			$links .= '<li> <a href="'.route('sampletracking.create').'">Refer Sample</a></li>';
		}
		return $links;
	}
	/*get the name of a model
	*
	*
	*
	*/
	function getModelAttribute($id, $model, $attribute) {
		$model = $model::findOrFail($id); //Find model of id = $id
        return $model->$attribute;
    }
	
	/**
	 * Return the description of a lookup value 
	 * 
	 * @param String $lookuptype The Lookuptype - passed dynamically, that is why a static method is used
	 * 
	 * @param String $lookuptypevalue The actual lookvalue that was saved, now needs translation 
	 * 
	 * @return Array containing the lookup types for the values or false if an error occurs
	 *
	 */
	 function getLookupValueDescription($lookuptype, $lookuptypevalue) {
	    $cache_key = $lookuptype;
		//try to load the lookup from cache - if it exist
	    $result = Cache::get($cache_key, null);

	    if (!$result) {
			//pluck out the needed column
		$result = DB::table('lookuptypevalue as lv')->select('lv.lookupvaluedescription')->join('lookuptype as l','lv.lookuptypeid', 'l.id')
												->where('l.name','=',$lookuptype)
												->where('lv.lookuptypevalue','=',$lookuptypevalue)->pluck('lv.lookupvaluedescription');
		//DB::table('users')->pluck('columname');
    		// add the result to the cache
			Cache::put($cache_key, $lookuptype.$lookuptypevalue, \Config::get('app.lookup_value_cache_minutes'));
	   } 
	   return $result[0];
	}
	function getSupportPeriodDates($organizationid){
		$query = "SELECT sp.startdate, sp.enddate from supportagencyperiod sp
		INNER JOIN organization org ON sp.organizationid = org.id";
		$dates = \DB::select($query);
		return $dates;
	}
	function getFacilitiesForIP($organisationid){
	$query = "SELECT f.id, f.name, h.hubname as hub, fl.level as `facilitylevel`, d.name as district 
		FROM facility as f 
		INNER JOIN facility as h ON (f.parentid = h.id) 
		INNER JOIN ips_facilities ipf ON (ipf.facilityID = f.id AND ipf.ipID = '".$organisationid."')
		INNER JOIN ips i ON (ipf.ipID = i.id)
		INNER JOIN facilitylevel AS fl ON (f.facilitylevelid = fl.id) 
		INNER JOIN district as d ON(f.districtid = d.id)
		ORDER BY f.name ASC";
		$facilities = \DB::select($query);
		return $facilities;
	}
	function getIpsForFacility($facilityid){
		$query = "SELECT  i.name from ips_facilities ipf
INNER JOIN facility f ON (ipf.facilityID = f.id)
INNER JOIN organization i ON (ipf.ipID = i.id AND ipf.facilityID ='".$facilityid."')
where ISNULL(f.parentid) 
ORDER BY f.name";
	$ips = \DB::select($query);
	$names = array();
	foreach ($ips as $ip){
		$names[] = $ip->name;
	}
		return implode(", ", $names);
	} 
	
	function getContact($obj, $cat,$type,$table_attribute = 'organizationid'){
		return \App\Models\Contact::where($table_attribute, $obj)
											->where('category',$cat)
											->where('isactive',1)
											->where('type',$type)->first();
	}
	function getHubScheduleforaDay($day, $hubid){
		$schedule =  \App\Models\RoutingSchedule::where('dayoftheweek', '=', $day)->where('hubid', $hubid)->get();
		return $schedule;
	}
		
	function getHubScheduleFacilitiesforaDay($day, $hubid){
		$schedule = getHubScheduleforaDay($day, $hubid);
		$ids_array = array();
		$no_items = count($schedule);
		if($no_items){
			foreach($schedule as $line){
				$ids_array[] = $line->facilityid;
				
			}
		}
		return $ids_array;
	}
	function getActionTakenOnBike($breakdownid){
		return \App\Models\EquipmentBreakDownAction::where('equipmentbreakdownid', $breakdownid)->paginate(10);
		
	}
	function getBikeBreakDownReason($breakdownid){
		return \App\Models\EquipmentBreakDownReason::where('equipmentbreakdownid', $breakdownid)->paginate(10);
	}
	
		/**
		 * Generate an array of dates for the period, in this case for a week
		 * 
		 * @return Array 
		 */
		function getDatesInPeriod(){
			$weekendingdate = new DateTime();
			//$startdate = new DateTime();
			//$day = $startdate->modify("sunday ".$aconfig->timesheet->minweekendingdate." weeks ago");
			for ($i = 0; $i < 7; $i++) {
				$days[$weekendingdate->format("U")] = $weekendingdate->format("Y-m-d");  
				$weekendingdate->modify("-1 day");
			}
			ksort($days); 
			return  $days;
		}
		
		/**
		 * Get the date for the start of the timesheet period, in this case a week which starts on a Monday and ends on a Sunday
		 *
		 * @return The time stamp for the week ending date
		 */
		function getPeriodStartingDateTimestamp($date=NULL) {
			 $date_stamp = strtotime(date('Y-m-d', strtotime($date)));
			 //check date is sunday or monday
			$stamp = date('l', $date_stamp);      
		
			if($stamp == 'Mon'){
				$week_start = $date;
			}else{
				$week_start = date('Y-m-d', strtotime('Last Monday', $date_stamp));
			}
		
		
			if($stamp == 'Sunday'){
				$week_end = $date;
			}else{
				$week_end = date('Y-m-d', strtotime('Next Sunday', $date_stamp));
			}        
			return array($week_start, $week_end); 
		}
		function checkifPermissioninArray($key, $arr){
			if(!empty($arr)){
				foreach($arr as $ar){
					if($ar->id == $key){
						return 1;
					}
				}
			}
			return 0;
		}
		
	function generateSlug($str, $delimiter = '-'){
			$slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
			return $slug;
		} 
	function getTimeString($date){
		//set the default timezone
		date_default_timezone_set('Africa/Kampala');
		$now_seconds = strtotime((new DateTime())->format("Y-m-d H:i:s"));
		$display_string = '';
		$message_date = strtotime($date);
		//$message_date = strtotime('2018-01-17 08:57:22');
		$seconds = $now_seconds - $message_date;
		if($seconds < 60){
			$display_string = $seconds.' seconds ago';
		}else{
			$minutes = round($seconds/60);
			if($minutes < 60){
				if($minutes < 1){
					$display_string = $minutes.' minute ago';
				}else{
					$display_string = $minutes.' minutes ago';
				}
			}else{
				$hours = round($seconds/(60*60));
				if($hours < 24){
					if($hours < 2){
						$display_string = $hours.' hour ago';
					}else{
						$display_string = $hours.' hours ago';
					}
				}else{
					$days = round(($seconds/(60*60))/24);
					if($days < 6){
						if($days < 2){
							$display_string = $days.' day ago';
						}else{
							$display_string = $days.' day ago';
						}
					}else{
						$display_string = date('d/m/Y', $message_date);
					}
				}
			}
		}
		return $display_string;
		exit;
	}

	function generateRationInput($array_data,$field_name, $style = 'inline'){
		$options_string = '';
		foreach($array_data as $key =>$value){
			$options_string .= Form::radio($field_name,  $key).' 
			<span class="input-tag">'.$value.' </span>';
		}
		return $options_string;
	}
	function getPageDateFormat($date){
		return date('d/m/Y',strtotime($date));
	}
	
	function getMysqlDateFormat($date){
		return date("Y-m-d", strtotime($date));
	}
	function getDailyRoutingForBike($hubid, $bikeid, $thedate){
		$query = "SELECT dd.numberofsamples, dd.numberofresults, f.name, lv.lookupvaluedescription as category 
		FROM dailyroutingdetail as dd 
		INNER JOIN facility as f ON (dd.facilityid = f.id ) 
		INNER JOIN lookuptypevalue lv ON (lv.id = dd.samplecategory AND lv.lookuptypeid)
		INNER JOIN lookuptype l ON (l.id = lv.lookuptypeid)
		WHERE dd.hubid = '".$hubid."' AND dd.bikeid = '".$bikeid."' AND dd.thedate = '".$thedate."'
		ORDER BY f.name ASC";
		$dailyroutingdetails = \DB::select($query);
		return $dailyroutingdetails;
	}
	
	function getPackagesInTransitByType($type,$status = 1){
		//check the kind of user logged in and return the corresponding results
		$hubid = Auth::getUser()->hubid;
		$andwhere = '';
		if($hubid){
			$andwhere = " AND p.hubid = '".$hubid."'";
		}
		$query = "SELECT s.id FROM samples s
INNER JOIN package p ON(p.barcode_id = s.barcodeid)
INNER JOIN packagemovement pm ON (pm.packageid = p.id)
WHERE p.`type` = '".$type."' AND pm.`status` = 1 ".$andwhere;
//echo $query;
	$samples = \DB::select($query);
	return count($samples);
	
	} 
	
	function getReceivedSamples($type){
		$query = "SELECT s.id FROM samples s
INNER JOIN package p ON(p.barcode_id = s.barcodeid)
INNER JOIN packagemovement pm ON (pm.packageid = p.id)
WHERE p.`type` = '".$type."' AND pm.`status` = 3";
	$samples = \DB::select($query);
	return count($samples);
	} 
	

/*public function index(Request $request){

$notices = DB::select('select notices.id,notices.title,notices.body,notices.created_at,notices.updated_at,
users.name,departments.department_name
FROM notices
INNER JOIN users ON notices.user_id = users.id
INNER JOIN departments on users.dpt_id = departments.id
ORDER BY users.id DESC');

$notices = $this->arrayPaginator($notices, $request);

return view('welcome')->with('allNotices', $notices);

}

public function arrayPaginator($array, $request)
{
    $page = Input::get('page', 1);
    $perPage = 10;
    $offset = ($page * $perPage) - $perPage;

    return new LengthAwarePaginator(array_slice($array, $offset, $perPage, true), count($array), $perPage, $page,
        ['path' => $request->url(), 'query' => $request->query()]);
}
*/

function packageStats($status, $packagetype){
	$incharge_clause = '';
	if(Auth::user()->hasRole('hub_coordinator')){
		$incharge_clause .= " AND hubid = '".Auth::user()->hubid."'";
	}
	$query = "SELECT COUNT(id) as numberofsamples FROM package WHERE status = 
	".$status." AND type = '".$packagetype."'".$incharge_clause;		
	$samples = \DB::select($query);	
	if(!empty($samples)) { 
		return $samples[0]->numberofsamples;
	 } 
	return 0;	
}

function getWeekEndDates(){
	$date = time(); // Change to whatever date you need
	$dotw = $dotw = date('w', $date);
	$start = ($dotw == 1 /* Monday */) ? $date : strtotime('last Monday', $date);
	$end = ($dotw == 0 /* Sunday */) ? $date : strtotime('next Sunday', $date);
	return array('start' => date('m/d/Y',$start), 'end' => date('m/d/Y',$end));
}
function getTAT($delivered_at, $recieved_at, $received_at_cphl_on){
	$from_date = $delivered_at;
	if($recieved_at != ''){
		$from_date = $recieved_at;
	}
	if(trim($from_date) != '' && trim($received_at_cphl_on) != ''){
		$from_secs = strtotime(trim($from_date));
		$to_secs = strtotime(trim($received_at_cphl_on));
		//return 'starttime: '.$from_date.' endtime: '.$received_at_cphl_on.' '.number_format((($to_secs - $from_secs)/(60*60)),2,'.','').' hours';
		return time_elapsed($to_secs - $from_secs);
	}else{
		return '';
	}
}

function time_elapsed($secs){
    $bit = array(
        'y' => $secs / 31556926 % 12,
        'w' => $secs / 604800 % 52,
        'd' => $secs / 86400 % 7,
        'h' => $secs / 3600 % 24,
        'm' => $secs / 60 % 60,
        's' => $secs % 60
        );
	$ret = array();
    foreach($bit as $k => $v)
        if($v > 0)$ret[] = $v . $k;
        
    return join(' ', $ret);
}

 function getLabSection($test_type_id){
 	$query = "SELECT tc.name FROM test_types t
 	INNER JOIN test_categories tc ON(t.test_category_id = tc.id)
 	WHERE t.id = ".$test_type_id;
 	$result = DB::select($query);
 	return capitalizeFirstLetter($result[0]->name);
 }

 function getSpecimenName($specimen_id){
 	$query = "SELECT st.name FROM specimens s
 	INNER JOIN specimen_types st ON(s.specimen_type_id = st.id)
 	WHERE s.id = ".$specimen_id;
 	$result = DB::select($query);
 	return capitalizeFirstLetter($result[0]->name);
 }
 function capitalizeFirstLetter($str){
 	return ucwords(strtolower($str)); 
 }

 function getRejectionReasons($test_id){
 	$query = "SELECT rr.reason from unhls_tests t
	INNER JOIN analytic_specimen_rejections asr ON (asr.test_id = t.id)
	INNER JOIN analytic_specimen_rejection_reasons asrr ON (asrr.rejection_id = asr.id)
	LEFT JOIN rejection_reasons rr ON (asrr.reason_id = rr.id) 
	WHERE t.id = ".$test_id;
	$result = DB::select($query);
	return $result;
 }

// function getReferralTurnaroundTime($time_referred, $time_result_back)
// 	{
// 		// use time time the specimen was received
// 		$timeReceived = new DateTime($time_referred);
// 		$endTime = new DateTime( $time_result_back);
// 		$interval = $timeReceived->diff($endTime);

// 		$turnaroundTime = ($interval->days * 24 * 3600) + ($interval->h * 3600) + ($interval->i * 60) + ($interval->s);
// 		return $turnaroundTime;
// 	}
?>