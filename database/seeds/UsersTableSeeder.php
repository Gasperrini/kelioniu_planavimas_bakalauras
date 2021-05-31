<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'first_name'      =>  'Ignas',
            'last_name'      =>  'Naudotojas',
            'email'     =>  'naudotojas@user.com',
            'password'  =>  bcrypt('password'),
        ]);
    }
}