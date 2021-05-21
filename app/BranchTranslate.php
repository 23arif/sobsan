<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BranchTranslate extends Model
{
    protected  $table = 'branch_translate';
    protected  $fillable = ['branch_id','name','address','lang'];
    public $timestamps = false;

    
}
