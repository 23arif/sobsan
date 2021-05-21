<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeGroup extends Model
{
    protected $table = 'attribute_group';
    protected $fillable = ['cat_id', 'group_n_az', 'group_n_en','group_n_ru','destroy','tindex'];
    public $timestamps = false;

    public function getAttrCat()
    {
        return $this->hasOne('\App\Category', 'id', 'cat_id');
    }
    public function getAttrs(){
        return $this->hasMany('\App\Attribute', 'attribute_id', 'id');
    }
}
