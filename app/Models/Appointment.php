<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient_id', 
        'appointment_date', 
        'start_time',
         'end_time',
         'status',
         'reason',
         'cancel_reason',
        ];

        public function doctor(){
            return $this->belongsTo(User::class,'doctor_id');
        }

        public function patient(){
            return $this->belongsTo(User::class,'patient_id');
        }
}
