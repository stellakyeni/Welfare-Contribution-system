<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class membersModel extends Model
{

    use HasFactory;
    protected $table="members";
    protected $fillable=[
        'user_id',
        'first_name',
        'last_name',
        'gender',
        'id_number',
        'phone_number',
        'county',
        'ward',
        'location',

        'kin_name',
        'kin_number',
        'kin_id',
        'kin_relationship',

        'payment_number',
        'payment_name',
        'amount',
        'code',
   ];
   protected static function boot()
   {
       parent::boot();
   
       static::creating(function ($member) {
           // Ensure the user gets a unique registration number
           do {
               $registrationNumber = 'WN' . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
           } while (static::where('reg_number', $registrationNumber)->exists());
   
           $member->reg_number = $registrationNumber;
       });
   }
   
}
