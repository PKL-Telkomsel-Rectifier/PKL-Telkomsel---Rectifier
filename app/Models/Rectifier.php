<?php

namespace App\Models;

use FreeDSx\Snmp\SnmpClient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rectifier extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['dataRectifiers'];


    // METHOD 

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('site_name', 'like', '%' . $search . '%')
                    ->orWhere('ip_recti', 'like', '%' . $search . '%');
            });
        });

        $query->when($filters['type'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('type', 'like', '%' . $search . '%');
            });
        });
    }


    public static function getVoltage($rectifier)
    {
        $snmp = new SnmpClient([
            'host' => $rectifier->ip_recti,
            'version' => $rectifier->version,
            'community' => $rectifier->community
        ]);

        $result = $snmp->getValue($rectifier->oid_voltage);

        if (mb_strlen($result) > 3) {
            $result = $result / 100;
        } else {
            $result = $result / 10;
        }

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

    public function historyRectifiers()
    {
        return $this->hasMany(HistoryRectifier::class);
    }
}
