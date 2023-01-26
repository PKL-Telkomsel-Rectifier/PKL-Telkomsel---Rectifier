<?php

namespace App\Http\Controllers;

use App\Models\Rectifier;
use App\Http\Requests\StoreRectifierRequest;
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
        return view('login');
    }

    public function login()
    {
        return view('login');
    }

    public function home()
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
    public function store(StoreRectifierRequest $request)
    {
        //
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
            'address' => $rectifier->address,
            'community' => $rectifier->community,
            'processor' => Rectifier::getProcess($rectifier),
            'memory' => Rectifier::getMemory($rectifier),
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
