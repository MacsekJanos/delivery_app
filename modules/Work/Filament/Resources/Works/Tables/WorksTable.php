<?php

namespace Modules\Work\Filament\Resources\Works\Tables;

use App\Models\User;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Work\Enums\Status;
use Modules\Work\Models\Work;

class WorksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('carrier_name')
                ->label('Carrier')
                    ->searchable(fn (Builder $query, string $search) =>
                        $query->whereHas('user', fn (Builder $q) =>
                        $q->where('name', 'like', "%{$search}%")
                        )
                    ),
                TextColumn::make('customer_name'),
                TextColumn::make('customer_phone_number'),
                TextColumn::make('starting_address'),
                TextColumn::make('customer_address'),
                TextColumn::make('status')
            ])
            ->groups([
                Group::make('user.name')
                    ->label('Carrier')
                    ->getKeyFromRecordUsing(fn (Work $record): string => (string) $record->user?->id ?? 0)
                    ->getTitleFromRecordUsing(fn (Work $record): string => $record->user?->name ?? 'Unassigned')
            ])
            ->filters([
                SelectFilter::make('status')
                ->options(Status::class)
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
