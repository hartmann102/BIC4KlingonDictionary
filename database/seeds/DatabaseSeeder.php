<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TermTableSeeder::class);
        $this->call(TranslationTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
    }
}
