<?php

namespace App\Filament\Resources\Articles\Schemas;

use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Section untuk informasi dasar
                Section::make('Informasi Artikel')
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul Artikel')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function ($state, $set) {
                                $set('slug', Str::slug($state));
                            }),

                        TextInput::make('slug')
                            ->label('Slug (URL)')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->helperText('Otomatis terisi dari judul'),
                    ])
                    ->columns(1),

                // Section untuk konten
                Section::make('Konten Artikel')
                    ->schema([
                        RichEditor::make('content')
                            ->label('Konten')
                            ->required()
                            ->fileAttachmentsDirectory('articles')
                            ->fileAttachmentsVisibility('public')
                            ->columnSpanFull(),
                    ]),

                // Section untuk metadata
                Section::make('Metadata')
                    ->schema([
                        Select::make('category')
                            ->label('Kategori')
                            ->required()
                            ->options([
                                'lowongan-kerja' => 'Lowongan Kerja',
                                'pengumuman' => 'Pengumuman',
                                'kegiatan' => 'Kegiatan',
                                'berita' => 'Berita',
                            ])
                            ->default('berita')
                            ->native(false),

                        Toggle::make('is_published')
                            ->label('Publikasi')
                            ->default(false)
                            ->onColor('success')
                            ->offColor('danger')
                            ->inline(false)
                            ->helperText('Publikasikan artikel agar bisa dilihat pengunjung'),
                    ])
                    ->columns(2),

                // Section untuk gambar
                Section::make('Gambar Utama')
                    ->schema([
                        FileUpload::make('featured_image')
                            ->label('Gambar Featured')
                            ->acceptedFileTypes([
                                'image/jpeg',
                                'image/jpg',
                                'image/png',
                                'image/gif',
                                'image/webp',
                            ])
                            ->disk('public')
                            ->directory('uploads/articles')
                            ->visibility('public')
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '16:9',
                                '4:3',
                                '1:1',
                            ])
                            ->helperText('Ukuran disarankan: 1200x630 pixels'),
                    ]),
            ])->columns(1);
    }
}
