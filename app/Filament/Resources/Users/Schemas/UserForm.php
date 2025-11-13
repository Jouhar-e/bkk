<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('password')
                    ->password(),
                Select::make('role')
                    ->options(['admin' => 'Admin', 'operator' => 'Operator'])
                    ->default('operator')
                    ->required(),
                FileUpload::make('avatar')
                    ->label('Foto Profil')
                    ->image()
                    ->disk('public')
                    ->directory('uploads/articles')
                    ->avatar()
                    ->directory('avatars')
                    ->maxSize(2048)
                    ->nullable(),
                TextInput::make('phone')
                    ->tel(),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
