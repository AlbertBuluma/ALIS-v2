<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
* Class for holding topup requests from the bench to the inventory
*/
class TopupRequest extends Model {
    use SoftDeletes;
	protected $table = 'topup_requests';
	protected $dates = ['deleted_at'];

	/**
	* Commodities relationship
	*/
	public function commodity()
	{
		return $this->belongsTo('App\Models\Commodity');
	}

	/**
	* Relationship between commodity and the user who handled it
	*/
	public function user(){
		return $this->belongsTo('App\Models\User');
	}

	/**
	 * TestCategory relationship
	 */
	public function section()
	{
		return $this->belongsTo('App\Models\TestCategory', 'test_category_id');
	}
}
