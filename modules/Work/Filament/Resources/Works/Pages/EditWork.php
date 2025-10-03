<?php

namespace Modules\Work\Filament\Resources\Works\Pages;

use Filament\Actions\DeleteAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\EditRecord;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Modules\Work\Enums\Status;
use Modules\Work\Filament\Resources\Works\Schemas\WorkForm;
use Modules\Work\Filament\Resources\Works\WorkResource;

class EditWork extends EditRecord
{
    protected static string $resource = WorkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
//    public function form(Schema $schema): Schema
//    {
//        $isCarrier = auth()->user()?->hasRole('carrier');
//        return $schema
//            ->components([
//                Section::make()->schema([
//                    Select::make('user_id')
//                        ->hidden($isCarrier)
//                        ->relationship(name: 'user', titleAttribute: 'email')
//                        ->searchable(10)
//                        ->preload(10),
//                    TextInput::make('customer_name')->disabled($isCarrier),
//                    TextInput::make('customer_phone_number')->disabled($isCarrier),
//                    TextInput::make('starting_address')->disabled($isCarrier),
//                    TextInput::make('customer_address')->disabled($isCarrier),
//                    Select::make('status')
//                        ->options(function () use ($isCarrier) {
//                            return $isCarrier
//                                ? Status::optionsForCarrier()
//                                : Status::class;
//                        })
//                        ->default(Status::UnAssigned)
//                ])
//            ]);
//    }
}
