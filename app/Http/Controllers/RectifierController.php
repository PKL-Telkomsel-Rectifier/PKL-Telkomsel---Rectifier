<?php

namespace App\Http\Controllers;

use App\Models\Rectifier;
use App\Http\Requests\StoreRectifierRequest;
use App\Http\Requests\UpdateRectifierRequest;
use Illuminate\Http\Request;

class RectifierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('home', [
            'rectifiers' => Rectifier::latest()->get(),
            'title' => 'Home'
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
    public function show(Rectifier $rectifier)
    {
        return view('rectifier', [
            'name' => $rectifier->name,
            'ip_recti' => $rectifier->ip_recti,
            'community' => $rectifier->community,
            'voltage' => Rectifier::getVoltage($rectifier),
            'current' => Rectifier::getCurrent($rectifier),
            'temp' => Rectifier::getTemp($rectifier),
            'title' => 'Home'
        ]);
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
