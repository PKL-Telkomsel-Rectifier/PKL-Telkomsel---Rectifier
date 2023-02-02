<?php

namespace App\Http\Controllers;

use App\Models\Rectifier;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\UpdateRectifierRequest;

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

    public function form()
    {
        return view('form', [
            'title' => 'Form'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $dataRectifiers = $rectifier->dataRectifiers;
        $labels = array();
        $data = [
            'voltage' => array(),
            'current' => array(),
            'temp' => array()
        ];
        foreach ($dataRectifiers as $dataRectifier) {
            array_push($labels, $dataRectifier->created_at->format('Y-m-d'));
            array_push($data['voltage'], $dataRectifier->voltage);
            array_push($data['current'], $dataRectifier->current);
            array_push($data['temp'], $dataRectifier->temp);
        }

        return response()->json(compact('labels', 'data', 'rectifier'));
    }

    public function showAjaxDetail(Rectifier $rectifier, Request $request)
    {
        $labels = array();
        $data = [
            'voltage' => array(),
            'current' => array(),
            'temp' => array()
        ];

        if ($request->ajax()) {

            if ($request->input('start_date') && $request->input('end_date')) {

                $start_date = Carbon::parse($request->input('start_date'));
                $end_date = Carbon::parse($request->input('end_date'));
                if ($end_date->greaterThan($start_date)) {
                    $dataRectifiers = $rectifier->dataRectifiers->whereBetween('created_at', [$start_date, $end_date->addDay()]);
                } else {
                    $dataRectifiers = $rectifier->dataRectifiers->where('created_at', [$start_date]);
                }
            } else {
                $dataRectifiers = $rectifier->dataRectifiers->all();
            }

            foreach ($dataRectifiers as $dataRectifier) {
                array_push($labels, $dataRectifier->created_at->format('Y-m-d'));
                array_push($data['voltage'], $dataRectifier->voltage);
                array_push($data['current'], $dataRectifier->current);
                array_push($data['temp'], $dataRectifier->temp);
            }

            return response()->json(compact('labels', 'data', 'rectifier'));
        } else {
            dd($labels, $data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rectifier  $rectifier
     * @return \Illuminate\Http\Response
     */
    public function edit(Rectifier $rectifier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRectifierRequest  $request
     * @param  \App\Models\Rectifier  $rectifier
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRectifierRequest $request, Rectifier $rectifier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rectifier  $rectifier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rectifier $rectifier)
    {
        //
    }
}
