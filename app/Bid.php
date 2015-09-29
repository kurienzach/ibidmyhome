<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    public function project_unit()
    {
        return $this->belongsTo('App\ProjectUnit', 'unit_id');
    }

    public function user()
    {
        return $this->hasOne('App\User');
    }
}
