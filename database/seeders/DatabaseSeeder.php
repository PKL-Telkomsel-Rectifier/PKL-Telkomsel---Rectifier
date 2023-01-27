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

        // Rectifier::create([
        //     'name' => 'LAPTOP LEGION',
        //     'site_name' => 'localhost',
        //     'rtpo' => 'SEMARANG',
        //     'nsa' => 'Gombel',
        //     'type' => 'Inner',
        //     'ip_recti' => '127.0.0.1',
        //     'community' => 'serverpkl',
        //     'version' => 1,
        //     'port' => 161,
        //     'oid_voltage' => '.1.3.6.1.2.1.25.1.6.0',
        //     'oid_temp' => '.1.3.6.1.2.1.25.2.2.0',
        //     'oid_current' => '.1.3.6.1.2.1.25.1.1.0'
        // ]);
        Rectifier::create([
            'name' => 'LAPTOP LEGION',
            'site_name' => 'TTC Nusukan',
            'rtpo' => 'SURAKARTA',
            'nsa' => 'SOLO',
            'type' => 'Inner',
            'ip_recti' => '10.6.225.24',
            'community' => 'public1',
            'version' => 2,
            'port' => 161,
            'oid_voltage' => '.1.3.6.1.4.1.2011.6.164.1.6.1.3.0',
            'oid_temp' => '.1.3.6.1.4.1.2011.6.164.1.6.1.4.0',
            'oid_current' => '.1.3.6.1.4.1.2011.6.164.1.4.2.5.0'
        ]);
        Rectifier::create([
            'name' => 'LAPTOP LEGION',
            'site_name' => 'TTC Nusukan',
            'rtpo' => 'SURAKARTA',
            'nsa' => 'SOLO',
            'type' => 'Inner',
            'ip_recti' => '10.6.225.25',
            'community' => 'public1',
            'version' => 2,
            'port' => 161,
            'oid_voltage' => '.1.3.6.1.4.1.2011.6.164.1.6.1.3.0',
            'oid_temp' => '.1.3.6.1.4.1.2011.6.164.1.6.1.4.0',
            'oid_current' => '.1.3.6.1.4.1.2011.6.164.1.4.2.5.0'
        ]);
        Rectifier::create([
            'name' => 'LAPTOP LEGION',
            'site_name' => 'TTC Nusukan',
            'rtpo' => 'SURAKARTA',
            'nsa' => 'SOLO',
            'type' => 'Inner',
            'ip_recti' => '10.6.225.22',
            'community' => 'public1',
            'version' => 2,
            'port' => 161,
            'oid_voltage' => '.1.3.6.1.4.1.2011.6.164.1.6.1.3.0',
            'oid_temp' => '.1.3.6.1.4.1.2011.6.164.1.6.1.4.0',
            'oid_current' => '.1.3.6.1.4.1.2011.6.164.1.4.2.5.0'
        ]);
        Rectifier::create([
            'name' => 'LAPTOP LEGION',
            'site_name' => 'TTC Nusukan',
            'rtpo' => 'SURAKARTA',
            'nsa' => 'SOLO',
            'type' => 'Inner',
            'ip_recti' => '10.6.225.23',
            'community' => 'public1',
            'version' => 2,
            'port' => 161,
            'oid_voltage' => '.1.3.6.1.4.1.2011.6.164.1.6.1.3.0',
            'oid_temp' => '.1.3.6.1.4.1.2011.6.164.1.6.1.4.0',
            'oid_current' => '.1.3.6.1.4.1.2011.6.164.1.4.2.5.0'
        ]);
        Rectifier::create([
            'name' => 'LAPTOP LEGION',
            'site_name' => 'TTC Nusukan',
            'rtpo' => 'SURAKARTA',
            'nsa' => 'SOLO',
            'type' => 'Inner',
            'ip_recti' => '10.6.225.21',
            'community' => 'public1',
            'version' => 2,
            'port' => 161,
            'oid_voltage' => '.1.3.6.1.4.1.2011.6.164.1.6.1.3.0',
            'oid_temp' => '.1.3.6.1.4.1.2011.6.164.1.6.1.4.0',
            'oid_current' => '.1.3.6.1.4.1.2011.6.164.1.4.2.5.0'
        ]);
        Rectifier::create([
            'name' => 'LAPTOP LEGION',
            'site_name' => 'TTC Solo Baru',
            'rtpo' => 'SURAKARTA',
            'nsa' => 'SOLO',
            'type' => 'Inner',
            'ip_recti' => '10.6.161.165',
            'community' => 'public1',
            'version' => 2,
            'port' => 161,
            'oid_voltage' => '.1.3.6.1.4.1.2011.6.164.1.6.1.3.0',
            'oid_temp' => '.1.3.6.1.4.1.2011.6.164.1.6.1.4.0',
            'oid_current' => '.1.3.6.1.4.1.2011.6.164.1.4.2.5.0'
        ]);
        Rectifier::create([
            'name' => 'LAPTOP LEGION',
            'site_name' => 'TTC Solo Baru',
            'rtpo' => 'SURAKARTA',
            'nsa' => 'SOLO',
            'type' => 'Inner',
            'ip_recti' => '10.6.161.173',
            'community' => 'public1',
            'version' => 2,
            'port' => 161,
            'oid_voltage' => '.1.3.6.1.4.1.2011.6.164.1.6.1.3.0',
            'oid_temp' => '.1.3.6.1.4.1.2011.6.164.1.6.1.4.0',
            'oid_current' => '.1.3.6.1.4.1.2011.6.164.1.4.2.5.0'
        ]);
        Rectifier::create([
            'name' => 'LAPTOP LEGION',
            'site_name' => 'TTC Solo Baru',
            'rtpo' => 'SURAKARTA',
            'nsa' => 'SOLO',
            'type' => 'Inner',
            'ip_recti' => '10.6.161.168',
            'community' => 'public1',
            'version' => 2,
            'port' => 161,
            'oid_voltage' => '.1.3.6.1.4.1.2011.6.164.1.6.1.3.0',
            'oid_temp' => '.1.3.6.1.4.1.2011.6.164.1.6.1.4.0',
            'oid_current' => '.1.3.6.1.4.1.2011.6.164.1.4.2.5.0'
        ]);
        Rectifier::create([
            'name' => 'LAPTOP LEGION',
            'site_name' => 'TTC Solo Baru',
            'rtpo' => 'SURAKARTA',
            'nsa' => 'SOLO',
            'type' => 'Inner',
            'ip_recti' => '10.6.161.166',
            'community' => 'public1',
            'version' => 2,
            'port' => 161,
            'oid_voltage' => '.1.3.6.1.4.1.2011.6.164.1.6.1.3.0',
            'oid_temp' => '.1.3.6.1.4.1.2011.6.164.1.6.1.4.0',
            'oid_current' => '.1.3.6.1.4.1.2011.6.164.1.4.2.5.0'
        ]);
        Rectifier::create([
            'name' => 'LAPTOP LEGION',
            'site_name' => 'TTC Solo Baru',
            'rtpo' => 'SURAKARTA',
            'nsa' => 'SOLO',
            'type' => 'Inner',
            'ip_recti' => '10.6.161.167',
            'community' => 'public1',
            'version' => 2,
            'port' => 161,
            'oid_voltage' => '.1.3.6.1.4.1.2011.6.164.1.6.1.3.0',
            'oid_temp' => '.1.3.6.1.4.1.2011.6.164.1.6.1.4.0',
            'oid_current' => '.1.3.6.1.4.1.2011.6.164.1.4.2.5.0'
        ]);

        DataRectifier::create([
            'rectifier_id' => 1,
            'voltage' => 342,
            'current' => 234,
            'temp' => 24.2,
        ]);
    }
}
