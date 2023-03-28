<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Comic;

// Helpers
use Faker\Generator as Faker;

class ComicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i<10; $i++) {
            $newComic = new Comic;

            $newComic->name = $faker->word();
            $newComic->description = $faker->sentence(10);
            $newComic->image = 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.amazon.it%2FBatman-Detective-Comics-Scott-Snyder%2Fdp%2F1401294197&psig=AOvVaw3qIy3zK99cSby5anNedncT&ust=1680097050308000&source=images&cd=vfe&ved=0CBAQjRxqFwoTCKio17zf_v0CFQAAAAAdAAAAABAE';
            $newComic->price = $faker->randomFloat(2, 1, 999);
            $newComic->quantity = $faker->numberBetween(0, 1000);

            $newComic->save();
        }
    }
}