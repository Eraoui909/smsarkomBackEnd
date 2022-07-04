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
            'full_name' => "Hamza Eraoui",
            'id' => 1,
            'email' => 'hamzaeraoui2000@gmail.com',
            'password' => Hash::make('hamza123'),
            'address' => 'AV Oran Montfleuri',
            'phone' => '0636963810',
            'role' => 3,
        ]);
    }
}
