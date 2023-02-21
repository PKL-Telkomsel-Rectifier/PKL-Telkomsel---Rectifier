<?php

namespace App\Http\Controllers;

use App\Models\Rectifier;
use Illuminate\Http\Request;
use App\Models\DataRectifier;
use App\Models\HistoryRectifier;
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
            'title' => 'All Rectifier' . $title,
            'type' => request('type'),
            'search' => request('search'),
            'numInner' => Rectifier::where('type', 'Inner')->count(),
            'numOuter' => Rectifier::where('type', 'Outer')->count(),
            'numTtc' => Rectifier::where('type', 'TTC')->count(),
            'numAll' => Rectifier::count(),
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
        /**
         * keep old valued of rectifier for history
         */
        HistoryRectifier::create([
            'rectifier_id' => $rectifier->id,
            'old_name' => $rectifier->name,
            'old_site_name' => $rectifier->site_name,
            'old_rtpo' => $rectifier->rtpo,
            'old_nsa' => $rectifier->nsa,
            'old_type' => $rectifier->type,
            'old_port' => $rectifier->port,
            'old_ip_recti' => $rectifier->ip_recti,
            'old_community' => $rectifier->community,
            'old_version' => $rectifier->version,
            'old_oid_voltage' => $rectifier->oid_voltage,
            'old_oid_current' => $rectifier->oid_current,
            'old_oid_temp' => $rectifier->oid_temp,
            'created_at' => Carbon::now(),
        ]);

        $rules = [
            'site_name' => ['required'],
            'rtpo' => ['required'],
            'nsa' => ['required'],
            'type' => ['required'],
            'port' => ['required'],
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
        return redirect('/home')->with('delete-success', 'Rectifier berhasil dihapus.');
    }
}
