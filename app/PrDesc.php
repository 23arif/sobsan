<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrDesc extends Model
{
    protected $table='pr_translate';
    protected $fillable=['pr_id','title','description','lang','slug'];
    public $timestamps = false;

    public function getPrId()
    {
        return $this->hasOne('\App\Products', 'id', 'pr_id');
    }
}
