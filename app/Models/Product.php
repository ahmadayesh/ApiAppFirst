<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    protected $table = 'product';
    protected $fillable = ['name', 'description', 'salary', 'id','created_at','updated_at'];


    /**    Relation Many To Many  (user and Product) and -> pivotTable Order   **/
    public function user()
    {
        return $this->belongsToMany('\App\User', 'order','user_id','product_id');
    }

}
