<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
{
    use HasFactory;
    protected $table = "patients";

    protected $fillable = [
        'first_name',
        'last_name',
        'birthday',
        'address',
        'user_id',
        'device_id',
        'last_fill',
        'should_seek',
        'should_refill',
        'last_sensor',
        'rotate',
    ];

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($patient) {
            $patient->medications()->delete();
            $patient->timeslots()->delete();
        });
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function medications(): HasMany
    {
        return $this->hasMany(Medication::class);
    }

    public function timeslots(): HasMany
    {
        return $this->hasMany(Timeslot::class);
    }
}
