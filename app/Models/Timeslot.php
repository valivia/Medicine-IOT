<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Timeslot extends Model
{
    use HasFactory;

    protected $table = "timeslots";

    protected $fillable = [
        'patient_id',
        'medication_id',
        'hour',
        'minute',
        'day',
        'failed',
        'received',
    ];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function medication(): BelongsTo
    {
        return $this->belongsTo(Medication::class);
    }
}
