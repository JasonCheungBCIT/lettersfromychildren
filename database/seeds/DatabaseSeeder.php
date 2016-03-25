<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ChildrenTableSeeder::class);
        $this->call(ParentsTableSeeder::class);
        $this->call(FamiliesTableSeeder::class);
        $this->call(LettersTableSeeder::class);
    }
}
