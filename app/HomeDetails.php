<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeDetails extends Model
{
    protected  $table = 'home';
    protected  $fillable = ['address','video_text','copyrights','footer_text','main_video','main_video_code'];
    public $timestamps = false;
}
