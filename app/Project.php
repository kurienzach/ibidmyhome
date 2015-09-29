<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function project_units()
    {
        return $this->hasMany('App\ProjectUnit');
    }
}
