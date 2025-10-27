<?php

namespace App\Filament\Resources\Sliders\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SliderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Slider Details')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),

                Section::make('Slides')
                    ->schema([
                        Repeater::make('slides')
                            ->relationship('slides')
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('subtitle')
                                    ->maxLength(255),

                                FileUpload::make('image')
                                    ->required()
                                    ->image()
                                    ->disk('public')
                                    ->directory('sliders')
                                    ->columnSpanFull(),

                                TextInput::make('button_text')
                                    ->maxLength(255),

                                TextInput::make('button_url')
                                    ->maxLength(255)
                                    ->helperText('Can be a path like /book or a full URL'),

                                TextInput::make('order')
                                    ->numeric()
                                    ->default(0)
                                    ->required(),

                                Toggle::make('is_active')
                                    ->label('Active')
                                    ->default(true),
                            ])
                            ->orderColumn('order')
                            ->reorderable()
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => $state['title'] ?? null)
                            ->columnSpanFull()
                            ->defaultItems(1)
                    ])
                    ->columnSpanFull(),
            ]);
    }
}

