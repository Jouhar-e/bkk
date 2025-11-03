<?php

namespace App\Filament\Pages;

use BackedEnum;
use Filament\Pages\Page;
use Filament\Facades\Filament;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Concerns\InteractsWithForms;

class UserProfile extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserCircle;
    protected static ?string $navigationLabel = 'Profile';
    protected static ?string $title = 'User Profile';
    protected string $view = 'filament.pages.user-profile';

    public ?array $data = [];

    public function mount(): void
    {
        $user = Auth::user();

        $formData = $user->toArray();
        $this->form->fill($formData);
    }

    protected function getFormSchema(): array
    {
        return [
            Section::make('Personal Information')
                ->schema([
                    TextInput::make('name') // Sesuai field 'name' di migration
                        ->label('Nama Lengkap')
                        ->required()
                        ->maxLength(255),

                    TextInput::make('email') // Sesuai field 'email' di migration
                        ->label('Email')
                        ->email()
                        ->required()
                        ->maxLength(255)
                        ->unique('users', 'email'), // Validasi unique
                ])
                ->columns(2),

            Section::make('Account Information')
                ->schema([
                    TextInput::make('password')
                        ->label('Password')
                        ->password()
                        ->required()
                        ->minLength(8)
                        ->revealable(), // Fitun show/hide password

                    Select::make('role') // Sesuai field 'role' di migration
                        ->label('Role')
                        ->options([
                            'admin' => 'Administrator',
                            'operator' => 'Operator',
                        ])
                        ->default('operator')
                        ->required(),

                    TextInput::make('phone') // Sesuai field 'phone' di migration
                        ->label('Nomor Telepon')
                        ->tel()
                        ->maxLength(20)
                        ->nullable(),
                ])
                ->columns(2),

            Section::make('Additional Information')
                ->schema([
                    FileUpload::make('avatar') // Sesuai field 'avatar' di migration
                        ->label('Foto Profil')
                        ->image()
                        ->avatar()
                        ->directory('avatars')
                        ->nullable(),

                    Toggle::make('is_active') // Sesuai field 'is_active' di migration
                        ->label('Status Aktif')
                        ->default(true)
                        ->onColor('success')
                        ->offColor('danger'),
                ])
                ->columns(2),
        ];
    }
}
