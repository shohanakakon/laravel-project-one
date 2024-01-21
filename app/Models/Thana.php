<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thana extends Model
{
     protected $fillable=['id','name','dic_id','status','slug'];
    use HasFactory;

    public function district(){
        return $this->belongsTo(District::class,'dic_id');
    }
}
