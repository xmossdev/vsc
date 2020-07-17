<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CityList extends Model
{
    protected $fillable = ['name','state','country','lon','lat'];
    protected $table = 'city_list';
}
