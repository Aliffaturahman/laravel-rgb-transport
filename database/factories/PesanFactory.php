<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pesan>
 */
class PesanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private $subjekOptions = ['Pertanyaan', 'Kritik', 'Saran', 'Lainnya'];

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'subject' => $this->faker->randomElement($this->subjekOptions),
            'message' => $this->generateMessageBasedOnSubject(),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }

    private function generateMessageBasedOnSubject(): string
    {
        $subject = $this->faker->randomElement($this->subjekOptions);
        
        switch($subject) {
            case 'Pertanyaan':
                return $this->faker->paragraph()."\n\n".$this->faker->sentence()."?";
            case 'Kritik':
                return "Saya sangat kecewa dengan ".$this->faker->word()." karena ".$this->faker->paragraph();
            case 'Saran':
                return "Saya ingin menyarankan untuk ".$this->faker->sentence();
            case 'Lainnya':
                return $this->faker->paragraphs(2, true);
            default:
                return $this->faker->paragraph();
        }
    }
}
