<?php

namespace Modules\PopupSystem\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PopupFactory extends Factory
{
    protected $model = \Modules\PopupSystem\Entities\Popup::class;

    public function definition(): array
    {
        return [
            'type' => $this->faker->numberBetween(0, 2),
            'name' => $this->faker->text(10),
            'content' => $this->faker->text(50),
        ];
    }
}
