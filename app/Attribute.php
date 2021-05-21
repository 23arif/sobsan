<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $table = 'attributes';
    protected $fillable = ['attribute_id', 'attribute_n_az', 'attribute_n_en','attribute_n_ru','destroy'];
    public $timestamps = false;

    public function getAttrGroup()
    {
        return $this->hasMany('\App\AttributeGroup', 'id', 'attribute_id');
    }
}
