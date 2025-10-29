<?php

namespace App\Filament\Resources\FooterPages\Pages;

use App\Filament\Resources\FooterPages\FooterPageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFooterPages extends ListRecords
{
    protected static string $resource = FooterPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

