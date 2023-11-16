<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grower extends Model
{
    use HasFactory;

    protected $fillable = ['grower_group', 'grower_name', 'grower_tags', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function paddock()
    {
        return $this->hasManyThrough(Paddock::class, User::class);
    }
}
