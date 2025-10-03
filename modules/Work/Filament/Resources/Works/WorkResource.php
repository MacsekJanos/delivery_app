<?php

namespace Modules\Work\Filament\Resources\Works;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Modules\Work\Filament\Resources\Works\Pages\CreateWork;
use Modules\Work\Filament\Resources\Works\Pages\EditWork;
use Modules\Work\Filament\Resources\Works\Pages\ListWorks;
use Modules\Work\Filament\Resources\Works\Schemas\WorkForm;
use Modules\Work\Filament\Resources\Works\Tables\WorksTable;
use Modules\Work\Models\Work;

class WorkResource extends Resource
{
    protected static ?string $model = Work::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedHandRaised;

    protected static string|null|\UnitEnum $navigationGroup = 'Work control';

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return WorkForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WorksTable::configure($table);
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
            'index' => ListWorks::route('/'),
            'create' => CreateWork::route('/create'),
            //'edit' => EditWork::route('/{record}/edit'),
        ];
    }
}
