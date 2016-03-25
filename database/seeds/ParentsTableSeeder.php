<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ParentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parents')->delete();

        foreach(range(1,100) as $index) {

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

            DB::table('parents')->insert([
                'id'        => $index,
                'spouseid'  => null,
                'firstname' => $fakeFirstName,
                'lastname'  => $fakeLastName,
                'birthdate' => $fakeDate,
                'male'      => $isMale,
                'email'     => $fakeEmail,
            ]);
        }

        // Go through each parent, delete the ones without children
        foreach(range(1,100) as $index) {
            $result = (DB::table('families')->where('parentid', '=', $index)->first());

            if (!$result) {
                DB::table('parents')->where('id', '=', $index)->delete();
            }
        }
        // $this->call(UsersTableSeeder::class);
    }
}
