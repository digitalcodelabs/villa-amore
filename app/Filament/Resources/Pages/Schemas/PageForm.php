<?php

namespace App\Filament\Resources\Pages\Schemas;

use App\Models\AboutSection;
use App\Models\Gallery;
use App\Models\Slider;
use App\Models\Testimonial;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
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
                            }),

                        TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->helperText('Auto-generated from title, but you can customize it.'),

                        RichEditor::make('content')
                            ->columnSpanFull()
                            ->extraInputAttributes([
                                'style' => 'min-height: 250px;',
                            ])

                    ])
                    ->columnSpanFull(),


                Section::make('Publishing')
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
                    ])
                    ->columns(2),

                Section::make('Navigation Settings')
                    ->schema([
                        Toggle::make('show_in_navigation')
                            ->label('Show in Navigation Menu')
                            ->default(true)
                            ->live()
                            ->columnSpanFull(),

                        TextInput::make('navigation_order')
                            ->label('Navigation Order')
                            ->numeric()
                            ->default(0)
                            ->helperText('Lower numbers appear first. Use 0 for automatic ordering.')
                            ->visible(fn (callable $get) => $get('show_in_navigation'))
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('Page Modules')
                    ->schema([
                        Repeater::make('modules')
                            ->relationship('modules')
                            ->schema([
                                Select::make('module_type')
                                    ->label('Module Type')
                                    ->required()
                                    ->options([
                                        Slider::class => 'Slider',
                                        AboutSection::class => 'About Section',
                                        Gallery::class => 'Gallery',
                                        Testimonial::class => 'Testimonials',
                                    ])
                                    ->live()
                                    ->afterStateUpdated(fn (callable $set) => $set('module_id', null)),

                                Select::make('module_id')
                                    ->label('Select Module')
                                    ->required()
                                    ->options(function (callable $get) {
                                        $type = $get('module_type');
                                        if (!$type) {
                                            return [];
                                        }
                                        return $type::query()->pluck('title', 'id');
                                    })
                                    ->searchable()
                                    ->preload(),

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
                            ->itemLabel(fn (array $state): ?string => 
                                isset($state['module_type']) ? 
                                class_basename($state['module_type']) : 
                                'Module'
                            )
                            ->columnSpanFull()
                            ->helperText('Add modules to display on this page (sliders, about sections, galleries)')
                    ])
                    ->columnSpanFull()
                    ->collapsed()
                    ->collapsible(),
            ]);
    }
}