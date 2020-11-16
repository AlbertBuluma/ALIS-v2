<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class BbincidenceActionIntermediate extends Eloquent
{
	/**
	 * Enabling soft deletes for specimen type details.
	 *
	 */
	use SoftDeletingTrait;
	protected $dates = ['deleted_at'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'unhls_bbincidences_action';

}