<?php

namespace Modules\Vehicle\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Vehicle\Database\Factories\VehicleFactory;

class Vehicle extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand',
        'type',
        'plate_number',
        'user_id',
        ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public static function newFactory() : Factory
    {
        return VehicleFactory::new();
    }
}
