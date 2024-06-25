<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Laboratorium;
use App\Models\Lapangan;
use Illuminate\Http\Request;
use App\Models\Pohon;
use App\Models\Sampel;
use Illuminate\Support\Facades\File;

class KetuaLab extends Controller
{
    public function index(){
        $data = Pohon::all();

        return view('ketualab.dashboard')->with('data', $data);
    }

    public function showjadwal(){
        return view('ketualab.data-jadwal');
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

    public function add_jadwal(){
        $data = Lapangan::all();
        return view('ketualab.create-data-jadwal')->with('data', $data);
    }

    public function store_jadwal(Request $request){
        $validatedData = $request->validate([
            'id_lapangan' => 'required|string',
            'tgl_kerja' => 'required|date',
        ]);

        $lastJadwal = Jadwal::orderBy('id_jadwal', 'desc')->first();
        if ($lastJadwal) {
            $lastIdNumber = (int) substr($lastJadwal->id_jadwal, 3);
            $newIdNumber = $lastIdNumber + 1;
        } else {
            $newIdNumber = 1;
        }

        $newIdJadwal = 'JD-' . str_pad($newIdNumber, 3, '0', STR_PAD_LEFT);

        $validatedData['id_jadwal'] = $newIdJadwal;
        $validatedData['created_at'] = now();
        $validatedData['updated_at'] = now();

        // dd($validatedData);
        Jadwal::create($validatedData);

        return redirect()->intended('jadwal/ketualab')->with('success', 'Data Jadwal berhasil disimpan!');
    }

    public function showsampel(){
        $data = Sampel::all();

        return view('ketualab.data-sampel')->with('data', $data);
    }
    
    public function detail_sampel($id_sampel){
        $sampel = Sampel::where('id_sampel', $id_sampel)->first();

        if (!$sampel) {
            return redirect()->intended('pegawai/ketualab')->with('error', 'Pegawai not found');
        }
    
        $labs = Laboratorium::all(); // Asumsi bahwa Anda memiliki model Lab dan ingin menampilkan semua lab di dropdown
        return view('ketualab.detail-data-sampel', compact('sampel', 'labs'));
    }

    public function add_sampel(){
        $data = Laboratorium::all();
        return view('ketualab.create-data-sampel')->with('data', $data);
    }

    public function store_sampel(Request $request){
        $validatedData = $request->validate([
            'id_lab' => 'required|string',
            'jenis_bibit' => 'required|string',
            'asal_bibit' => 'required|string',
        ]);

        $lastSampel = Sampel::orderBy('id_sampel', 'desc')->first();
        if ($lastSampel) {
            $lastIdNumber = (int) substr($lastSampel->id_sampel, 3);
            $newIdNumber = $lastIdNumber + 1;
        } else {
            $newIdNumber = 1;
        }

        $newIdSampel = 'SP-' . str_pad($newIdNumber, 3, '0', STR_PAD_LEFT);

        $validatedData['id_sampel'] = $newIdSampel;
        $validatedData['created_at'] = now();
        $validatedData['updated_at'] = now();

        // dd($validatedData);
        Sampel::create($validatedData);

        return redirect()->intended('sampel/ketualab')->with('success', 'Data sampel berhasil disimpan!');
    }

    public function edit_sampel($id_sampel){
        $sampel = Sampel::where('id_sampel', $id_sampel)->first();

        if (!$sampel) {
            return redirect()->intended('pegawai/ketualab')->with('error', 'Pegawai not found');
        }
    
        $labs = Laboratorium::all(); 
        return view('ketualab.edit-data-sampel', compact('sampel', 'labs'));
    }

    public function update_sampel(Request $request, $id_sampel)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'id_lab' => 'required|string',
            'jenis_bibit' => 'required|string',
            'asal_bibit' => 'required|string',
        ]);

        $affected = Sampel::where('id_sampel', $id_sampel)
                        ->update([
                            'id_lab' => $validatedData['id_lab'],
                            'jenis_bibit' => $validatedData['jenis_bibit'],
                            'asal_bibit' => $validatedData['asal_bibit'],
                            ]);
        if ($affected) {
            return redirect()->intended('sampel/ketualab')->with('success', 'Data Sampel Berhasil Diupdate');
        } else {
            return redirect()->intended('sampel/ketualab')->with('error', 'Gagal mengupdate data Sampel');
        }
    }

    public function destroy_sampel($id_sampel)
    {
        $deleted = Sampel::where('id_sampel', $id_sampel)->delete();

        if ($deleted) {
            return redirect()->intended('sampel/ketualab')->with('success', 'Data sampel berhasil dihapus!');
        }
        return redirect()->intended('sampel/ketualab')->with('error', 'Sampel not found');
    }

    public function detail_pohon($id_pohon){
        $pohon = Pohon::where('id_pohon', $id_pohon)->first();

        if (!$pohon) {
            return redirect()->intended('/ketualab')->with('error', 'Pegawai not found');
        }
    
        return view('ketualab.detail-data-pohon', compact('pohon'));
    }

    public function add_pohon(){
        $cekSampel = Pohon::pluck('id_sampel');
        $sampel = Sampel::whereNotIn('id_sampel', $cekSampel)->get();
        $lapangan = Lapangan::all();
        return view('ketualab.create-data-pohon', compact('sampel', 'lapangan'));
    }

    public function store_pohon(Request $request){
        $validatedData = $request->validate([
            'id_sampel' => 'required|string',
            'id_lapangan' => 'required|string',
            'tgl_tanam' => 'required|date',
            'tinggi_pohon' => 'required|numeric',
            'tgl_kematian' => 'nullable|date',
            'bukti_kematian' => 'nullable|string',
            'deskripsi' => 'required|string|max:255',
        ]);

        $lastPohon = Pohon::orderBy('id_pohon', 'desc')->first();
        if ($lastPohon) {
            $lastIdNumber = (int) substr($lastPohon->id_pohon, -3);
            $newIdNumber = $lastIdNumber + 1;
        } else {
            $newIdNumber = 1;
        }

        $newIdPohon = $validatedData['id_sampel'] . '-' . $validatedData['id_lapangan'] . '-P' . str_pad($newIdNumber, 3, '0', STR_PAD_LEFT);

        $validatedData['id_pohon'] = $newIdPohon;

        // dd($validatedData);
        Pohon::create($validatedData);

        return redirect()->intended('/ketualab')->with('success', 'Data Pohon Baru Berhasil Dibuat!');
    }

    public function edit_pohon($id_pohon){
        $pohon = Pohon::where('id_pohon', $id_pohon)->first();

        if (!$pohon) {
            return redirect()->intended('pegawai/ketualab')->with('error', 'Pegawai not found');
        }
    
        $sampel = Sampel::all();
        $lapangan = Lapangan::all(); 
        return view('ketualab.edit-data-pohon', compact('pohon', 'sampel', 'lapangan'));
    }

    public function update_tglmati(Request $request, $id_pohon)
    {
        $validatedData = $request->validate([
            'tgl_kematian' => 'required|date',
        ]);


        // dd($validatedData);
        $affected = Pohon::where('id_pohon', $id_pohon)
        ->update([
            'tgl_kematian' => $validatedData['tgl_kematian'],
            'daya_hidup' => 'Mati',
            ]);

        if ($affected) {
            return redirect()->intended('/ketualab')->with('success', 'Tanggal Kematian Berhasil Diupdate');
        } else {
            return redirect()->intended('/ketualab')->with('error', 'Gagal mengupdate data Sampel');
        }
    }

    public function update_buktimati(Request $request, $id_pohon){

        // Validasi form
        $request->validate([
            'bukti_kematian' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120', // Maksimal 2MB
        ]);

        // Cari pohon berdasarkan ID
        $pohon = Pohon::where('id_pohon', $id_pohon)->first();

        if (!$pohon) {
            return redirect()->back()->with('error', 'Pohon tidak ditemukan.');
        }

        // Proses upload gambar
        if ($request->hasFile('bukti_kematian')) {
            $file = $request->file('bukti_kematian');
            $fileName = time() . '_' . $file->getClientOriginalName();
            
            // Simpan file di public/bukti_kematian
            $file->move(public_path('bukti_kematian'), $fileName);

            // Update path bukti kematian pada record pohon
            $pohon->where('id_pohon', $id_pohon)->update(['bukti_kematian' => 'bukti_kematian/' . $fileName]);

            return redirect()->intended('/ketualab')->with('success', 'Bukti kematian berhasil diunggah.');
        }

        return redirect()->back()->with('error', 'Gagal mengunggah bukti kematian.');
    }   

    public function update_pohon(Request $request, $id_pohon){
        $validatedData = $request->validate([
            'id_sampel' => 'required|string',
            'id_lapangan' => 'required|string',
            'tgl_tanam' => 'required|date',
            'tinggi_pohon' => 'required|numeric',
            'deskripsi' => 'required|string|max:255',
        ]);

        // dd($validatedData);

        $affected = Pohon::where('id_pohon', $id_pohon)
                        ->update([
                            'id_sampel' => $validatedData['id_sampel'],
                            'id_lapangan' => $validatedData['id_lapangan'],
                            'tgl_tanam' => $validatedData['tgl_tanam'],
                            'tinggi_pohon' => $validatedData['tinggi_pohon'],
                            'deskripsi' => $validatedData['deskripsi']
                        ]);
        if ($affected) {
            return redirect()->intended('/ketualab')->with('success', 'Data Pohon Berhasil Diupdate');
        } else {
            return redirect()->intended('/ketualab')->with('error', 'Gagal mengupdate data Pohon');
        }
    }

    public function delete_pohon($id_pohon){
        $pohon = Pohon::where('id_pohon', $id_pohon)->first();

        if (!$pohon) {
            return redirect()->back()->with('error', 'Pohon tidak ditemukan.');
        }

        // Hapus bukti kematian dari storage
        if ($pohon->bukti_kematian) {
            $buktiPath = public_path($pohon->bukti_kematian);

            if (File::exists($buktiPath)) {
                File::delete($buktiPath);
            }
        }

        // Hapus record pohon dari database
        $deleted = Pohon::where('id_pohon', $id_pohon)->delete();

        if ($deleted) {
            return redirect()->intended('/ketualab')->with('success', 'Pohon berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus pohon dan bukti kematian.');
        }
    }
}
