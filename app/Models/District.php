<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class District extends Model
{
    use HasFactory;
    protected $fillable=['id','name','div_id','status','slug'];

    public function division(){
        return $this->belongsTo(Division::class,'div_id');


    }


}
