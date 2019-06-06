
// Begin Subcategory Factory

$factory->define(App\Subcategory::class, function (Faker\Generator $faker) {
    return [

        'name' => $faker->unique()->word,
        'category_id' => $faker->numberBetween($min = 1, $max = 4),

    ];

});

// End Subcategory Factory