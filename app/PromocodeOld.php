<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PromocodeOld extends Model
{
    protected $table = 'promo_old';
    protected $fillable = ['promo_id'];
    public $timestamps = false;
}
