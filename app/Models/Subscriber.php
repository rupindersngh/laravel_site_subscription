<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
	use HasFactory;

	protected $table 		= 'subscribers';
	protected $primaryKey 	= 'id';
	public $timestamps 		= false;
	protected $fillable 	= ['email', 'site_id', 'created_at', 'updated_at'];
}
