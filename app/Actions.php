<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actions extends Model
{
    protected $table = 'actions';
    protected $fillable = ['img', 'destroy'];
    public $timestamps = false;

    public function getActions()
    {
        return $this->hasMany('App\ActionTranslate', 'action_id', 'id');
    }
}
