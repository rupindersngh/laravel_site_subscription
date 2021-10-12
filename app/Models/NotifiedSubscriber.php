<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotifiedSubscriber extends Model
{
	use HasFactory;

	protected $table 		= 'notified_subscribers';
	protected $primaryKey 	= 'id';
	public $timestamps 		= false;
	protected $fillable 	= ['post_id', 'subscriber_id', 'created_at', 'updated_at'];
}
