<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_sekolah',
        'nama_bkk',
        'logo',
        'tentang',
        'sejarah',
        'visi',
        'misi',
        'alamat',
        'telepon',
        'email',
        'website',
        'instagram',
        'facebook',
        'twitter',
        'tiktok',
        'tahun_berdiri',
        'hari_operasional',
        'jam_operasional',
        'foto_struktur_organisasi',
    ];

    protected $casts = [
        'misi' => 'array',
    ];

    // Accessor untuk URL media sosial
    public function getInstagramUrlAttribute()
    {
        if (!$this->instagram) return null;
        return str_starts_with($this->instagram, 'http') ? $this->instagram : 'https://instagram.com/' . ltrim($this->instagram, '@');
    }

    public function getFacebookUrlAttribute()
    {
        if (!$this->facebook) return null;
        return str_starts_with($this->facebook, 'http') ? $this->facebook : 'https://facebook.com/' . $this->facebook;
    }

    public function getTwitterUrlAttribute()
    {
        if (!$this->twitter) return null;
        return str_starts_with($this->twitter, 'http') ? $this->twitter : 'https://twitter.com/' . ltrim($this->twitter, '@');
    }

    public function getTiktokUrlAttribute()
    {
        if (!$this->tiktok) return null;
        return str_starts_with($this->tiktok, 'http') ? $this->tiktok : 'https://tiktok.com/@' . ltrim($this->tiktok, '@');
    }

    public function getWebsiteUrlAttribute()
    {
        if (!$this->website) return null;
        return str_starts_with($this->website, 'http') ? $this->website : 'https://' . $this->website;
    }

    // Method untuk mengecek apakah ada media sosial
    public function hasSocialMedia()
    {
        return !empty($this->instagram) || !empty($this->facebook) || 
               !empty($this->twitter) || !empty($this->tiktok);
    }

    // Method untuk mendapatkan daftar misi
    public function getMisiListAttribute()
    {
        if (empty($this->misi)) {
            return [];
        }
        return is_array($this->misi) ? $this->misi : json_decode($this->misi, true);
    }

    // Method untuk mendapatkan jam operasional yang diformat
    public function getJamOperasionalFormattedAttribute()
    {
        return $this->hari_operasional . ', ' . $this->jam_operasional;
    }

    // Method untuk mendapatkan tahun berdiri yang diformat
    public function getTahunBerdiriFormattedAttribute()
    {
        return 'Sejak ' . $this->tahun_berdiri;
    }

    // Method instance default
    public static function getProfileInstance()
    {
        return static::firstOrCreate([], [
            'nama_sekolah' => 'SMK Negeri 1 Bandung',
            'nama_bkk' => 'Bursa Kerja Khusus SMK Negeri 1 Bandung',
            'logo' => null,
            'tentang' => 'Bursa Kerja Khusus (BKK) SMK Negeri 1 Bandung merupakan lembaga yang dibentuk oleh sekolah untuk memfasilitasi penyaluran dan penempatan tenaga kerja lulusan SMK di dunia usaha dan dunia industri. BKK berperan sebagai unit kerja yang menjembatani antara lulusan SMK dengan perusahaan-perusahaan yang membutuhkan tenaga kerja terampil.',
            'sejarah' => 'BKK SMK Negeri 1 Bandung didirikan pada tahun 2010 dengan tujuan utama untuk meningkatkan daya serap lulusan SMK di dunia kerja. Sejak berdiri, BKK telah berhasil menyalurkan lebih dari 2.000 lulusan ke berbagai perusahaan ternama di Indonesia. Pada tahun 2015, BKK mendapatkan penghargaan sebagai BKK Terbaik se-Jawa Barat dari Dinas Pendidikan Provinsi Jawa Barat.',
            'visi' => 'Menjadi pusat penyaluran tenaga kerja terampil yang profesional, terpercaya, dan unggul dalam menyediakan lulusan SMK yang kompeten dan berdaya saing global.',
            'misi' => [
                'Meningkatkan kompetensi dan keterampilan lulusan SMK melalui pelatihan dan pembinaan berkelanjutan',
                'Membangun kemitraan strategis dengan dunia usaha dan dunia industri (DUDI)',
                'Menyediakan informasi lowongan kerja yang aktual dan terpercaya',
                'Memberikan layanan bimbingan karir dan penempatan kerja yang profesional',
                'Mengembangkan sistem monitoring dan evaluasi terhadap lulusan yang telah bekerja',
                'Memfasilitasi pengembangan kewirausahaan bagi lulusan SMK'
            ],
            'alamat' => 'Jl. Wastukencana No. 3, Babakan Ciamis, Kec. Sumur Bandung, Kota Bandung, Jawa Barat 40117',
            'telepon' => '(022) 4203363',
            'email' => 'bkk@smkn1bandung.sch.id',
            'website' => 'www.smkn1bandung.sch.id/bkk',
            'instagram' => 'bkk_smkn1bandung',
            'facebook' => 'BKK SMK Negeri 1 Bandung',
            'twitter' => 'bkk_smkn1bdg',
            'tiktok' => 'bkk_smkn1bandung',
            'tahun_berdiri' => 2010,
            'hari_operasional' => 'Senin - Jumat',
            'jam_operasional' => '07:30 - 16:00 WIB',
            'foto_struktur_organisasi' => null,
        ]);
    }
}