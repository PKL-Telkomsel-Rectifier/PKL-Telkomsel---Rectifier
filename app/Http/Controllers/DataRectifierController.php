<?php

namespace App\Http\Controllers;

use App\Models\Rectifier;
use Illuminate\Http\Request;
use App\Models\DataRectifier;
use Illuminate\Support\Carbon;

class DataRectifierController extends Controller
{
    /**
     * Mengirim data rectifier dari database untuk ditampilkan
     * dalam bentuk line chart pada modal realtime
     */
    public function showDataRealtime(Rectifier $rectifier)
    {
        $dataRectifiers = DataRectifier::select('created_at', 'voltage', 'current', 'temp')
            ->where('rectifier_id', $rectifier->id)
            ->where('created_at', '>=', Carbon::today()->subDays(3))
            ->get();

        $labels = $dataRectifiers->pluck('created_at')->map(function ($time) {
            return $time->format('Y-m-d H:i');
        })->toArray();

        $data = [];
        $data['voltage'] = $dataRectifiers->pluck('voltage')->toArray();
        $data['current'] = $dataRectifiers->pluck('current')->toArray();
        $data['temp'] = $dataRectifiers->pluck('temp')->toArray();

        return response()->json(compact('labels', 'data'));
    }

    /**
     * Mengirim data rectifier dari database untuk ditampilkan
     * dalam bentuk line chart pada modal detail
     */
    public function showDataDetail(Rectifier $rectifier, Request $request)
    {
        $dataRectifiers = DataRectifier::select('created_at', 'voltage', 'current', 'temp')
            ->where('rectifier_id', $rectifier->id)->filter(request(['start_date', 'end_date']))->get();

        $labels = $dataRectifiers->pluck('created_at')->map(function ($time) {
            return $time->format('Y-m-d H:i');
        })->toArray();

        $data = [];
        $data['voltage'] = $dataRectifiers->pluck('voltage')->toArray();
        $data['current'] = $dataRectifiers->pluck('current')->toArray();
        $data['temp'] = $dataRectifiers->pluck('temp')->toArray();

        return response()->json(compact('labels', 'data'));
    }

    /**
     * Mengirim data rectifier dari database untuk ditampilkan
     * dalam bentuk line chart pada halaman analysis
     */
    public function showDataAnalysis(Request $request)
    {
        $rectifiers = Rectifier::without('dataRectifiers')->select('id', 'name')->filter(request(['type']))->get();
        $dataRectifiers = DataRectifier::select('rectifier_id', 'voltage', 'current', 'temp', 'created_at')
            ->filter(request(['start_date', 'end_date']))->whereHas('rectifier', function ($query) {
                $query->where('type', request(['type']));
            })->get();
        $labels = $dataRectifiers->pluck('created_at')->map(function ($label) {
            return $label->format('Y-m-d H:i');
        })->unique()->values();

        $all_data = [];
        $all_data['rectifiers'] = $rectifiers->pluck('name')->toArray();
        $all_data['dataVoltage'] = [];
        $all_data['dataCurrent'] = [];
        $all_data['dataTemp'] = [];
        $dummy = array_fill(0, sizeof($labels), null);

        foreach ($rectifiers as $rectifier) {
            $dataVoltage = $dummy;
            $dataCurrent = $dummy;
            $dataTemp = $dummy;
            foreach ($dataRectifiers as $dataRectifier) {
                if ($dataRectifier->rectifier_id == $rectifier->id) {
                    $index = $labels->search($dataRectifier->created_at->format('Y-m-d H:i'));
                    $dataVoltage[$index] = $dataRectifier->voltage;
                    $dataCurrent[$index] = $dataRectifier->current;
                    $dataTemp[$index] = $dataRectifier->temp;
                }
            }
            array_push($all_data['dataVoltage'], $dataVoltage);
            array_push($all_data['dataCurrent'], $dataCurrent);
            array_push($all_data['dataTemp'], $dataTemp);
        }

        $datasetsVol = [];
        $datasetsCur = [];
        $datasetsTmp = [];

        for ($i = 0; $i < sizeof($all_data['rectifiers']); $i++) {
            $randomColor = 'rgba(' . rand(0, 255) . ',' . rand(0, 255) . ',' . rand(0, 255) . ', 1)';
            $datasetsVol[$i] = [
                'label' => $all_data['rectifiers'][$i],
                'data' => $all_data['dataVoltage'][$i],
                'fill' => false,
                'borderColor' => $randomColor,
                'lineTension' => 0.1
            ];
            $datasetsCur[$i] = [
                'label' => $all_data['rectifiers'][$i],
                'data' => $all_data['dataCurrent'][$i],
                'fill' => false,
                'borderColor' => $randomColor,
                'lineTension' => 0.1
            ];
            $datasetsTmp[$i] = [
                'label' => $all_data['rectifiers'][$i],
                'data' => $all_data['dataTemp'][$i],
                'fill' => false,
                'borderColor' => $randomColor,
                'lineTension' => 0.1
            ];
        }
        return response()->json(compact('labels', 'datasetsVol', 'datasetsCur', 'datasetsTmp'));
    }
}
