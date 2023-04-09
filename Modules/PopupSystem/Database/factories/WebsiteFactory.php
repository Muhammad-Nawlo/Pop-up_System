<?php

namespace Modules\PopupSystem\Database\factories;


use Illuminate\Database\Eloquent\Factories\Factory;

class WebsiteFactory extends Factory
{
    protected $model = \Modules\PopupSystem\Entities\Website::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->domainName,
        ];
    }
}
