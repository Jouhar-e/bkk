<?php

namespace App\Filament\Pages;

use BackedEnum;
use Filament\Forms;
use App\Models\Profile;
use Filament\Pages\Page;
use Filament\Actions\Action;
use Filament\Support\Icons\Heroicon;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;

class ManageProfile extends Page implements HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::BuildingOffice;
    protected static ?string $navigationLabel = 'Profil BKK';
    protected static ?string $title = 'Kelola Profil BKK';
    
    // Gunakan view default Filament
    protected string $view = 'filament.pages.manage-profile';

    public ?array $data = [];

    public function mount(): void
    {
        $profile = Profile::first();

        if (!$profile) {
            $profile = Profile::getProfileInstance();
        }

        // Ambil data profile
        $formData = $profile->toArray();

        // Tangani field "misi" agar selalu array untuk repeater
        $misiRaw = $profile->misi;

        if (is_string($misiRaw)) {
            $decodedMisi = json_decode($misiRaw, true);
        } elseif (is_array($misiRaw)) {
            $decodedMisi = $misiRaw;
        } else {
            $decodedMisi = [];
        }

        $formData['misi'] = [];
        foreach ($decodedMisi as $misiItem) {
            if (!empty(trim($misiItem))) {
                $formData['misi'][] = ['item' => trim($misiItem)];
            }
        }

        // Jika kosong, tambahkan satu item default
        if (empty($formData['misi'])) {
            $formData['misi'] = [['item' => '']];
        }

        $this->data = $formData;
        $this->form->fill($this->data);
    }

    protected function getFormSchema(): array
    {
        return [
            // INFORMASI DASAR
            Section::make('Informasi Dasar')
                ->description('Informasi dasar tentang sekolah dan BKK')
                ->schema([
                    TextInput::make('nama_sekolah')
                        ->label('Nama Sekolah')
                        ->required()
                        ->maxLength(255)
                        ->placeholder('Contoh: SMK Negeri 1 Bandung')
                        ->columnSpanFull(),

                    TextInput::make('nama_bkk')
                        ->label('Nama BKK')
                        ->required()
                        ->maxLength(255)
                        ->placeholder('Contoh: Bursa Kerja Khusus SMK Negeri 1 Bandung')
                        ->columnSpanFull(),

                    FileUpload::make('logo')
                        ->label('Logo Sekolah')
                        ->image()
                        ->directory('profiles/logo')
                        ->preserveFilenames()
                        ->maxSize(2048)
                        ->imageResizeMode('contain')
                        ->imageCropAspectRatio('1:1')
                        ->imageResizeTargetWidth('300')
                        ->imageResizeTargetHeight('300')
                        ->nullable()
                        ->helperText('Format: JPG, PNG, SVG. Maksimal 2MB. Rasio 1:1')
                        ->columnSpanFull(),
                ]),

            // TENTANG KAMI & SEJARAH
            Section::make('Tentang Kami & Sejarah')
                ->description('Deskripsi lengkap tentang BKK dan sejarah berdirinya')
                ->schema([
                    RichEditor::make('tentang')
                        ->label('Tentang BKK')
                        ->required()
                        ->toolbarButtons([
                            'bold', 'italic', 'underline', 'strike',
                            'bulletList', 'orderedList',
                            'link', 'blockquote',
                        ])
                        ->columnSpanFull()
                        ->helperText('Deskripsikan tentang BKK, tujuan, dan manfaatnya bagi siswa dan lulusan'),

                    RichEditor::make('sejarah')
                        ->label('Sejarah BKK')
                        ->toolbarButtons([
                            'bold', 'italic', 'underline',
                            'bulletList', 'orderedList',
                            'link', 'blockquote',
                        ])
                        ->nullable()
                        ->columnSpanFull()
                        ->helperText('Ceritakan sejarah berdirinya BKK, pencapaian, dan perkembangan'),
                ]),

            // VISI & MISI
            Section::make('Visi & Misi')
                ->description('Visi dan misi Bursa Kerja Khusus')
                ->schema([
                    Textarea::make('visi')
                        ->label('Visi BKK')
                        ->required()
                        ->rows(3)
                        ->placeholder('Tuliskan visi BKK yang jelas dan inspiratif...')
                        ->columnSpanFull()
                        ->helperText('Visi adalah gambaran masa depan yang ingin dicapai oleh BKK'),

                    Repeater::make('misi')
                        ->label('Misi BKK')
                        ->schema([
                            Textarea::make('item')
                                ->label('Misi')
                                ->required()
                                ->rows(2)
                                ->placeholder('Tuliskan misi BKK...')
                                ->maxLength(500),
                        ])
                        ->defaultItems(1)
                        ->minItems(1)
                        ->maxItems(10)
                        ->grid(1)
                        ->columnSpanFull()
                        ->helperText('Tambahkan misi-misi BKK. Minimal 1 misi, maksimal 10 misi')
                        ->reorderable()
                        ->cloneable()
                        ->collapsible(),
                ]),

            // KONTAK
            Section::make('Informasi Kontak')
                ->description('Informasi kontak dan alamat BKK')
                ->schema([
                    Textarea::make('alamat')
                        ->label('Alamat Lengkap')
                        ->required()
                        ->rows(3)
                        ->placeholder('Jl. Wastukencana No. 3, Babakan Ciamis, Kec. Sumur Bandung, Kota Bandung, Jawa Barat 40117')
                        ->columnSpanFull(),

                    TextInput::make('telepon')
                        ->label('Nomor Telepon')
                        ->required()
                        ->tel()
                        ->maxLength(20)
                        ->placeholder('Contoh: (022) 4203363'),

                    TextInput::make('email')
                        ->label('Alamat Email')
                        ->required()
                        ->email()
                        ->maxLength(255)
                        ->placeholder('Contoh: bkk@smkn1bandung.sch.id'),

                    TextInput::make('website')
                        ->label('Website')
                        ->url()
                        ->maxLength(255)
                        ->placeholder('Contoh: https://smkn1bandung.sch.id/bkk')
                        ->prefix('https://'),
                ])
                ->columns(2),

            // MEDIA SOSIAL
            Section::make('Media Sosial')
                ->description('Akun media sosial resmi BKK')
                ->schema([
                    TextInput::make('instagram')
                        ->label('Instagram')
                        ->prefix('@')
                        ->maxLength(255)
                        ->placeholder('bkk_smkn1bandung')
                        ->helperText('Username Instagram tanpa @'),

                    TextInput::make('facebook')
                        ->label('Facebook')
                        ->url()
                        ->maxLength(255)
                        ->placeholder('https://facebook.com/BKK-SMK-Negeri-1-Bandung')
                        ->helperText('URL lengkap halaman Facebook'),

                    TextInput::make('twitter')
                        ->label('Twitter')
                        ->prefix('@')
                        ->maxLength(255)
                        ->placeholder('bkk_smkn1bdg')
                        ->helperText('Username Twitter tanpa @'),

                    TextInput::make('tiktok')
                        ->label('TikTok')
                        ->prefix('@')
                        ->maxLength(255)
                        ->placeholder('bkk_smkn1bandung')
                        ->helperText('Username TikTok tanpa @'),
                ])
                ->columns(2),

            // INFORMASI LAINNYA
            Section::make('Informasi Lainnya')
                ->description('Informasi tambahan tentang BKK')
                ->schema([
                    TextInput::make('tahun_berdiri')
                        ->label('Tahun Berdiri')
                        ->required()
                        ->numeric()
                        ->minValue(1900)
                        ->maxValue(now()->year)
                        ->placeholder('2010')
                        ->helperText('Tahun berdirinya BKK'),

                    TextInput::make('hari_operasional')
                        ->label('Hari Operasional')
                        ->required()
                        ->maxLength(50)
                        ->placeholder('Senin - Jumat')
                        ->helperText('Hari kerja BKK'),

                    TextInput::make('jam_operasional')
                        ->label('Jam Operasional')
                        ->required()
                        ->maxLength(50)
                        ->placeholder('07:30 - 16:00 WIB')
                        ->helperText('Jam kerja BKK'),
                ])
                ->columns(3),

            // STRUKTUR ORGANISASI
            Section::make('Struktur Organisasi')
                ->description('Struktur organisasi dan kepengurusan BKK')
                ->schema([
                    FileUpload::make('foto_struktur_organisasi')
                        ->label('Foto Struktur Organisasi')
                        ->image()
                        ->directory('profiles/struktur-organisasi')
                        ->preserveFilenames()
                        ->maxSize(5120)
                        ->nullable()
                        ->columnSpanFull()
                        ->helperText('Upload foto struktur organisasi BKK. Format: JPG, PNG. Maksimal 5MB'),
                ]),
        ];
    }

    public function save(): void
    {
        try {
            $data = $this->form->getState();

            $profile = Profile::first() ?? new Profile();

            // Konversi misi ke array normal
            $misiArray = [];
            if (isset($data['misi']) && is_array($data['misi'])) {
                foreach ($data['misi'] as $item) {
                    if (!empty($item['item'])) {
                        $misiArray[] = trim($item['item']);
                    }
                }
            }
            $data['misi'] = $misiArray;

            // Simpan data
            $profile->fill($data);
            $profile->save();

            Notification::make()
                ->title('Berhasil!')
                ->body('Profil BKK berhasil diperbarui.')
                ->success()
                ->send();

        } catch (\Exception $e) {
            Notification::make()
                ->title('Gagal Menyimpan')
                ->body('Terjadi kesalahan: ' . $e->getMessage())
                ->danger()
                ->send();
        }
    }

    protected function getFormStatePath(): string
    {
        return 'data';
    }

    protected function getFormModel(): Profile
    {
        return Profile::first() ?? new Profile();
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Simpan Profil')
                ->submit('save')
                ->color('primary')
                ->size('lg'),
        ];
    }

    // === NAVIGATION METHODS ===
    public static function shouldRegisterNavigation(): bool
    {
        return true;
    }

    public static function getNavigationBadge(): ?string
    {
        $profile = Profile::first();
        return $profile ? '✓' : '!';
    }

    public static function getNavigationBadgeColor(): ?string
    {
        $profile = Profile::first();
        return $profile ? 'success' : 'warning';
    }
}