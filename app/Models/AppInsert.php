<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class AppInsert extends Model
{
	protected $table = 'vehicle';
	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'plateNo', 'colour','type','brand','model',
	];
}