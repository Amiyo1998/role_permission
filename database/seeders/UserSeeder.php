<?php

namespace Database\Seeders;

use App\Models\User;
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
        $user = User::where('email', 'amiyo@gmail.com')->first();
        if(is_null($user)){
            DB::table('users')->insert([
                'name' => "Amiyo Jodder",
                'email' => "amiyo@gmail.com",
                'password' => Hash::make('12345678'),
            ]);
        }
    }
}
