<?php

namespace Modules\Work\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Work\Database\Factories\WorkFactory;
use Modules\Work\Enums\Status;
use Modules\Work\Observers\WorkObserver;
use Modules\Work\Scopes\WorkVisibilityScope;

#[ObservedBy(WorkObserver::class)]
#[ScopedBy(WorkVisibilityScope::class)]
class Work extends Model
{
    use HasFactory;
    protected $fillable = [
        'starting_address',
        'customer_name',
        'customer_address',
        'customer_phone_number',
        'status',
        'is_assigned',
        'user_id',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected function casts(): array
    {
        return [
            'status' => Status::class,
        ];
    }

    public function getRecordTitle(): string
    {
        return $this->customer_name .' | '. $this->starting_address .' -> ' . $this->customer_address;
    }

    public function getCarrierNameAttribute(): string
    {
        return $this->user->name ?? 'Not Assigned';
    }
    protected static function newFactory(): Factory
    {
        return WorkFactory::new();
    }

}
