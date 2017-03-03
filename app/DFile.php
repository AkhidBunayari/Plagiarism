<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DFile extends Model
{
    protected $table = 'files';
    protected $fillable = ['user_id', 'name', 'name_upload', 'content', 'table', 'number', 'percent'];

    public function user() {
    	return $this->belongsTo('App\User');
    }
}
