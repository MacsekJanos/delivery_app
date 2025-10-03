<?php

namespace Modules\Work\Filament\Resources\Works\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Enums\Width;
use Modules\Work\Filament\Resources\Works\WorkResource;

class ListWorks extends ListRecords
{
    protected static string $resource = WorkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
    public function getMaxContentWidth(): Width
    {
        return Width::MaxContent;
    }
}
