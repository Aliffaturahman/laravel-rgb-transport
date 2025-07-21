<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

use App\Models\Testimoni;

/**
 * @extends Factory<Testimoni>
 */
class TestimoniFactory extends Factory
{
    protected $model = Testimoni::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'telepon' => $this->faker->phoneNumber,
            'photo' => 'img/testimoni/' . collect(File::files(public_path('img/testimoni')))
                ->filter(fn($file) => in_array($file->getExtension(), ['jpg', 'jpeg', 'png']))
                ->random()
                ->getFilename(),
            'comment' => $this->faker->paragraph(),
            'rating' => $this->faker->numberBetween(3, 5),
            'is_active' => $this->faker->boolean(80),
        ];
    }
}
