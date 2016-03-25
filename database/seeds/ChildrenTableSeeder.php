<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ChildrenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('children')->delete();

        foreach(range(1,250) as $index) {

            $isMale = Faker::create();
            $isMale = ($isMale->numberbetween(0, 1) == 0);

            $fakeName = Faker::create();
            if ($isMale) {
                $fakeFirstName = $fakeName->firstName($gender = 'male');
            } else {
                $fakeFirstName = $fakeName->firstName($gender = 'female');
            }
            $fakeLastName = $fakeName->lastName;

            $fakeDate = Faker::create();
            $fakeDate = $fakeDate->date($format = 'Y-m-d', $max = 'now');

            $fakeEmail = Faker::create();
            $fakeEmail = $fakeEmail->email;

            DB::table('children')->insert([
                'id'        => $index,
                'firstname' => $fakeFirstName,
                'lastname' => $fakeLastName,
                'birthdate' => $fakeDate,
                'male' => $isMale,
                'email' => $fakeEmail,
            ]);
        }
        // $this->call(UsersTableSeeder::class);
    }
}
