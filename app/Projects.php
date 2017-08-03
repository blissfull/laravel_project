<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    //projects belongs to users
    public function user() 
    {
    	return $this->belongsTo(User::class);
    }

    //one project can have multiple services
    public function services()
    {
    	return $this->belongsToMany(Service::class);
    }
}
