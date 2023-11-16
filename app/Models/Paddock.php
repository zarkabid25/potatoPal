<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paddock extends Model
{
    use HasFactory;

    protected $fillable = ['paddock_name', 'no_of_hectares', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
