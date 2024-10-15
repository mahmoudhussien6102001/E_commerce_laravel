<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon ;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create seeder to test  ==> create data
        //admin
    $user = User::create([
        'name' => 'Mahmoudawad',
        'username'=>'Awad',
        'phone'=>'01152531478',
        'email' => 'awadppp389@gmail.com',
        'password' => bcrypt('123456789'),
        'created_at' => Carbon::now()->toDateString(),
        'updated_at' => null,
        'user_type' => 'admin',
    ]);
    // Admin Another 
    $user2 = User::create([
        'name' => 'MohamedSedeek',
        'username'=>'Sedeek',
        'phone'=>'01062385269',
        'email' => 'sedeek@gmail.com',
        'password' => bcrypt('123456789'),
        'created_at' => Carbon::now()->toDateString(),
        'updated_at' => null,
        'user_type' => 'admin',
    ]);
     // customer 
    $customer = User::create([
        'name' => 'waad',
        'username'=>'waad',
        'phone'=>'01033251393',
        'email' => 'waad@gmail.com',
        'password' => bcrypt('123456789'),
        'created_at' => Carbon::now()->toDateString(),
        'updated_at' => null,
        'user_type' => 'customer',
    ]);
    // customer  another 
    $customer2 = User::create([
        'name' => 'Omar',
        'username'=>'Omar',
        'phone'=>'01115674016',
        'email' => 'omar@gmail.com',
        'password' => bcrypt('123456789'),
        'created_at' => Carbon::now()->toDateString(),
        'updated_at' => null,
        'user_type' => 'customer',
    ]);


    // moderator
    $moderator = User::create([
        'name' => 'Ahmed Sayed',
        'username' =>'AhmedCR7',
        'phone'=>'01025501018',
        'email' => 'Ahmed@gmail.com',
        'password' => bcrypt('123456789'),
        'created_at' => Carbon::now()->toDateString(),
        'updated_at' => null,
        'user_type' => 'moderator',
    ]);
    }
}
