<?php

namespace App\Models;

use FreeDSx\Snmp\SnmpClient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rectifier extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function getVoltage($rectifier)
    {
        $snmp = new SnmpClient([
            'host' => $rectifier->ip_recti,
            'version' => $rectifier->version,
            'community' => $rectifier->community
        ]);

        $result = $snmp->getValue($rectifier->oid_voltage) / 10;

        return $result;
    }

    public static function getCurrent($rectifier)
    {
        $snmp = new SnmpClient([
            'host' => $rectifier->ip_recti,
            'version' => $rectifier->version,
            'community' => $rectifier->community
        ]);

        $result = $snmp->getValue($rectifier->oid_current);

        return $result;
    }

    public static function getTemp($rectifier)
    {
        $snmp = new SnmpClient([
            'host' => $rectifier->ip_recti,
            'version' => $rectifier->version,
            'community' => $rectifier->community
        ]);

        $result = $snmp->getValue($rectifier->oid_temp);

        return $result;
    }

    public function dataRectifiers()
    {
        return $this->hasMany(DataRectifier::class);
    }
}
