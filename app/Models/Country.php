<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='countries';
    protected $primaryKey='id';
    protected $fillable=[
        'id','name','code',
    ];

    public function state()
    {
       return $this->hasMany('App\Models\State');
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
