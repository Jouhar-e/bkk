<?php

namespace App\Filament\Pages;

use BackedEnum;
use Filament\Facades\Filament;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Concerns\InteractsWithForms;

class UserProfile extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::UserCircle;
    protected static ?string $navigationLabel = 'Profil User';
    protected static ?string $title = 'User Profile';
    protected string $view = 'filament.pages.user-profile';

    public ?array $data = [];

    public function mount(): void
    {
        $user = Auth::user();

        $this->form->fill([
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'role' => $user->role,
            'avatar' => $user->avatar,
            'is_active' => $user->is_active,
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            Section::make('Personal Information')
                ->schema([
                    TextInput::make('name')
                        ->label('Nama Lengkap')
                        ->required()
                        ->maxLength(255),

                    TextInput::make('email')
                        ->label('Email')
                        ->email()
                        ->required()
                        ->maxLength(255)
                        ->unique('users', 'email', ignoreRecord: true),
                ])
                ->columns(2),

            Section::make('Account Information')
                ->schema([
                    TextInput::make('password')
                        ->label('Password Baru')
                        ->password()
                        ->minLength(8)
                        ->revealable()
                        ->dehydrated(fn($state) => filled($state))
                        ->rules(['confirmed']),

                    TextInput::make('password_confirmation')
                        ->label('Konfirmasi Password Baru')
                        ->password()
                        ->minLength(8)
                        ->revealable()
                        ->dehydrated(false),

                    TextInput::make('phone')
                        ->label('Nomor Telepon')
                        ->tel()
                        ->maxLength(20)
                        ->nullable(),
                ])
                ->columns(2),

            Section::make('Additional Information')
                ->schema([
                    FileUpload::make('avatar')
                        ->label('Foto Profil')
                        ->image()
                        ->disk('public')
                        ->directory('uploads/articles')
                        ->avatar()
                        ->directory('avatars')
                        ->maxSize(2048)
                        ->nullable(),

                    Toggle::make('is_active')
                        ->label('Status Aktif')
                        ->default(true)
                        ->onColor('success')
                        ->offColor('danger')
                        ->disabled(),
                ])
                ->columns(2),
        ];
    }

    protected function getFormModel(): string
    {
        return Auth::user()::class;
    }

    public function save(): void
    {
        try {
            $data = $this->form->getState();
            $user = Auth::user();

            // Handle password update
            if (empty($data['password'])) {
                unset($data['password']);
            } else {
                $data['password'] = bcrypt($data['password']);
            }

            // Remove confirmation field
            unset($data['password_confirmation']);

            $user->update($data);

            $this->notify('success', 'Profile berhasil diperbarui!');
        } catch (\Exception $e) {
            $this->notify('danger', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
