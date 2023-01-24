<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DataRectifier;
use App\Models\Rectifier;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Rectifier::create([
            'name' => 'localhost',
            'address' => '127.0.0.1',
            'port' => 161,
            'community' => 'serverpkl',
            'version' => 1,
            'oid_v' => '.1.3.6.1.2.1.25.1.6.0',
            'oid_t' => '.1.3.6.1.2.1.25.2.2.0',
        ]);

        DataRectifier::create([
            'rectifier_id' => 1,
            'processor' => 342,
            'memory' => 234,
        ]);
    }
}
