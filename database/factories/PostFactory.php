<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
  /**
  * The name of the factory's corresponding model.
  *
  * @var string
  */
  protected $model = Post::class;

  /**
  * Define the model's default state.
  *
  * @return array
  */
  public function definition()
  {
    $userIds = User::pluck('id')->toArray();
    $categoryIds = Category::pluck('id')->toArray();
    return [
      'user_id' =>$userIds[array_rand($userIds)],
      'category_id' =>$categoryIds[array_rand($categoryIds)],
      'title' =>$this->faker->sentence(5),
      'slug' => $this->faker->slug(),
      'content' =>$this->faker->text($maxNbChars = 500),
      'thumnail' =>$this->faker->imageUrl(),
      'status' =>$this->faker->randomElement(['draft','published']),
    ];
  }
}
