<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrSuitable extends Model
{
    protected $table = 'pr_suitable';
    protected $fillable = ['pr_id', 'pr'];
    public $timestamps = false;

    public function getSuits()
    {
        return $this->hasMany('\App\Products', 'id', 'pr');
    }
}
