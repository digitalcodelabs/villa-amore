<?php

namespace App\Filament\Resources\Galleries\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class GalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Gallery Details')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('subtitle')
                            ->maxLength(255),

                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                Section::make('Images')
                    ->schema([
                        Repeater::make('images')
                            ->relationship('images')
                            ->schema([
                                FileUpload::make('image')
                                    ->required()
                                    ->image()
                                    ->disk('public')
                                    ->directory('galleries')
                                    ->columnSpanFull(),

                                TextInput::make('alt_text')
                                    ->maxLength(255)
                                    ->helperText('Alternative text for the image')
                                    ->columnSpanFull(),

                                TextInput::make('order')
                                    ->numeric()
                                    ->default(0)
                                    ->required(),
                            ])
                            ->orderColumn('order')
                            ->reorderable()
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => $state['alt_text'] ?? 'Image')
                            ->columnSpanFull()
                            ->defaultItems(1)
                    ])
                    ->columnSpanFull(),
            ]);
    }
}

