<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectUnit extends Model
{
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
