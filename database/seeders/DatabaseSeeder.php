<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Rectifier;
use App\Models\DataRectifier;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        User::create([
            'username' => 'admin',
            'password' => Hash::make('Telkomsel#1'),
        ]);

        Rectifier::create([
            'oid_name' => '.1.3.6.1.2.1.1.5.0',
            'site_name' => 'localhost',
            'rtpo' => 'Semarang',
            'nsa' => 'Gombel',
            'type' => 'Inner',
            'ip_recti' => '127.0.0.1',
            'community' => 'serverpkl',
            'version' => 1,
            'port' => 161,
            'oid_voltage' => '.1.3.6.1.2.1.25.1.6.0',
            'oid_temp' => '.1.3.6.1.2.1.25.2.2.0',
            'oid_current' => '.1.3.6.1.2.1.25.1.1.0'
        ]);

        DataRectifier::create([
            'rectifier_id' => 1,
            'voltage' => 342,
            'current' => 234,
            'temp' => 24.2,
        ]);
    }
}
