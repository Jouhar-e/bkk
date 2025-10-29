<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        // Informasi Dasar
        'nama_sekolah',
        'nama_bkk',
        'logo',
        
        // Tentang Kami & Sejarah
        'tentang',
        'sejarah',
        
        // Visi & Misi
        'visi',
        'misi',
        
        // Kontak
        'alamat',
        'telepon',
        'email',
        'website',
        
        // Media Sosial
        'instagram',
        'facebook',
        'twitter',
        'tiktok',
        
        // Informasi
        'tahun_berdiri',
        
        // Jam Operasional
        'hari_operasional',
        'jam_operasional',
        
        // Struktur Organisasi
        'foto_struktur_organisasi',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'misi' => 'array',
    ];

    /**
     * Get the first profile data (since typically there's only one profile)
     */
    public static function getProfil()
    {
        return static::first() ?? new static();
    }

    /**
     * Accessor for Instagram URL
     */
    public function getInstagramUrlAttribute()
    {
        if (!$this->instagram) return null;
        
        if (str_starts_with($this->instagram, 'http')) {
            return $this->instagram;
        }
        
        return 'https://instagram.com/' . ltrim($this->instagram, '@');
    }

    /**
     * Accessor for Facebook URL
     */
    public function getFacebookUrlAttribute()
    {
        if (!$this->facebook) return null;
        
        if (str_starts_with($this->facebook, 'http')) {
            return $this->facebook;
        }
        
        return 'https://facebook.com/' . $this->facebook;
    }

    /**
     * Accessor for Twitter URL
     */
    public function getTwitterUrlAttribute()
    {
        if (!$this->twitter) return null;
        
        if (str_starts_with($this->twitter, 'http')) {
            return $this->twitter;
        }
        
        return 'https://twitter.com/' . ltrim($this->twitter, '@');
    }

    /**
     * Accessor for TikTok URL
     */
    public function getTiktokUrlAttribute()
    {
        if (!$this->tiktok) return null;
        
        if (str_starts_with($this->tiktok, 'http')) {
            return $this->tiktok;
        }
        
        return 'https://tiktok.com/@' . ltrim($this->tiktok, '@');
    }

    /**
     * Accessor for website URL
     */
    public function getWebsiteUrlAttribute()
    {
        if (!$this->website) return null;
        
        if (str_starts_with($this->website, 'http')) {
            return $this->website;
        }
        
        return 'https://' . $this->website;
    }

    /**
     * Check if social media exists
     */
    public function hasSocialMedia()
    {
        return !empty($this->instagram) || !empty($this->facebook) || 
               !empty($this->twitter) || !empty($this->tiktok);
    }

    /**
     * Get all social media that are not empty
     */
    public function getActiveSocialMediaAttribute()
    {
        $socialMedia = [];

        if ($this->instagram) {
            $socialMedia['instagram'] = [
                'username' => $this->instagram,
                'url' => $this->instagram_url
            ];
        }

        if ($this->facebook) {
            $socialMedia['facebook'] = [
                'username' => $this->facebook,
                'url' => $this->facebook_url
            ];
        }

        if ($this->twitter) {
            $socialMedia['twitter'] = [
                'username' => $this->twitter,
                'url' => $this->twitter_url
            ];
        }

        if ($this->tiktok) {
            $socialMedia['tiktok'] = [
                'username' => $this->tiktok,
                'url' => $this->tiktok_url
            ];
        }

        return $socialMedia;
    }

    /**
     * Get misi as array with proper formatting
     */
    public function getMisiListAttribute()
    {
        if (empty($this->misi)) {
            return [];
        }

        return is_array($this->misi) ? $this->misi : json_decode($this->misi, true);
    }

    /**
     * Get operational hours formatted
     */
    public function getJamOperasionalFormattedAttribute()
    {
        return $this->hari_operasional . ', ' . $this->jam_operasional;
    }

    /**
     * Get tahun berdiri formatted
     */
    public function getTahunBerdiriFormattedAttribute()
    {
        return 'Sejak ' . $this->tahun_berdiri;
    }
}