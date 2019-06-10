
// Begin Profile Factory

$factory->define(App\Profile::class, function (Faker\Generator $faker) {

       $uniqueWord = $faker->unique()->word;
       $slug = str_slug($uniqueWord, "-");

    return [

        'name' => $uniqueWord,
        'user_id' => $faker->numberBetween($min = 1, $max = 4),
        'slug' => $slug,

    ];

});

// End Profile Factory