<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Silitckas {dmitriy.silitckas@mediapark.com}
 * Date: 11.09.17
 * Time: 12:20
 */

use Faker\Generator as Faker;

$factory->define(App\News::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'publish_date' => $faker->dateTimeThisMonth($max = 'now', $timezone = date_default_timezone_get()),
        'preview_text' => $faker->text(),
        'detail_text' => $faker->text(500)
    ];
});