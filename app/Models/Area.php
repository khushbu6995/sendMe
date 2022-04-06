<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='areas';
    protected $primaryKey='id';
    protected $fillable=[
        'id','name','city_id','state_id','country_id'
    ];
    
    public function country()
    {
        return $this->belongsTo('App\Models\Country','id');
    }

    public function state()
    {
        return $this->belongsTo('App\Models\State','id');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City','id');
    }

}
