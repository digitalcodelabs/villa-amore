<?php

namespace App\Filament\Resources\FooterPages\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class FooterPageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Page Content')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function ($state, callable $set) {
                                if (!empty($state)) {
                                    $set('slug', Str::slug($state));
                                }
                            })
                            ->helperText('Examples: Privacy Policy, Terms of Service, Cookie Policy, Legal Notice'),

                        TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->helperText('Auto-generated from title, but you can customize it.'),

                        RichEditor::make('content')
                            ->columnSpanFull()
                            ->extraInputAttributes([
                                'style' => 'min-height: 400px;',
                            ])
                            ->helperText('The full content of your static page.'),
                    ])
                    ->columnSpanFull(),

                Section::make('SEO Settings')
                    ->schema([
                        TextInput::make('meta_title')
                            ->maxLength(255)
                            ->helperText('Leave blank to use the page title.'),

                        Textarea::make('meta_description')
                            ->rows(3)
                            ->maxLength(160)
                            ->helperText('Recommended: 150-160 characters.'),

                        TextInput::make('meta_keywords')
                            ->maxLength(255)
                            ->helperText('Comma-separated keywords.'),
                    ])
                    ->columnSpanFull()
                    ->collapsed()
                    ->collapsible(),

                Section::make('Publishing Settings')
                    ->schema([
                        Toggle::make('is_published')
                            ->label('Published')
                            ->default(false)
                            ->live()
                            ->columnSpanFull(),

                        DateTimePicker::make('published_at')
                            ->label('Publish Date')
                            ->default(now())
                            ->visible(fn (callable $get) => $get('is_published'))
                            ->helperText('Leave default to publish immediately.')
                            ->columnSpanFull(),

                        TextInput::make('footer_order')
                            ->label('Display Order')
                            ->numeric()
                            ->default(0)
                            ->helperText('Lower numbers appear first. Use 0 for automatic ordering.')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}

