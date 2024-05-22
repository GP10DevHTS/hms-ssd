<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabTest extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient_id',
        'name',
        'result',
    ];
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
}
