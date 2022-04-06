<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='cities';
    protected $primaryKey='id';
    protected $fillable=[
        'id','name','state_id','country_id'
    ];

    public function country()
    {
        return $this->belongsTo('App\Models\Country','id');
    }

    public function state()
    {
        return $this->belongsTo('App\Models\State','id');
    }

        public function area()
    {
       return $this->hasMany('App\Models\Area','id');
    }
   
}
