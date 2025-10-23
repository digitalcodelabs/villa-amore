<?php

namespace App\Filament\Resources\Pages\Tables;

use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class PagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                TextColumn::make('slug')
                    ->searchable()
                    ->sortable()
                    ->limit(50)
                    ->toggleable()
                    ->copyable()
                    ->copyMessage('Slug copied!')
                    ->icon('heroicon-o-link'),

                IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean()
                    ->sortable()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),

                TextColumn::make('published_at')
                    ->label('Publish Date')
                    ->dateTime('M j, Y g:i A')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->dateTime('M j, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->dateTime('M j, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TernaryFilter::make('is_published')
                    ->label('Published Status')
                    ->placeholder('All pages')
                    ->trueLabel('Published only')
                    ->falseLabel('Drafts only')
                    ->native(false),

                Filter::make('published_date')
                    ->label('Published Date Range')
                    ->form([
                        \Filament\Forms\Components\DatePicker::make('published_from')
                            ->label('From'),
                        \Filament\Forms\Components\DatePicker::make('published_until')
                            ->label('Until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['published_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('published_at', '>=', $date),
                            )
                            ->when(
                                $data['published_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('published_at', '<=', $date),
                            );
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];
                        
                        if ($data['published_from'] ?? null) {
                            $indicators[] = 'Published from ' . \Carbon\Carbon::parse($data['published_from'])->toFormattedDateString();
                        }
                        
                        if ($data['published_until'] ?? null) {
                            $indicators[] = 'Published until ' . \Carbon\Carbon::parse($data['published_until'])->toFormattedDateString();
                        }
                        
                        return $indicators;
                    }),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    
                    BulkAction::make('publish')
                        ->label('Publish Selected')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->requiresConfirmation()
                        ->action(fn ($records) => $records->each->update([
                            'is_published' => true,
                            'published_at' => now(),
                        ]))
                        ->deselectRecordsAfterCompletion(),
                    
                    BulkAction::make('unpublish')
                        ->label('Unpublish Selected')
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->action(fn ($records) => $records->each->update([
                            'is_published' => false,
                        ]))
                        ->deselectRecordsAfterCompletion(),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->emptyStateHeading('No pages yet')
            ->emptyStateDescription('Create your first page to get started.')
            ->emptyStateIcon('heroicon-o-document-text');
    }
}