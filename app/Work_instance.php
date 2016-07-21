<?php

namespace App;
use App\Project;
use Illuminate\Database\Eloquent\Model;

class Work_instance extends Model
{
    protected $table = 'work_instances';

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
