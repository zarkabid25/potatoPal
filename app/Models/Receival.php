<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receival extends Model
{
    use HasFactory;

    protected $fillable = [
      'grower_name', 'grower_group', 'paddock_name', 'seed_variety', 'seed_generation', 'seed_class', 'tia_sample_id',
        'unloading_status', 'unloading_ID', 'seed_type', 'seed_bin_size', 'oversize_bin_size', 'transport_co', 'delivery_type', 'grower_docket_no',
        'chc_docket_no', 'fungicide', 'driver_name', 'comments', 'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
