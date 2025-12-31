<?php

namespace Database\Factories;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

class PostFactory extends Factory
{
    
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'id'=> Str::uuid()->toString(),
            'title'=>$this->faker->sentence,
            'body'=>$this->faker->paragraphs(3,true),
            'author'=>$this->faker->name,
            'published'=>$this->faker->boolean,
        ];
    }
}
