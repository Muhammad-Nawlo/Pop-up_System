<?php

namespace Modules\PopupSystem\Database\factories;


use Illuminate\Database\Eloquent\Factories\Factory;

class CompaignFactory extends Factory
{
    protected $model = \Modules\PopupSystem\Entities\Compaign::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->domainName,
        ];
    }
}
