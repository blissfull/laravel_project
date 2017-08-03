<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //find project if we have a service
    public function projects()
    {
    	return $this->belongsToMany(Projects::class);
    }
}
