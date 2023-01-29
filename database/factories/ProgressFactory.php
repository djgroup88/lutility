<?php

namespace Rakhasa\LaravelUtility\Database\Factories;

use Illuminate\Support\Str;
use Rakhasa\LaravelUtility\Models\Progress;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgressFactory extends Factory
{
    protected $model = Progress::class;

    public function definition()
    {
        return [
            'progressable_id' => Str::uuid(),
            'progressable_type' => '',
            'description' => $this->faker->text('50'),
            'actor_type' => '',
            'actor_id' => Str::uuid(),
            'completed_at' => [now(), null][rand(0, 1)]
        ];
    }
}
