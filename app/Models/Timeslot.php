<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Timeslot extends Model
{
    use HasFactory;

    protected $table = "timeslots";

    protected $fillable = [
        'patient_id',
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

    public function medications(): BelongsToMany
    {
        return $this->belongsToMany(Medication::class);
    }
}
