<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contributionModel extends Model
{
    use HasFactory;
    protected $table="contributions";
    protected $fillable=[
        'user_id',
        'month',
        'year',
        'p_number',
        'p_name',
        'p_amount',
        'p_code',
        'confirmation_status'
    ];
}
