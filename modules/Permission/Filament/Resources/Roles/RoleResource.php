<?php

namespace Modules\Permission\Filament\Resources\Roles;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Modules\Permission\Filament\Resources\Roles\Pages\CreateRole;
use Modules\Permission\Filament\Resources\Roles\Pages\EditRole;
use Modules\Permission\Filament\Resources\Roles\Pages\ListRoles;
use Modules\Permission\Filament\Resources\Roles\RelationManagers\PermissionsRelationManager;
use Modules\Permission\Filament\Resources\Roles\Schemas\RoleForm;
use Modules\Permission\Filament\Resources\Roles\Tables\RolesTable;
use Spatie\Permission\Models\Role;

class RoleResource extends Resource
{
    protected static ?string $model = Role::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedFingerPrint;
    protected static string|null|\UnitEnum $navigationGroup = 'Access control';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return RoleForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RolesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            PermissionsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRoles::route('/'),
            'create' => CreateRole::route('/create'),
            'edit' => EditRole::route('/{record}/edit'),
        ];
    }
}
