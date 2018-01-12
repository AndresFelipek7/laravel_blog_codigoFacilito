<?php

use Faker\Generator as Faker;
use App\Category;

/*Model Fatory para Category*/
$factory->define(Category::class, function (Faker $faker) {

	return [
		'name' => $faker->name
	];
});
