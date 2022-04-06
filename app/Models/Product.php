<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='products';
    protected $primaryKey='id';
    protected $fillable=[
        'id','name','category_id'
    ];
    public function category()
    {
        return $this->belongsTo('App\Models\Category','id');
    }
}
