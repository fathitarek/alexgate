<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $table = 'buildings';
    protected $fillable = [
        'building_name',
        'building_location_id',
        'building_price',
        'building_rent',
        'building_area',
        'building_type',
        'building_small_description',
        'building_meta',
        'building_large_description',
        'rooms',
        'baths',
        'project_id',
        'status',
        'user_id',
        'image',
        'month',
        'year',
        'nameurl',

    ];


public function project()
{
    return $this->belongsTo('App\project');
}

}
