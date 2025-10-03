<?php

namespace Modules\Vehicle\Filament\Resources\Vehicles\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class VehicleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->schema([
                    TextInput::make('brand'),
                    TextInput::make('type'),
                    TextInput::make('plate_number'),
                    Select::make('user_id')
                        ->label('Carrier')
                        ->relationship(name: 'user', titleAttribute: 'name')
                        ->searchable()
                        ->preload(10),
                ])
            ]);
    }
}
