<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yanson extends Model
{
    protected  $table = 'yanson';
    protected  $fillable = ['nomre','email','adress','vaxt','fax','facebook','instagram','youtube'];
    public $timestamps = false;

}
