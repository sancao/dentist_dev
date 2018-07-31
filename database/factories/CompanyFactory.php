<?php

use App\Models\Company;
use App\User;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    $users = User::pluck('id')->All();
    return [
        'name' => $faker->name,
        'user_id' => $faker->randomElement($users),
        'address' => $faker->address,
        'website' => $faker->unique()->url,
        'email' => $faker->unique()->email,
        'icon' => $faker->unique()->imageUrl(640,480),
        'phone' => $faker->unique()->phoneNumber,
    ];
});
