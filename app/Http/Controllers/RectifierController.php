<?php

namespace App\Http\Controllers;

use App\Models\Rectifier;
use Illuminate\Http\Request;
use App\Models\DataRectifier;
use Illuminate\Support\Carbon;
use PhpParser\Node\Stmt\Foreach_;
use Illuminate\Support\Collection;

class RectifierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $title = '';
        if (request('type')) {
            $title = ' in ' . request('type');
        }

        return view('home', [
            'rectifiers' => Rectifier::latest()->filter(request(['search', 'type']))
                ->paginate(4)->withQueryString(),
            'title' => 'All Rectifier' . $title
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form', [
            'title' => 'Form'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRectifierRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'unique:rectifiers,name'],
            'site_name' => ['required'],
            'rtpo' => ['required'],
            'nsa' => ['required'],
            'type' => ['required'],
            'port' => ['required'],
            'ip_recti' => ['required', 'unique:rectifiers,ip_recti', 'ip'],
            'community' => ['required'],
            'version' => ['required'],
            'oid_voltage' => ['required',],
            'oid_current' => ['required',],
            'oid_temp' => ['required',],
        ]);

        Rectifier::create($validatedData);
        return redirect('/home')->with('success', 'Rectifier berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rectifier  $rectifier
     * @return \Illuminate\Http\Response
     */
    public function showRealtime(Rectifier $rectifier)
    {
        // return $rectifier;
        return view('realtime', [
            'name' => $rectifier->name,
            'ip_recti' => $rectifier->ip_recti,
            'community' => $rectifier->community,
            'datas' => $rectifier->dataRectifiers,
            'title' => 'Home'
        ]);
    }

    public function showDetail(Rectifier $rectifier)
    {
        // return $rectifier;
        return view('detail', [
            'name' => $rectifier->name,
            'ip_recti' => $rectifier->ip_recti,
            'community' => $rectifier->community,
            'datas' => $rectifier->dataRectifiers,
        ]);
    }

    public function showAjax(Rectifier $rectifier)
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
    // public function showAjax(Rectifier $rectifier)
    // {
    //     $dataRectifiers = $rectifier->dataRectifiers;
    //     $labels = array();
    //     $data = [
    //         'voltage' => array(),
    //         'current' => array(),
    //         'temp' => array()
    //     ];
    //     foreach ($dataRectifiers as $dataRectifier) {
    //         array_push($labels, $dataRectifier->created_at->format('Y-m-d'));
    //         array_push($data['voltage'], $dataRectifier->voltage);
    //         array_push($data['current'], $dataRectifier->current);
    //         array_push($data['temp'], $dataRectifier->temp);
    //     }

    //     return response()->json(compact('labels', 'data', 'rectifier'));
    // }

    // public function showAjaxDetail(Rectifier $rectifier, Request $request)
    // {
    //     $labels = array();
    //     $data = [
    //         'voltage' => array(),
    //         'current' => array(),
    //         'temp' => array()
    //     ];

    //     if ($request->ajax()) {

    //         $dataRectifiers = DataRectifier::where('rectifier_id', $rectifier->id)->filter(request(['start_date', 'end_date']))
    //             ->get();

    //         foreach ($dataRectifiers as $dataRectifier) {
    //             array_push($labels, $dataRectifier->created_at->format('Y-m-d'));
    //             array_push($data['voltage'], $dataRectifier->voltage);
    //             array_push($data['current'], $dataRectifier->current);
    //             array_push($data['temp'], $dataRectifier->temp);
    //         }

    //         return response()->json(compact('labels', 'data', 'rectifier'));
    //     } else {
    //         dd($labels, $data);
    //     }
    // }

    public function showAjaxDetail(Rectifier $rectifier, Request $request)
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

    public function showAnalysis(Rectifier $rectifier)
    {
        return view('analysis', [
            'name' => $rectifier->name,
            'ip_recti' => $rectifier->ip_recti,
            'community' => $rectifier->community,
            'datas' => $rectifier->dataRectifiers,
            'title' => 'Home'
        ]);
    }

    public function ajaxAnalysisVoltage(Request $request)
    {
        $all_recti = Rectifier::filter(request(['type']))->get();
        $all_data = DataRectifier::filter(request(['start_date', 'end_date']))->get();
        $labels = $all_data->pluck('created_at')->map(function ($date) {
            return $date->format('Y-m-d H:i');
        });

        $datasets = [];
        foreach ($all_recti as $recti) {
            $voltage_data = new Collection();
            foreach ($labels as $time) {
                $filter_data = $all_data->filter(function ($value) use ($time, $recti) {
                    return (substr($value['created_at'], 0, 16) === $time) && $value['rectifier_id'] === $recti->id;
                });

                $voltage = $filter_data->pluck('voltage')->first();
                if ($voltage) {
                    $voltage_data->push($voltage);
                } else {
                    $voltage_data->push(null);
                }
            }

            // foreach ($times as $time) {
            //     if ($all_data->where('created_at', $time)->where('rectifier_id', $recti->id)->first()) {
            //         array_push($voltage_data, $all_data->where('created_at', $time)->where('rectifier_id', $recti->id)->first()->voltage);
            //     } else {
            //         array_push($voltage_data, null);
            //     }
            // }

            $randomColor = 'rgba(' . rand(0, 255) . ',' . rand(0, 255) . ',' . rand(0, 255) . ', 1)';
            array_push($datasets, [
                'label' => $recti->name,
                // 'data' => $all_data->where('rectifier_id', $recti->id)->pluck('voltage'),
                'data' => $voltage_data,
                'borderColor' => $randomColor,
                'backgroundColor' => $randomColor,
                'fill' => false,
            ]);
        }
        return response()->json(compact('labels', 'datasets'));
    }

    public function ajaxAnalysisCurrent(Request $request)
    {
        $all_recti = Rectifier::filter(request(['type']))->get();
        $all_data = DataRectifier::filter(request(['start_date', 'end_date']))->get();
        $labels = $all_data->pluck('created_at')->map(function ($date) {
            return $date->format('Y-m-d H:i');
        });

        $datasets = [];
        foreach ($all_recti as $recti) {
            $current_data = new Collection();
            foreach ($labels as $time) {
                $filter_data = $all_data->filter(function ($value) use ($time, $recti) {
                    return (substr($value['created_at'], 0, 16) === $time) && $value['rectifier_id'] === $recti->id;
                });

                $current = $filter_data->pluck('current')->first();
                if ($current) {
                    $current_data->push($current);
                } else {
                    $current_data->push(null);
                }
            }
            // $current_data = [];
            // foreach ($times as $time) {
            //     if ($all_data->where('created_at', $time)->where('rectifier_id', $recti->id)->first()) {
            //         array_push($current_data, $all_data->where('created_at', $time)->where('rectifier_id', $recti->id)->first()->current);
            //     } else {
            //         array_push($current_data, null);
            //     }
            // }
            $randomColor = 'rgba(' . rand(0, 255) . ',' . rand(0, 255) . ',' . rand(0, 255) . ', 1)';
            array_push($datasets, [
                'label' => $recti->name,
                // 'data' => $all_data->where('rectifier_id', $recti->id)->pluck('current'),
                'data' => $current_data,
                'borderColor' => $randomColor,
                'backgroundColor' => $randomColor,
                'fill' => false,
            ]);
        }
        return response()->json(compact('labels', 'datasets'));
    }

    public function ajaxAnalysisTemp(Request $request)
    {
        $all_recti = Rectifier::filter(request(['type']))->get();
        $all_data = DataRectifier::filter(request(['start_date', 'end_date']))->get();
        $labels = $all_data->pluck('created_at')->map(function ($date) {
            return $date->format('Y-m-d H:i');
        });

        $datasets = [];
        foreach ($all_recti as $recti) {
            $temp_data = new Collection();
            foreach ($labels as $time) {
                $filter_data = $all_data->filter(function ($value) use ($time, $recti) {
                    return (substr($value['created_at'], 0, 16) === $time) && $value['rectifier_id'] === $recti->id;
                });

                $temp = $filter_data->pluck('temp')->first();
                if ($temp) {
                    $temp_data->push($temp);
                } else {
                    $temp_data->push(null);
                }
            }
            // $temp_data = [];
            // foreach ($times as $time) {
            //     if ($all_data->where('created_at', $time)->where('rectifier_id', $recti->id)->first()) {
            //         array_push($temp_data, $all_data->where('created_at', $time)->where('rectifier_id', $recti->id)->first()->temp);
            //     } else {
            //         array_push($temp_data, null);
            //     }
            // }
            $randomColor = 'rgba(' . rand(0, 255) . ',' . rand(0, 255) . ',' . rand(0, 255) . ', 1)';
            array_push($datasets, [
                'label' => $recti->name,
                // 'data' => $all_data->where('rectifier_id', $recti->id)->pluck('temp'),
                'data' => $temp_data,
                'backgroundColor' => $randomColor,
                'borderColor' => $randomColor,
                'fill' => false,
            ]);
        }
        return response()->json(compact('labels', 'datasets'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rectifier  $rectifier
     * @return \Illuminate\Http\Response
     */
    public function edit(Rectifier $rectifier)
    {
        return view('edit', [
            'rectifier' => $rectifier,
            'title' => 'Edit Rectifier'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRectifierRequest  $request
     * @param  \App\Models\Rectifier  $rectifier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rectifier $rectifier)
    {
        $rules = [
            // 'name' => ['required', 'unique:rectifiers,name'],
            'site_name' => ['required'],
            'rtpo' => ['required'],
            'nsa' => ['required'],
            'type' => ['required'],
            'port' => ['required'],
            // 'ip_recti' => ['required', 'unique:rectifiers,ip_recti', 'ip'],
            'community' => ['required'],
            'version' => ['required'],
            'oid_voltage' => ['required',],
            'oid_current' => ['required',],
            'oid_temp' => ['required',],
        ];

        if ($request->name != $rectifier->name) {
            $rules['name'] = ['required', 'unique:rectifiers,name'];
        }

        if ($request->ip_recti != $rectifier->ip_recti) {
            $rules['ip_recti'] = ['required', 'unique:rectifiers,ip_recti', 'ip'];
        }

        $validatedData = $request->validate($rules);

        Rectifier::where('id', $rectifier->id)
            ->update($validatedData);
        return redirect('/home')->with('edit-success', 'Rectifier berhasil di-update.');
    }

    public function delete(Rectifier $rectifier)
    {
        return view('delete', [
            'title' => 'Delete Rectifier',
            'rectifier' => $rectifier,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rectifier  $rectifier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rectifier $rectifier)
    {
        Rectifier::destroy($rectifier->id);
        return redirect('/home')->with('success', 'Rectifier berhasil dihapus.');
    }
}
