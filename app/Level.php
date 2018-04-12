<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = 'project_levels';

    protected $fillable = [
        'level_name',
        'level_small_description',
        'level_large_description',
        'userid',
        'project_id',
        'images',

    ];

public function project()
{
    return $this->belongsTo('App\Project');
}



}
