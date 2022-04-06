<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='states';
    protected $primaryKey='id';
    protected $fillable=[
        'id', 'name','country_id'
    ];
   
    public function country()
    {
        return $this->belongsTo('App\Models\Country','id');
    }
    
    public function city()
    {
       return $this->hasMany('App\Models\City');
    }

    public function area()
    {
       return $this->hasMany('App\Models\Area');
    }
}
