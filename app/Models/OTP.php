<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OTP extends Model
{
    use HasFactory;

    protected $table = "o_t_p_s";

    protected $fillable = [
        'otp',
        'expiration',
        'user_id',
        'created_at',
        'updated_at'
    ];

    // static public function getFirst()

}
