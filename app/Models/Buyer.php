<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    use HasFactory;

    protected $fillable = ['buyer_group', 'buyer_tags', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
