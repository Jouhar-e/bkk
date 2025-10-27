<?php

namespace App\Filament\Resources\Articles\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ArticlesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->numeric()
                    ->label('Author')
                    ->sortable(),
                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable(),
                ImageColumn::make('featured_image')
                    ->label('Gambar')
                    ->circular()
                    ->disk('public'),
                TextColumn::make('category')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'lowongan-kerja' => 'Lowongan Kerja',
                        'pengumuman' => 'Pengumuman',
                        'kegiatan' => 'Kegiatan',
                        'berita' => 'Berita',
                        default => $state,
                    })
                    ->colors([
                        'lowongan-kerja' => 'success',
                        'pengumuman' => 'primary',
                        'kegiatan' => 'warning',
                        'berita' => 'danger',
                    ]),
                IconColumn::make('is_published')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('updated_at','desc')
            ->filters([
                // 
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
