<?php

use Illuminate\Database\Seeder;

use Faker\Factory;

class ResourceTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Factory::create();

      for ($i=1; $i < 20; $i++) {
        DB::table('resource_tag')->insert([
          'resource_id' => $i,
          'tag_id' => $faker->numberBetween($min = 1, $max = 6),
        ]);
        DB::table('resource_tag')->insert([
          'resource_id' => $i,
          'tag_id' => $faker->numberBetween($min = 7, $max = 13),
        ]);
        DB::table('resource_tag')->insert([
          'resource_id' => $i,
          'tag_id' => $faker->numberBetween($min = 14, $max = 20),
        ]);
      }
    }
}
