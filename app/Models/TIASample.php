<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TIASample extends Model
{
    use HasFactory;

    protected $fillable=['receival_id'];

    protected $table='tia_sample';
}
