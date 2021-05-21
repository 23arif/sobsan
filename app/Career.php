<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $table = 'career';
    protected $fillable = ['start_date', 'end_date','destroy','active'];
    public $timestamps = false;

    public function getCareer()
    {
        return $this->hasMany('\App\CareerTranslate', 'career_id','id');
    }
    
}
