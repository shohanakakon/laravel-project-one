<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upazilla extends Model
{
    protected $fillable=['id','name','thana_id','status','slug'];

    use HasFactory;

    public function thana(){
        return $this->belongsTo(Thana::class,'thana_id');
    }
}
