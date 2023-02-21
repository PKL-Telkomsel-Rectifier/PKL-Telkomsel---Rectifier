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
        //     'name' => 'Laptop Gybran',
        //     'site_name' => 'localhost',
        //     'rtpo' => 'Surakarta',
        //     'nsa' => 'Solo',
        //     'type' => 'TTC',
        //     'ip_recti' => '127.0.0.1',
        //     'community' => 'serverpkl',
        //     'version' => 1,
        //     'port' => 161,
        //     'oid_voltage' => '.1.3.6.1.2.1.25.1.6.0',
        //     'oid_temp' => '.1.3.6.1.2.1.6.7.0',
        //     'oid_current' => '.1.3.6.1.2.1.6.8.0'
        // ]);

        // Rectifier::factory(29)->create();
        // DataRectifier::factory(500)->create();

        Rectifier::create([
            'name' => 'Rectifier BSS.1',
            'site_name' => 'TTC Nusukan',
            'rtpo' => 'Surakarta',
            'nsa' => 'Solo',
            'type' => 'TTC',
            'ip_recti' => '10.6.225.24',
            'community' => 'public1',
            'version' => 2,
            'port' => 161,
            'oid_voltage' => '.1.3.6.1.4.1.2011.6.164.1.6.1.3.0',
            'oid_current' => '.1.3.6.1.4.1.2011.6.164.1.6.1.4.0',
            'oid_temp' => '.1.3.6.1.4.1.2011.6.164.1.4.2.5.0'
        ]);
        Rectifier::create([
            'name' => 'Rectifier SSS.1',
            'site_name' => 'TTC Nusukan',
            'rtpo' => 'Surakarta',
            'nsa' => 'Solo',
            'type' => 'TTC',
            'ip_recti' => '10.6.225.25',
            'community' => 'public1',
            'version' => 2,
            'port' => 161,
            'oid_voltage' => '.1.3.6.1.4.1.2011.6.164.1.6.1.3.0',
            'oid_current' => '.1.3.6.1.4.1.2011.6.164.1.6.1.4.0',
            'oid_temp' => '.1.3.6.1.4.1.2011.6.164.1.4.2.5.0'
        ]);
        Rectifier::create([
            'name' => 'Rectifier SSS. 2',
            'site_name' => 'TTC Nusukan',
            'rtpo' => 'Surakarta',
            'nsa' => 'Solo',
            'type' => 'TTC',
            'ip_recti' => '10.6.225.22',
            'community' => 'public1',
            'version' => 2,
            'port' => 161,
            'oid_voltage' => '.1.3.6.1.4.1.2011.6.164.1.6.1.3.0',
            'oid_current' => '.1.3.6.1.4.1.2011.6.164.1.6.1.4.0',
            'oid_temp' => '.1.3.6.1.4.1.2011.6.164.1.4.2.5.0'
        ]);
        Rectifier::create([
            'name' => 'Rectifier BSS.2',
            'site_name' => 'TTC Nusukan',
            'rtpo' => 'Surakarta',
            'nsa' => 'Solo',
            'type' => 'TTC',
            'ip_recti' => '10.6.225.23',
            'community' => 'public1',
            'version' => 2,
            'port' => 161,
            'oid_voltage' => '.1.3.6.1.4.1.2011.6.164.1.6.1.3.0',
            'oid_current' => '.1.3.6.1.4.1.2011.6.164.1.6.1.4.0',
            'oid_temp' => '.1.3.6.1.4.1.2011.6.164.1.4.2.5.0'
        ]);
        Rectifier::create([
            'name' => 'Rectifier SSS.3',
            'site_name' => 'TTC Nusukan',
            'rtpo' => 'Surakarta',
            'nsa' => 'Solo',
            'type' => 'TTC',
            'ip_recti' => '10.6.225.21',
            'community' => 'public1',
            'version' => 2,
            'port' => 161,
            'oid_voltage' => '.1.3.6.1.4.1.2011.6.164.1.6.1.3.0',
            'oid_current' => '.1.3.6.1.4.1.2011.6.164.1.6.1.4.0',
            'oid_temp' => '.1.3.6.1.4.1.2011.6.164.1.4.2.5.0'
        ]);
        Rectifier::create([
            'name' => 'Rectifier R2.1',
            'site_name' => 'TTC Solo Baru',
            'rtpo' => 'Surakarta',
            'nsa' => 'Solo',
            'type' => 'TTC',
            'ip_recti' => '10.6.161.165',
            'community' => 'public1',
            'version' => 2,
            'port' => 161,
            'oid_voltage' => '.1.3.6.1.4.1.2011.6.164.1.6.1.3.0',
            'oid_current' => '.1.3.6.1.4.1.2011.6.164.1.6.1.4.0',
            'oid_temp' => '.1.3.6.1.4.1.2011.6.164.1.4.2.5.0'
        ]);
        Rectifier::create([
            'name' => 'Rectifier R2.2',
            'site_name' => 'TTC Solo Baru',
            'rtpo' => 'Surakarta',
            'nsa' => 'Solo',
            'type' => 'TTC',
            'ip_recti' => '10.6.161.173',
            'community' => 'public1',
            'version' => 2,
            'port' => 161,
            'oid_voltage' => '.1.3.6.1.4.1.2011.6.164.1.6.1.3.0',
            'oid_current' => '.1.3.6.1.4.1.2011.6.164.1.6.1.4.0',
            'oid_temp' => '.1.3.6.1.4.1.2011.6.164.1.4.2.5.0'
        ]);
        Rectifier::create([
            'name' => 'Rectifier R3.1',
            'site_name' => 'TTC Solo Baru',
            'rtpo' => 'Surakarta',
            'nsa' => 'Solo',
            'type' => 'TTC',
            'ip_recti' => '10.6.161.168',
            'community' => 'public1',
            'version' => 2,
            'port' => 161,
            'oid_voltage' => '.1.3.6.1.4.1.2011.6.164.1.6.1.3.0',
            'oid_current' => '.1.3.6.1.4.1.2011.6.164.1.6.1.4.0',
            'oid_temp' => '.1.3.6.1.4.1.2011.6.164.1.4.2.5.0'
        ]);
        Rectifier::create([
            'name' => 'Rectifier CNO-1 R3.4',
            'site_name' => 'TTC Solo Baru',
            'rtpo' => 'Surakarta',
            'nsa' => 'Solo',
            'type' => 'TTC',
            'ip_recti' => '10.6.161.166',
            'community' => 'public1',
            'version' => 2,
            'port' => 161,
            'oid_voltage' => '.1.3.6.1.4.1.2011.6.164.1.6.1.3.0',
            'oid_current' => '.1.3.6.1.4.1.2011.6.164.1.6.1.4.0',
            'oid_temp' => '.1.3.6.1.4.1.2011.6.164.1.4.2.5.0'
        ]);
        Rectifier::create([
            'name' => 'Rectifier CNO-2 R3.3',
            'site_name' => 'TTC Solo Baru',
            'rtpo' => 'Surakarta',
            'nsa' => 'Solo',
            'type' => 'TTC',
            'ip_recti' => '10.6.161.167',
            'community' => 'public1',
            'version' => 2,
            'port' => 161,
            'oid_voltage' => '.1.3.6.1.4.1.2011.6.164.1.6.1.3.0',
            'oid_current' => '.1.3.6.1.4.1.2011.6.164.1.6.1.4.0',
            'oid_temp' => '.1.3.6.1.4.1.2011.6.164.1.4.2.5.0'
        ]);

        // INNER 
        Rectifier::create([
            'name' => 'Recti BSC 1',
            'site_name' => 'Wirosari',
            'rtpo' => 'Sragen',
            'nsa' => 'Solo',
            'type' => 'Inner',
            'ip_recti' => '10.196.83.1',
            'community' => 'public',
            'version' => 2,
            'port' => 161,
            'oid_voltage' => '.1.3.6.1.4.1.1918.2.13.10.40.10.0',
            'oid_current' => '.1.3.6.1.4.1.1918.2.13.10.50.10.0',
            'oid_temp' => '.1.3.6.1.4.1.1918.2.13.10.100.30.0'
        ]);
        Rectifier::create([
            'name' => 'Recti BSC 2',
            'site_name' => 'Wirosari',
            'rtpo' => 'Sragen',
            'nsa' => 'Solo',
            'type' => 'Inner',
            'ip_recti' => '10.196.83.2',
            'community' => 'public',
            'version' => 2,
            'port' => 161,
            'oid_voltage' => '.1.3.6.1.4.1.1918.2.13.10.40.10.0',
            'oid_current' => '.1.3.6.1.4.1.1918.2.13.10.50.10.0',
            'oid_temp' => '.1.3.6.1.4.1.1918.2.13.10.100.30.0'
        ]);
        Rectifier::create([
            'name' => 'Recti RNC',
            'site_name' => 'Wirosari',
            'rtpo' => 'Sragen',
            'nsa' => 'Solo',
            'type' => 'Inner',
            'ip_recti' => '10.196.83.3',
            'community' => 'public',
            'version' => 2,
            'port' => 161,
            'oid_voltage' => '.1.3.6.1.4.1.1918.2.13.10.40.10.0',
            'oid_current' => '.1.3.6.1.4.1.1918.2.13.10.50.10.0',
            'oid_temp' => '.1.3.6.1.4.1.1918.2.13.10.100.30.0'
        ]);
        Rectifier::create([
            'name' => 'Recti OSN',
            'site_name' => 'Wirosari',
            'rtpo' => 'Sragen',
            'nsa' => 'Solo',
            'type' => 'Inner',
            'ip_recti' => '10.196.83.5',
            'community' => 'public',
            'version' => 2,
            'port' => 161,
            'oid_voltage' => '.1.3.6.1.4.1.1918.2.13.10.40.10.0',
            'oid_current' => '.1.3.6.1.4.1.1918.2.13.10.50.10.0',
            'oid_temp' => '.1.3.6.1.4.1.1918.2.13.10.100.30.0'
        ]);
        Rectifier::create([
            'name' => 'Recti BSC 1',
            'site_name' => 'Jiken',
            'rtpo' => 'Sragen',
            'nsa' => 'Solo',
            'type' => 'Inner',
            'ip_recti' => '10.196.97.9',
            'community' => 'public',
            'version' => 2,
            'port' => 161,
            'oid_voltage' => '.1.3.6.1.4.1.1918.2.13.10.40.10.0',
            'oid_current' => '.1.3.6.1.4.1.1918.2.13.10.50.10.0',
            'oid_temp' => '.1.3.6.1.4.1.1918.2.13.10.100.30.0'
        ]);
        Rectifier::create([
            'name' => 'Recti BSC 2',
            'site_name' => 'Jiken',
            'rtpo' => 'Sragen',
            'nsa' => 'Solo',
            'type' => 'Inner',
            'ip_recti' => '10.196.97.10',
            'community' => 'public',
            'version' => 2,
            'port' => 161,
            'oid_voltage' => '.1.3.6.1.4.1.1918.2.13.10.40.10.0',
            'oid_current' => '.1.3.6.1.4.1.1918.2.13.10.50.10.0',
            'oid_temp' => '.1.3.6.1.4.1.1918.2.13.10.100.30.0'
        ]);
        Rectifier::create([
            'name' => 'Recti BTS',
            'site_name' => 'Jiken',
            'rtpo' => 'Sragen',
            'nsa' => 'Solo',
            'type' => 'Inner',
            'ip_recti' => '10.196.97.11',
            'community' => 'public',
            'version' => 2,
            'port' => 161,
            'oid_voltage' => '.1.3.6.1.4.1.1918.2.13.10.40.10.0',
            'oid_current' => '.1.3.6.1.4.1.1918.2.13.10.50.10.0',
            'oid_temp' => '.1.3.6.1.4.1.1918.2.13.10.100.30.0'
        ]);
        Rectifier::create([
            'name' => 'Recti BSC 1',
            'site_name' => 'Gubug Tegowara',
            'rtpo' => 'Sragen',
            'nsa' => 'Solo',
            'type' => 'Inner',
            'ip_recti' => '10.196.68.3',
            'community' => 'public',
            'version' => 2,
            'port' => 161,
            'oid_voltage' => '.1.3.6.1.4.1.1918.2.13.10.40.10.0',
            'oid_current' => '.1.3.6.1.4.1.1918.2.13.10.50.10.0',
            'oid_temp' => '.1.3.6.1.4.1.1918.2.13.10.100.30.0'
        ]);
        Rectifier::create([
            'name' => 'Recti BSC 2',
            'site_name' => 'Gubug Tegowara',
            'rtpo' => 'Sragen',
            'nsa' => 'Solo',
            'type' => 'Inner',
            'ip_recti' => '10.196.68.4',
            'community' => 'public',
            'version' => 2,
            'port' => 161,
            'oid_voltage' => '.1.3.6.1.4.1.1918.2.13.10.40.10.0',
            'oid_current' => '.1.3.6.1.4.1.1918.2.13.10.50.10.0',
            'oid_temp' => '.1.3.6.1.4.1.1918.2.13.10.100.30.0'
        ]);
        Rectifier::create([
            'name' => 'Recti BTS',
            'site_name' => 'Gubug Tegowara',
            'rtpo' => 'Sragen',
            'nsa' => 'Solo',
            'type' => 'Inner',
            'ip_recti' => '10.196.68.5',
            'community' => 'public',
            'version' => 2,
            'port' => 161,
            'oid_voltage' => '.1.3.6.1.4.1.1918.2.13.10.40.10.0',
            'oid_current' => '.1.3.6.1.4.1.1918.2.13.10.50.10.0',
            'oid_temp' => '.1.3.6.1.4.1.1918.2.13.10.100.30.0'
        ]);


        // OUTER
        Rectifier::create([
            'name' => 'BSC,OSN,RNC, RAN',
            'site_name' => 'Margorejo',
            'rtpo' => 'Pati',
            'nsa' => 'Semarang',
            'type' => 'Outer',
            'ip_recti' => '10.196.81.7',
            'community' => 'public',
            'version' => 2,
            'port' => 161,
            'oid_voltage' => '1.3.6.1.4.1.1918.2.13.10.70.10.20.0',
            'oid_current' => '.1.3.6.1.4.1.1918.2.13.10.50.10.0',
            'oid_temp' => '.1.3.6.1.4.1.1918.2.13.10.100.30.0'
        ]);
        Rectifier::create([
            'name' => 'BSC,OSN,RNC, RAN',
            'site_name' => 'Margorejo',
            'rtpo' => 'Pati',
            'nsa' => 'Semarang',
            'type' => 'Outer',
            'ip_recti' => '10.196.81.8',
            'community' => 'public',
            'version' => 2,
            'port' => 161,
            'oid_voltage' => '1.3.6.1.4.1.1918.2.13.10.70.10.20.0',
            'oid_current' => '.1.3.6.1.4.1.1918.2.13.10.50.10.0',
            'oid_temp' => '.1.3.6.1.4.1.1918.2.13.10.100.30.0'
        ]);
        Rectifier::create([
            'name' => 'BTS & RTN',
            'site_name' => 'Margorejo',
            'rtpo' => 'Pati',
            'nsa' => 'Semarang',
            'type' => 'Outer',
            'ip_recti' => '10.196.81.9',
            'community' => 'public',
            'version' => 2,
            'port' => 161,
            'oid_voltage' => '1.3.6.1.4.1.1918.2.13.10.70.10.20.0',
            'oid_current' => '.1.3.6.1.4.1.1918.2.13.10.50.10.0',
            'oid_temp' => '.1.3.6.1.4.1.1918.2.13.10.100.30.0'
        ]);
        Rectifier::create([
            'name' => 'Recti BTS,OSN Main',
            'site_name' => 'Jekulo',
            'rtpo' => 'Pati',
            'nsa' => 'Semarang',
            'type' => 'Outer',
            'ip_recti' => '10.196.79.1',
            'community' => 'public',
            'version' => 2,
            'port' => 161,
            'oid_voltage' => '1.3.6.1.4.1.1918.2.13.10.70.10.20.0',
            'oid_current' => '.1.3.6.1.4.1.1918.2.13.10.50.10.0',
            'oid_temp' => '.1.3.6.1.4.1.1918.2.13.10.100.30.0'
        ]);
        Rectifier::create([
            'name' => 'Recti BTS,OSN Standby',
            'site_name' => 'Jekulo',
            'rtpo' => 'Pati',
            'nsa' => 'Semarang',
            'type' => 'Outer',
            'ip_recti' => '10.196.79.2',
            'community' => 'public',
            'version' => 2,
            'port' => 161,
            'oid_voltage' => '1.3.6.1.4.1.1918.2.13.10.70.10.20.0',
            'oid_current' => '.1.3.6.1.4.1.1918.2.13.10.50.10.0',
            'oid_temp' => '.1.3.6.1.4.1.1918.2.13.10.100.30.0'
        ]);
        Rectifier::create([
            'name' => 'Rect BSC 1',
            'site_name' => 'Taunan',
            'rtpo' => 'Demak',
            'nsa' => 'Semarang',
            'type' => 'Outer',
            'ip_recti' => '10.196.93.51',
            'community' => 'public',
            'version' => 2,
            'port' => 161,
            'oid_voltage' => '1.3.6.1.4.1.1918.2.13.10.70.10.20.0',
            'oid_current' => '.1.3.6.1.4.1.1918.2.13.10.50.10.0',
            'oid_temp' => '.1.3.6.1.4.1.1918.2.13.10.100.30.0'
        ]);
        Rectifier::create([
            'name' => 'Rectifier BSC 1',
            'site_name' => 'Bawen',
            'rtpo' => 'Demak',
            'nsa' => 'Semarang',
            'type' => 'Outer',
            'ip_recti' => '10.196.64.5',
            'community' => 'public',
            'version' => 2,
            'port' => 161,
            'oid_voltage' => '1.3.6.1.4.1.1918.2.13.10.70.10.20.0',
            'oid_current' => '.1.3.6.1.4.1.1918.2.13.10.50.10.0',
            'oid_temp' => '.1.3.6.1.4.1.1918.2.13.10.100.30.0'
        ]);
        Rectifier::create([
            'name' => 'Rectifier BSC 2',
            'site_name' => 'Bawen',
            'rtpo' => 'Demak',
            'nsa' => 'Semarang',
            'type' => 'Outer',
            'ip_recti' => '10.196.64.6',
            'community' => 'public',
            'version' => 2,
            'port' => 161,
            'oid_voltage' => '1.3.6.1.4.1.1918.2.13.10.70.10.20.0',
            'oid_current' => '.1.3.6.1.4.1.1918.2.13.10.50.10.0',
            'oid_temp' => '.1.3.6.1.4.1.1918.2.13.10.100.30.0'
        ]);
        Rectifier::create([
            'name' => 'Rectifier BTS',
            'site_name' => 'Bawen',
            'rtpo' => 'Demak',
            'nsa' => 'Semarang',
            'type' => 'Outer',
            'ip_recti' => '10.196.64.7',
            'community' => 'public',
            'version' => 2,
            'port' => 161,
            'oid_voltage' => '1.3.6.1.4.1.1918.2.13.10.70.10.20.0',
            'oid_current' => '.1.3.6.1.4.1.1918.2.13.10.50.10.0',
            'oid_temp' => '.1.3.6.1.4.1.1918.2.13.10.100.30.0'
        ]);
        Rectifier::create([
            'name' => 'Rectifier OSN',
            'site_name' => 'Bawen',
            'rtpo' => 'Demak',
            'nsa' => 'Semarang',
            'type' => 'Outer',
            'ip_recti' => '10.196.64.9',
            'community' => 'public',
            'version' => 2,
            'port' => 161,
            'oid_voltage' => '1.3.6.1.4.1.1918.2.13.10.70.10.20.0',
            'oid_current' => '.1.3.6.1.4.1.1918.2.13.10.50.10.0',
            'oid_temp' => '.1.3.6.1.4.1.1918.2.13.10.100.30.0'
        ]);

        // DataRectifier::create([
        //     'rectifier_id' => 1,
        //     'voltage' => 342,
        //     'current' => 234,
        //     'temp' => 24.2,
        // ]);
    }
}
