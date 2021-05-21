<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrColors extends Model
{
    protected $table = 'pr_colors';
    protected $fillable = ['pr_id', 'color_id'];
    public $timestamps = false;

    public function getColors()
    {
        return $this->hasOne('\App\Colors', 'id', 'color_id');
    }
}
