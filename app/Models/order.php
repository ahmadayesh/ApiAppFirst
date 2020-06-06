<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = 'order';
    protected $fillable = [ 'product_id', 'user_id','state_id','id'];
}
