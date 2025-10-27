<?php

namespace App\Filament\Resources\AboutSections\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AboutSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('About Section Details')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        RichEditor::make('content')
                            ->required()
                            ->columnSpanFull()
                            ->extraInputAttributes([
                                'style' => 'min-height: 250px;',
                            ]),

                        TextInput::make('button_text')
                            ->maxLength(255)
                            ->helperText('Optional button text'),

                        TextInput::make('button_url')
                            ->maxLength(255)
                            ->helperText('Can be a path like /about or a full URL'),

                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}

