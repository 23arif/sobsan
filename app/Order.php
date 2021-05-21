<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='orders';
    protected $fillable=['name','address','city','email','telefon','user_id','total_price','delivery_price','order_type','orders','order_no','destroy','created_at','updated_at'];

    public function getPrDetails()
    {
        return $this->hasMany('\App\PrDesc', 'pr_id', 'pr_id');
    }
}
