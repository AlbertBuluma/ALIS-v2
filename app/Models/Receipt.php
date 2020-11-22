<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Receipt extends Model
{
	use SoftDeletes;
	protected $table = 'receipts';

	public function getTotalReceipts()
	{
		$totalReceipts = DB::table('receipts')->sum('qty');
	}

	/**
	* Commodities relationship
	*/
	public function commodity()
	{
		return $this->belongsTo('App\Models\Commodity');
	}

	/**
	* Supplier relationship
	*/
	public function supplier()
	{
		return $this->belongsTo('App\Models\Supplier');
	}

	/**
	* User relationship
	*/
	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}

	public static function getIssuedCommodities($from, $to){

	//$params = array($from, $to);
		$reportData = UNHLSStockcard::with('District','Year','Facility','Commodity')
				->get();
	//,
		//$params


		return $reportData;



	}

}
