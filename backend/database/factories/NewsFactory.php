<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title_ar' => $this->faker->title,
            'title_en' => $this->faker->title,
            'description_ar' => $this->faker->text,
            'description_en' => $this->faker->text,
            'img'  => 'site/assets/images/blog-01.jpg',
            'admin_id' => Admin::factory(),
        ];
    }
}
