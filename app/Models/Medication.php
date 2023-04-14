<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Medication extends Model
{
    use HasFactory;

    protected $table = "medications";

    protected $fillable = [
        'name',
        'description',
        'patient_id',
    ];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function timeslots(): BelongsToMany
    {
        return $this->belongsToMany(Timeslot::class);
    }

    public function timeslotCount(): int
    {
        return $this->timeslots()->count();
    }
}
