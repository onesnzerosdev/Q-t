<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Url;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        User::create([
            'name' => 'MasterMan',
            'email' => 'admin@mail.com',
            'passwoird' => Hash::make('secret007')
        ]);

        Url::create([
            'user_id' => 3,
            'title' => 'নিরাপত্তাঝুঁকিতে আইফোন, আইপ্যাড ও অ্যাপল ওয়াচ ব্যবহারকারীরা',

            'original_url' => 'https://www.prothomalo.com/technology/cyberworld/s86xpcpv5y',
            'shortener_url' => 'rD62B',
            'hit' => rand(11, 99),
        ]);
    }
}
