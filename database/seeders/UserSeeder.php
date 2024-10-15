<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin 1
        $user1 = User::create([
            'first_name' => 'Mahmoud',
            'last_name' => 'Awad',
            'username' => 'Awad',
            'phone' => '01152531478',
            'email' => 'awadppp389@gmail.com',
            'password' => bcrypt('123456789'),
            'user_type' => 'admin',
            'date_of_birth' => '1990-01-15',
            'address' => 'Cairo, Egypt',
            'gender' => 'male',
            'image' => null,
            'created_at' => Carbon::now(),
            'updated_at' => null,
        ]);

        // Admin 2
        $user2 = User::create([
            'first_name' => 'Mohamed',
            'last_name' => 'Sedeek',
            'username' => 'Sedeek',
            'phone' => '01062385269',
            'email' => 'sedeek@gmail.com',
            'password' => bcrypt('123456789'),
            'user_type' => 'admin',
            'date_of_birth' => '1985-06-10',
            'address' => 'Alexandria, Egypt',
            'gender' => 'male',
            'image' => null,
            'created_at' => Carbon::now(),
            'updated_at' => null,
        ]);

        // Customer 1
        $customer1 = User::create([
            'first_name' => 'Waad',
            'last_name' => 'Ahmed',
            'username' => 'waad',
            'phone' => '01033251393',
            'email' => 'waad@gmail.com',
            'password' => bcrypt('123456789'),
            'user_type' => 'customer',
            'date_of_birth' => '1998-04-23',
            'address' => 'Cairo, Egypt',
            'gender' => 'female',
            'image' => 'profile_waad.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => null,
        ]);

        // Customer 2
        $customer2 = User::create([
            'first_name' => 'Omar',
            'last_name' => 'Yahia',
            'username' => 'Omar',
            'phone' => '01115674016',
            'email' => 'omar@gmail.com',
            'password' => bcrypt('123456789'),
            'user_type' => 'customer',
            'date_of_birth' => '2000-02-14',
            'address' => 'Giza, Egypt',
            'gender' => 'male',
            'image' => 'profile_omar.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => null,
        ]);

        // Moderator
        $moderator = User::create([
            'first_name' => 'Ahmed',
            'last_name' => 'Sayed',
            'username' => 'Ahmed',
            'phone' => '01025501018',
            'email' => 'ahmed@gmail.com',
            'password' => bcrypt('123456789'),
            'user_type' => 'moderator',
            'date_of_birth' => '1995-09-30',
            'address' => 'Cairo, Egypt',
            'gender' => 'male',
            'image' => 'profile_ahmed.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => null,
        ]);

     
    }
}
