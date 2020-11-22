<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Issue extends Model
{
	use SoftDeletes;
	protected $table = 'issues';
	protected $dates = ['deleted_at'];

	public function getTotalIssues()
	{
		$totalIssues = DB::table('issues')->sum('qty_req');
	}

	/**
	* Topup request relationship
	*/
	public function topupRequest()
	{
		return $this->belongsTo('App\Models\TopupRequest');
	}

	/**
	* Relationship between commodity and the user who was issued
	* the items
	*/
	public function receiver(){
		return $this->belongsTo('App\Models\User', 'issued_to');
	}

	/**
	* User relationship
	*/
	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}

	/**
	* Receipts relationship
	*/
	public function receipt()
	{
		return $this->belongsTo('App\Models\Receipt');
	}

}
