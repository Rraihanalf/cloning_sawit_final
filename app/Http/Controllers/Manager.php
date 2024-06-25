<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pohon;
use App\Models\Jadwal;
use App\Models\Sampel;
use App\Models\Laboratorium;
use App\Models\Lapangan;

class Manager extends Controller
{
    public function index(){
        $data = Pohon::all();

        return view('manager.dashboard')->with('data', $data);
    }

    public function showjadwal(){
        return view('manager.data-jadwal');
    }

    public function get_jadwal(){
        $jadwals = Jadwal::all();

        $events = $jadwals->map(function($jadwal) {
            return [
                'title' => 'Kunjungan ' . $jadwal->id_lapangan,
                'start' => $jadwal->tgl_kerja,
                'backgroundColor' => '#007bff',
                'borderColor' => '#007bff',
                'textColor' => '#fff'
            ];
        });

        return response()->json($events);
    }

    public function showsampel(){
        $data = Sampel::all();

        return view('manager.data-sampel')->with('data', $data);
    }

    public function detail_sampel($id_sampel){
        $sampel = Sampel::where('id_sampel', $id_sampel)->first();

        if (!$sampel) {
            return redirect()->intended('pegawai/manager')->with('error', 'Pegawai not found');
        }
    
        $labs = Laboratorium::all(); // Asumsi bahwa Anda memiliki model Lab dan ingin menampilkan semua lab di dropdown
        return view('manager.detail-data-sampel', compact('sampel', 'labs'));
    }

    public function detail_pohon($id_pohon){
        $pohon = Pohon::where('id_pohon', $id_pohon)->first();

        if (!$pohon) {
            return redirect()->intended('/manager')->with('error', 'Pegawai not found');
        }
    
        return view('manager.detail-data-pohon', compact('pohon'));
    }

    public function showlab(){
        $data = Laboratorium::all();

        return view('manager.data-laboratorium')->with('data', $data);
    }

    public function showlapangan(){
        $data = Lapangan::all();

        return view('manager.data-lapangan')->with('data', $data);
    }
}
