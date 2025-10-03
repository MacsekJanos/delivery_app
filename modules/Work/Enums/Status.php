<?php

namespace Modules\Work\Enums;


use Filament\Support\Contracts\HasLabel;
use function Laravel\Prompts\select;

enum Status: string implements HasLabel
{
    case UnAssigned = 'un_assigned';
    case Assigned    = 'assigned';
    case InProgress  = 'in_progress';
    case Completed   = 'completed';
    case Unsuccessful= 'unsuccessful';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::UnAssigned => 'Unassigned',
            self::Assigned     => 'Assigned',
            self::InProgress   => 'In progress',
            self::Completed    => 'Completed',
            self::Unsuccessful => 'Unsuccessful',
        };
    }
    public static function optionsForCarrier(): array
    {
        return collect(self::cases())
            ->reject(fn (self $case) => $case === self::UnAssigned)
            ->mapWithKeys(fn (self $case) => [$case->value => $case->getLabel()])
            ->toArray();
    }
}
