<?php

namespace App\Models;

use FreeDSx\Snmp\SnmpClient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rectifier extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function getProcess($rectifier)
    {
        $snmp = new SnmpClient([
            'host' => $rectifier->address,
            'version' => $rectifier->version,
            'community' => $rectifier->community
        ]);

        $result = $snmp->getValue('.1.3.6.1.2.1.25.1.6.0');

        return $result;
    }

    public static function getMemory($rectifier)
    {
        $snmp = new SnmpClient([
            'host' => $rectifier->address,
            'version' => $rectifier->version,
            'community' => $rectifier->community
        ]);

        $result = $snmp->getValue('.1.3.6.1.2.1.25.2.2.0');

        return $result;
    }
}
