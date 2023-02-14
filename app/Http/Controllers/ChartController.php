<?php

namespace App\Http\Controllers;

use App\Models\Rectifier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChartController extends Controller
{
    /**
     * Menampilkan data rectifier didalam modal secara realtime dalam 
     * dalam bentuk line chart
     *
     * @param  \App\Models\Rectifier
     * @return \Illuminate\Http\Response
     */
    public function showRealtime(Rectifier $rectifier)
    {
        return view('realtime', [
            'name' => $rectifier->name,
            'ip_recti' => $rectifier->ip_recti,
            'community' => $rectifier->community,
            'datas' => $rectifier->dataRectifiers,
            'title' => 'Home'
        ]);
    }

    /**
     * Menampilkan detail rectifier didalam modal dan juga
     * menampilkan line chart dalam range tanggal
     *
     * @param  \App\Models\Rectifier
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Menampilkan tiga chart untuk semua data rectifier
     * (voltage, current, dan temp) 
     * 
     *
     * @param  \App\Models\Rectifier
     * @return \Illuminate\Http\Response
     */
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
}
