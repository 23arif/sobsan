<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'branch';
    protected $fillable = ['phone_number', 'map_link'];
    public $timestamps = false;

    public function getBranch()
    {
        return $this->hasMany('\App\BranchTranslate', 'branch_id','id');
    }
    
}
