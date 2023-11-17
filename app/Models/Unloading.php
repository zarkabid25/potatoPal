<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unloading extends Model
{
    use HasFactory;

    protected $fillable = ['receival_id', 'seed_bin_weight', 'weight_bins', 'weighed_weight', 'no_oversize_bins'];

    public function receival(){
        return $this->belongsTo(Receival::class, 'receival_id', 'id');
    }
}
