<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class FamiliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('families')->delete();

        $id = 1;
        foreach(range(1,250) as $index) {
            $parentId = Faker::create();
            $parentId = $parentId->numberBetween(1, 100);

            DB::table('families')->insert([
                'id'        => $id,
                'childid'   => $index,         // each child
                'parentid'  => $parentId,    // gets a random parent
            ]);

            $id++;  // isn't this the same as index?
        }
    }
}
