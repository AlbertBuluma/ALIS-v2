<?php

namespace  App\Models;
# functions to create and manage drop down lists

use Doctrine\DBAL\Driver\PDOException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;


class LookUp extends Model
{
	protected $table = "look_ups";
	protected $fillable = ['name', 'description','status'];

	/**
	 * Return the values of the options for the lookup type
	 *
	 * @param String $orderby The column to order the results by, either optiontext - the text or optionvalue the value
	 *
	 * @return Array containing the lookup types for the values or false if an error occurs
	 *
	 */
	function getOptionValuesAndDescription($orderby = "optiontext") {

		$response_data = array();
		$response_code = 200;

		// TRY TO RETURN A CACHED RESPONSE
		$cache_key = $this->name;
		$lookupvalues = Cache::get($cache_key, null);
		// IF NO CACHED RESPONSE, QUERY THE DATABASE
		if (!$lookupvalues) {
			try {
				$optionvaluesquery = "SELECT lv.value_description as optiontext, lv.value as optionvalue FROM look_ups AS l ,
		look_up_values AS lv WHERE l.id =  lv.look_up_id AND l.name ='".$this->name."' ORDER BY ".$orderby;
			$lookupvalues = getOptionValuesFromDatabaseQuery($optionvaluesquery);

				Cache::put($cache_key, $lookupvalues, config('app.lookup_value_cache_minutes'));
			} catch (PDOException $ex) {
				$response_code = 500;
				$response_data['error'] = ErrorReporter::raiseError($ex->getCode());
			}
		}
		return $lookupvalues;
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
	static function getLookupValueDescription($lookuptype, $lookuptypevalue) {
	    $cache_key = $lookuptype;
		//try to load the lookup from cache - if it exist
	    $result = Cache::get($cache_key, null);

	    if (!$result) {
			//pluck out the needed column
		$result = DB::table('look_up_values as lv')->select('lv.value_description')->join('look_ups as l','lv.look_up_id', 'l.id')
												->where('l.name','=',$lookuptype)
												->where('lv.value','=',$lookuptypevalue)->pluck('lv.value_description');
		//DB::table('users')->pluck('columname');
    		// add the result to the cache
			Cache::put($cache_key, $lookuptype.$lookuptypevalue, config('app.lookup_value_cache_minutes'));
	   }
	   return $result[0];
	}
}
