<?php

namespace Modules\Vehicle\Filament\Resources\Vehicles;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Modules\Vehicle\Filament\Resources\Vehicles\Pages\CreateVehicle;
use Modules\Vehicle\Filament\Resources\Vehicles\Pages\EditVehicle;
use Modules\Vehicle\Filament\Resources\Vehicles\Pages\ListVehicles;
use Modules\Vehicle\Filament\Resources\Vehicles\Schemas\VehicleForm;
use Modules\Vehicle\Filament\Resources\Vehicles\Tables\VehiclesTable;
use Modules\Vehicle\Models\Vehicle;

class VehicleResource extends Resource
{
    protected static ?string $model = Vehicle::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedTruck;
    protected static string|null|\UnitEnum $navigationGroup = 'Work control';

    public static function form(Schema $schema): Schema
    {
        return VehicleForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VehiclesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListVehicles::route('/'),
            'create' => CreateVehicle::route('/create'),
            'edit' => EditVehicle::route('/{record}/edit'),
        ];
    }
}
