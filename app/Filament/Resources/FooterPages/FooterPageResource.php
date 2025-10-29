<?php

namespace App\Filament\Resources\FooterPages;

use App\Filament\Resources\FooterPages\Pages\CreateFooterPage;
use App\Filament\Resources\FooterPages\Pages\EditFooterPage;
use App\Filament\Resources\FooterPages\Pages\ListFooterPages;
use App\Filament\Resources\FooterPages\Schemas\FooterPageForm;
use App\Filament\Resources\FooterPages\Tables\FooterPagesTable;
use App\Models\FooterPage;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Support\Icons\Heroicon;

class FooterPageResource extends Resource
{
    protected static ?string $model = FooterPage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;

    protected static string|\UnitEnum|null $navigationGroup = 'Content';

    protected static ?string $navigationLabel = 'Footer Pages';

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return FooterPageForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FooterPagesTable::configure($table);
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
            'index' => ListFooterPages::route('/'),
            'create' => CreateFooterPage::route('/create'),
            'edit' => EditFooterPage::route('/{record}/edit'),
        ];
    }
}

