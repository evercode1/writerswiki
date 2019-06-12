
// Begin ContributorLink Factory

$factory->define(App\ContributorLink::class, function (Faker\Generator $faker) {
    return [

        'name' => $faker->unique()->word,
        'contributor_link_type_id' => $faker->numberBetween($min = 1, $max = 4),

    ];

});

// End ContributorLink Factory