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
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.ro',
            'password' => bcrypt('admin'),
            'admin' => 1
        ]);

        DB::table('settings')->insert([
            'name' => 'db_csv',
            'status' => 1,
        ]);
    }
}
