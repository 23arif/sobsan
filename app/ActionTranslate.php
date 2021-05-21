<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActionTranslate extends Model
{
    protected $table = 'action_translate';
    protected $fillable = ['action_id', 'title','description','slug','lang'];
    public $timestamps = false;
}
