<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Projects;

class Password extends Model
{
    use HasFactory;
    public function projects(){
        return $this->belongsTo(Projects::class,'password_id');
    }

    public function password()
    {
        return $this->belongsTo(Passowrd::class);
    }
}
