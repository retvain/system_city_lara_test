<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\StoreProduct;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StoreProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StoreProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(rand(2,5), true);
        $text = $this->faker->realText(rand(200, 1000));
        $breed = ['Abyssinian Cat', 'British Shorthair Cat Breed', 'Bengal Cat', 'Balinese-Javanese Cat', 'Persian Cat'];
        $createdAt = $this->faker->dateTimeBetween('-1 months', '-2 days');

        return [
            'title' => $title,
            'breed' => $breed[rand(0,4)],
            'excerpt' => $this->faker->text(rand(20, 40)),
            'content_raw' => $text,
            'content_html' => $text,
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ];
    }
}
