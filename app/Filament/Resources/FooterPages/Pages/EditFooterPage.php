<?php

namespace App\Filament\Resources\FooterPages\Pages;

use App\Filament\Resources\FooterPages\FooterPageResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFooterPage extends EditRecord
{
    protected static string $resource = FooterPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

