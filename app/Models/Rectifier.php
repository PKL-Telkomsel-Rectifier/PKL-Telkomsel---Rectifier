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

        $result = $snmp->getValue($rectifier->oid_v);

        return $result;
    }

    public static function getMemory($rectifier)
    {
        $snmp = new SnmpClient([
            'host' => $rectifier->address,
            'version' => $rectifier->version,
            'community' => $rectifier->community
        ]);

        $result = $snmp->getValue($rectifier->oid_t);

        return $result;
    }

    public function dataRectifiers()
    {
        return $this->hasMany(DataRectifier::class);
    }
}
