<?php

namespace Modules\Work\Filament\Resources\Works\Schemas;

use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Modules\Work\Enums\Status;

class WorkForm
{
    public static function configure(Schema $schema): Schema
    {
        $isCarrier = auth()->user()?->hasRole('carrier');
        return $schema
            ->components([
                Section::make()->schema([
                    Select::make('user_id')
                        ->hidden($isCarrier)
                        ->relationship(name: 'user', titleAttribute: 'name')
                        ->searchable(10)
                        ->preload(10),
                    TextInput::make('customer_name')->disabled($isCarrier),
                    TextInput::make('customer_phone_number')->disabled($isCarrier),
                    TextInput::make('starting_address')->disabled($isCarrier),
                    TextInput::make('customer_address')->disabled($isCarrier),
                    Select::make('status')
                        ->options(function () use ($isCarrier) {
                            return $isCarrier
                                ? Status::optionsForCarrier()
                                : Status::class;
                        })
                        ->default(Status::UnAssigned)
                ])
            ]);
    }
}
