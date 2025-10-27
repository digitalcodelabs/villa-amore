<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Testimonial Section Details')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->default('What Our Guests Say'),

                        TextInput::make('subtitle')
                            ->maxLength(255)
                            ->helperText('Optional subtitle'),

                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                Section::make('Testimonials')
                    ->schema([
                        Repeater::make('items')
                            ->relationship('items')
                            ->schema([
                                Textarea::make('content')
                                    ->required()
                                    ->rows(4)
                                    ->columnSpanFull()
                                    ->helperText('The testimonial text'),

                                TextInput::make('author_name')
                                    ->required()
                                    ->maxLength(255)
                                    ->helperText('Full name of the guest'),

                                TextInput::make('author_location')
                                    ->maxLength(255)
                                    ->helperText('e.g., New York, USA'),

                                Select::make('rating')
                                    ->required()
                                    ->options([
                                        1 => '★ (1 star)',
                                        2 => '★★ (2 stars)',
                                        3 => '★★★ (3 stars)',
                                        4 => '★★★★ (4 stars)',
                                        5 => '★★★★★ (5 stars)',
                                    ])
                                    ->default(5),

                                TextInput::make('order')
                                    ->numeric()
                                    ->default(0)
                                    ->required()
                                    ->label('Display Order'),

                                Toggle::make('is_active')
                                    ->label('Active')
                                    ->default(true),
                            ])
                            ->orderColumn('order')
                            ->reorderable()
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => $state['author_name'] ?? 'Testimonial')
                            ->columnSpanFull()
                            ->defaultItems(1)
                    ])
                    ->columnSpanFull(),
            ]);
    }
}

