<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
            [
                "id" => 1,
                "name" => "English",
                "direction" => "ltr",
                "code" => "en",
                "status" => 1,
                "default" => true,
            ],

            [
                "id" => 2,
                "name" => "Bengali",
                "direction" => "ltr",
                "code" => "bn",
                "status" => 1,
                "default" => false,
            ],

            [
                "id" => 3,
                "name" => "French",
                "direction" => "ltr",
                "code" => "en",
                "status" => 1,
                "default" => false,
            ],

        ]);
    }
}
