<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('managers')->insert([
            'full_name' => "Achraf Zaim",
            'id' => 1,
            'email' => 'achraf.zaime@gmail.com',
            'password' => Hash::make('12345678'),
            'address' => 'AV Oran Montfleuri',
            'phone' => '0693020346',
            'role' => 3,
        ]);
    }
}
