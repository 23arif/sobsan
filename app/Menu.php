<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected  $table = 'menu';
    protected  $fillable = ['parent'];
    public $timestamps = false;

    public function getMenu()
    {
        return $this->hasMany('\App\MenuTranslate', 'menu_id','id');
    }
}
