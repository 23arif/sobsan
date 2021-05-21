<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrImage extends Model
{
    protected $table='pr_image';
    protected $fillable=['pr_id','img'];
    public $timestamps = false;
}
