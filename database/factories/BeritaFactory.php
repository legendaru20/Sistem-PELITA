<?php
// database/factories/BeritaFactory.php
use App\Models\Berita;
use Illuminate\Database\Eloquent\Factories\Factory;

class BeritaFactory extends Factory
{
    protected $model = Berita::class;

    public function definition()
    {
        return [
            'judul' => $this->faker->sentence,
            'alamat' => $this->faker->address,
            'author' => $this->faker->name,
            'thumbnail' => 'beritas/default.jpg',
            'konten' => $this->faker->paragraphs(3, true),
            'pengaduan_id' => null,
        ];
    }
}