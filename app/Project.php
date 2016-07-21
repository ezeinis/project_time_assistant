<?php

namespace App;

use App\User;
use App\Work_instance;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    public function user($value='')
    {
        return $this->belongsTo(User::class);
    }

    public function work_instances()
    {
        return $this->hasMany(Work_instance::class);
    }
}
