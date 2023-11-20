<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PushTIASample extends Model
{
    use HasFactory;

    protected $fillable = ['receival_id'];

    protected $table = 'push_tia_sample';

    public function TIASample(){
        return $this->belongsTo(TIASample::class);
    }
}
