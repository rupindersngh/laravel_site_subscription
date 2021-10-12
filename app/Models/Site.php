<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
	use HasFactory;

	protected $table 		= 'sites';
	protected $primaryKey 	= 'id';
	public $timestamps 		= false;
	protected $fillable 	= ['site', 'created_at', 'updated_at'];
}