<?php

namespace Modules\User\Filament\Resources\Users\RelationManagers;

use Filament\Actions\AssociateAction;
use Filament\Actions\AttachAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DetachAction;
use Filament\Actions\DetachBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Modules\Work\Enums\Status;
use Modules\Work\Filament\Resources\Works\WorkResource;
use Modules\Work\Models\Work;

class WorksRelationManager extends RelationManager
{
    protected static string $relationship = 'works';
    protected static ?string $inverseRelationship = 'user';

    public function form(Schema $schema): Schema
    {
        return WorkResource::form($schema);
    }

    public function table(Table $table): Table
    {
        return WorkResource::table($table)
            ->recordTitle(fn(Model $model) => $model->getRecordTitle())
            ->filters([
                //
            ])
            ->headerActions([
                AssociateAction::make()
                    ->preloadRecordSelect()
                    ->multiple()
                    ->after(function (Work $record) {
                        $record->status = Status::Assigned;
                        $record->save();
                    }),
            ])
            ->recordActions([
                EditAction::make(),
                DissociateAction::make(),
                DeleteAction::make(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options(Status::class)
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DissociateBulkAction::make(),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
