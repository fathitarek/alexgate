<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    protected $table = 'projects';

    protected $fillable = [
        'project_name',
        'project_area',
        'project_features',
        'project_small_description',
        'project_meta',
        'project_large_description',
        'project_status',        
        'floors',
        'garage',
        'pay_methods',
        'project_location_id',
        'featured_project',
        'images',
        'lat',
        'lng',
        'nameurl',
    ];

public function levels()
{
    return $this->hasMany('App\Level');
}


public function buildings()
{
    return $this->hasMany('App\Building');
}

}
