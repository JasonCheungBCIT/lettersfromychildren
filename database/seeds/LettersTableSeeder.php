<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class LettersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('letters')) {
            DB::table('letters')->delete();
        }

        $fakeData = Faker::create();
        $caption = "meow!! meow!!";

        $image = $fakeData->image("./images", '800', '600', 'cats', true, $caption); // images folder is in the root folder

        $familyid_letterid_imageurl = "1_1_" . $image;

        var_dump($image);

        DB::table('letters')->insert([
            'id' => 1,
            'familyid' => 1,
            'letterwrittendate' => '2002-09-21',
            'letter' => 'Today you were born! I am so proud to be your parent!',
            'picture' => $image,
            'picturefilename' => $image,
            'picturecaption' => $caption
        ]);

    }
}
