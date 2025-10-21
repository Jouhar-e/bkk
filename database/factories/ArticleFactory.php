<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         $title = $this->faker->sentence(6);
        
        return [
            'user_id' => 1,
            'title' => $title,
            'slug' => Str::slug($title) . '-' . Str::random(6),
            'content' => $this->faker->paragraphs(150, true),
            'featured_image' => $this->faker->optional(0.7)->imageUrl(800, 400, 'business', true),
            'category' => $this->faker->randomElement(['lowongan-kerja', 'pengumuman', 'kegiatan', 'berita']),
            'is_published' => $this->faker->boolean(80), // 80% chance true
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
