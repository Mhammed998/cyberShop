<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Order extends Model
{
    protected $fillable=["username","phone","address","status","user_id","Payment_Status","product","cost","amount"];


    public function user(){
        return $this->belongsTo(User::class);
    }


}
