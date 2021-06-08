<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_ar' => $this->faker->title,
            'name_en' => $this->faker->title,
            'price' => $this->faker->randomFloat(10),
            'description_ar' => $this->faker->text,
            'description_en' => $this->faker->text,
            'category_id' => Category::factory(),
            'admin_id' => Admin::factory(),
            'img' => 'dashboard/assets/dist/img/photo1.png'
        ];
    }
}
