<?php

namespace App\Http\Controllers;

use App\Models\Laboratorium;
use App\Models\Lapangan;
use Illuminate\Http\Request;
use App\Models\Pohon;
use App\Models\Pegawai;
use App\Models\Sampel;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class Admin extends Controller
{
    public function index(){
        $data = Pohon::all();

        return view('admin.dashboard')->with('data', $data);
    }

    public function showpegawai(){
        $data = Pegawai::all();

        return view('admin.data-pegawai')->with('data', $data);
    }

    public function add_pegawai(){
        $data = Laboratorium::all();

        return view('admin.create-data-pegawai')->with('data', $data);
    }

    public function store_pegawai(Request $request){
        $validatedData = $request->validate([
            'nama_pegawai' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'email_pegawai' => 'required|email|unique:pegawais,email_pegawai',
            'no_hp_pegawai' => 'required|numeric',
            'id_lab' => 'required',
        ]);

        $lastPegawai = Pegawai::orderBy('id_pegawai', 'desc')->first();
        if ($lastPegawai) {
            $lastIdNumber = (int) substr($lastPegawai->id_pegawai, 3);
            $newIdNumber = $lastIdNumber + 1;
        } else {
            $newIdNumber = 1;
        }

        $newIdPegawai = 'PL-' . str_pad($newIdNumber, 3, '0', STR_PAD_LEFT);

        $validatedData['id_pegawai'] = $newIdPegawai;
        // dd($validatedData);
        Pegawai::create($validatedData);
        $updatelab = DB::table('pegawais')
                    ->where('id_lab', $validatedData['id_lab'])
                    ->count();
        Laboratorium::where('id_lab', $validatedData['id_lab'])
                    ->update([
                        'jumlah_pegawai' => $updatelab,
                        ]);
        return redirect()->intended('pegawai/admin')->with('success', 'Data Pegawai Baru Berhasil Dibuat!');
    }

    public function edit_pegawai($id_pegawai){
        $pegawai = Pegawai::where('id_pegawai', $id_pegawai)->first();

        if (!$pegawai) {
            return redirect()->intended('pegawai/admin')->with('error', 'Pegawai not found');
        }
    
        $labs = Laboratorium::all(); // Asumsi bahwa Anda memiliki model Lab dan ingin menampilkan semua lab di dropdown
        return view('admin.edit-data-pegawai', compact('pegawai', 'labs'));
    }
    
    public function update_pegawai(Request $request, $id_pegawai)
    {
        // Validasi data yang dikirim dari form
        $validatedData = $request->validate([
            'nama_pegawai' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'id_lab' => 'required',
            'email_pegawai' => 'required|email',
            'no_hp_pegawai' => 'required|numeric',
        ]);

        // dd($validatedData);
        $affected = Pegawai::where('id_pegawai', $id_pegawai)
                       ->update([
                           'nama_pegawai' => $validatedData['nama_pegawai'],
                           'jenis_kelamin' => $validatedData['jenis_kelamin'],
                           'id_lab' => $validatedData['id_lab'],
                           'email_pegawai' => $validatedData['email_pegawai'],
                           'no_hp_pegawai' => $validatedData['no_hp_pegawai'],
                       ]);

        if ($affected) {
            return redirect()->intended('pegawai/admin')->with('success', 'Data Pegawai Berhasil Diupdate');
        } else {
            return redirect()->intended('pegawai/admin')->with('error', 'Gagal mengupdate data Pegawai');
        }
    }

    public function destroy_pegawai($id_pegawai)
    {
        $deleted = Pegawai::where('id_pegawai', $id_pegawai)->delete();

        if ($deleted) {
            return redirect()->intended('pegawai/admin')->with('success', 'Pegawai deleted successfully');
        }

        return redirect()->route('pegawai-admin')->with('error', 'Pegawai not found');
    }

    public function showlab(){
        $data = Laboratorium::all();

        return view('admin.data-laboratorium')->with('data', $data);
    }

    public function add_lab(){
        return view('admin.create-data-laboratorium');
    }

    public function store_laboratorium(Request $request){
        $validatedData = $request->validate([
            'nama_lab' => 'required',
            'kapasitas' => 'required|integer',
        ]);
        $lastLab = Laboratorium::orderBy('id_lab', 'desc')->first();
        if ($lastLab) {
            $lastIdNumber = (int) substr($lastLab->id_lab, 2);
            $newIdNumber = $lastIdNumber + 1;
        } else {
            $newIdNumber = 1;
        }
        $newIdLab = 'S-' . str_pad($newIdNumber, 3, '0', STR_PAD_LEFT);
        $validatedData['id_lab'] = $newIdLab;
        $validatedData['jumlah_pegawai'] = DB::table('pegawais')
                                             ->where('id_lab', $validatedData['id_lab'])
                                             ->count();
        // dd($validatedData);
        Laboratorium::create($validatedData);
        return redirect()->intended('laboratorium/admin')->with('success', 'Data Laboratorium Baru Berhasil Dibuat!');
    }

    public function edit_lab($id_lab){
        $labs = Laboratorium::where('id_lab', $id_lab)->first();

        if (!$labs) {
            return redirect()->intended('laboratorium/admin')->with('error', 'Laboratorium not found');
        }

        return view('admin.edit-data-laboratorium', compact('labs'));
    }

    public function update_lab(Request $request, $id_lab)
    {
        // Validasi data yang dikirim dari form
        $validatedData = $request->validate([
            'nama_lab' => 'required|string|max:255',
            'kapasitas' => 'required|integer',
            ]);

        // dd($validatedData);
        $affected = Laboratorium::where('id_lab', $id_lab)
                       ->update([
                           'nama_lab' => $validatedData['nama_lab'],
                           'kapasitas' => $validatedData['kapasitas'],
                           ]);

        if ($affected) {
            return redirect()->intended('laboratorium/admin')->with('success', 'Data Laboratorium Berhasil Diupdate');
        } else {
            return redirect()->intended('laboratorium/admin')->with('error', 'Gagal mengupdate data Laboratorium');
        }
    }

    public function destroy_lab($id_lab)
    {
        $deleted = Laboratorium::where('id_lab', $id_lab)->delete();

        if ($deleted) {
            return redirect()->intended('laboratorium/admin')->with('success', 'Laboratorium deleted successfully');
        }

        return redirect()->intended('laboratorium/admin')->with('error', 'Pegawai not found');
    }

    public function showlapangan(){
        $data = Lapangan::all();

        return view('admin.data-lapangan')->with('data', $data);
    }

    public function add_lapangan(){
        return view('admin.create-data-lapangan');
    }

    public function store_lapangan(Request $request)
    {
        $validatedData = $request->validate([
            'luas' => 'required|numeric',
            'lokasi' => 'required|string',
            'kondisi_tanah' => 'required|string',
        ]);

        $lastLapangan = Lapangan::orderBy('id_lapangan', 'desc')->first();
        if ($lastLapangan) {
            $lastIdNumber = (int) substr($lastLapangan->id_lapangan, 3);
            $newIdNumber = $lastIdNumber + 1;
        } else {
            $newIdNumber = 1;
        }

        $newIdLapangan = 'LP-' . str_pad($newIdNumber, 3, '0', STR_PAD_LEFT);

        $validatedData['id_lapangan'] = $newIdLapangan;
        $validatedData['created_at'] = now();
        $validatedData['updated_at'] = now();

        // dd($validatedData);
        Lapangan::create($validatedData);

        return redirect()->intended('lapangan/admin')->with('success', 'Data lapangan berhasil disimpan!');
    }

    public function edit_lapangan($id_lapangan){
        $lapangan = Lapangan::where('id_lapangan', $id_lapangan)->first();

        if (!$lapangan) {
            return redirect()->intended('lapangan/admin')->with('error', 'Lapangan not found');
        }

        return view('admin.edit-data-lapangan', compact('lapangan'));
    }

    public function update_lapangan(Request $request, $id_lapangan)
    {
        // Validasi data yang dikirim dari form
        $validatedData = $request->validate([
            'luas' => 'required|numeric',
            'lokasi' => 'required|string',
            'kondisi_tanah' => 'required|string',
        ]);

        // dd($validatedData);
        $affected = Lapangan::where('id_lapangan', $id_lapangan)
                       ->update([
                           'luas' => $validatedData['luas'],
                           'lokasi' => $validatedData['lokasi'],
                           'kondisi_tanah' => $validatedData['kondisi_tanah'],
                           ]);

        if ($affected) {
            return redirect()->intended('lapangan/admin')->with('success', 'Data Lapangan Berhasil Diupdate');
        } else {
            return redirect()->intended('lapangan/admin')->with('error', 'Gagal mengupdate data Lapangan');
        }
    }

    public function destroy_lapangan($id_lapangan)
    {
        $deleted = Lapangan::where('id_lapangan', $id_lapangan)->delete();

        if ($deleted) {
            return redirect()->intended('lapangan/admin')->with('success', 'Lapangan deleted successfully');
        }

        return redirect()->intended('lapangan/admin')->with('error', 'Lapangan not found');
    }

    public function showsampel(){
        $data = Sampel::all();

        return view('admin.data-sampel')->with('data', $data);
    }

    public function add_sampel(){
        $data = Laboratorium::all();
        return view('admin.create-data-sampel')->with('data', $data);
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

        return redirect()->intended('sampel/admin')->with('success', 'Data sampel berhasil disimpan!');
    }

    public function edit_sampel($id_sampel){
        $sampel = Sampel::where('id_sampel', $id_sampel)->first();

        if (!$sampel) {
            return redirect()->intended('pegawai/admin')->with('error', 'Pegawai not found');
        }
    
        $labs = Laboratorium::all(); // Asumsi bahwa Anda memiliki model Lab dan ingin menampilkan semua lab di dropdown
        return view('admin.edit-data-sampel', compact('sampel', 'labs'));
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
            return redirect()->intended('sampel/admin')->with('success', 'Data Sampel Berhasil Diupdate');
        } else {
            return redirect()->intended('sampel/admin')->with('error', 'Gagal mengupdate data Sampel');
        }
    }

    public function destroy_sampel($id_sampel)
    {
        $deleted = Sampel::where('id_sampel', $id_sampel)->delete();

        if ($deleted) {
            return redirect()->intended('sampel/admin')->with('success', 'Data sampel berhasil dihapus!');
        }
        return redirect()->intended('sampel/admin')->with('error', 'Lapangan not found');
    }



    public function showuser(){
        $data = User::all();

        return view('admin.data-user')->with('data', $data);
    }

    public function add_user(){
        $userPegawaiIds = User::pluck('id_pegawai');
        $data = Pegawai::whereNotIn('id_pegawai', $userPegawaiIds)->get();

        return view('admin.create-data-user')->with('data', $data);
    }

    public function store_user(Request $request)
    {
        $validatedData = $request->validate([
            'id_pegawai' => 'required',
            'password' => 'required',
            'level' => 'required|integer'
        ]);

        $validatedData['username'] = str_replace('-', '', $validatedData['id_pegawai']);
        
        // Menggunakan bcrypt() untuk meng-hash password
        $validatedData['password'] = bcrypt($validatedData['password']);
        
        // dd($validatedData); 
        
        User::create($validatedData);
        return redirect()->intended('user/admin')->with('success', 'Data Pengguna Baru Berhasil Dibuat!');
    }

    public function edit_user($id_user){
        $user = User::where('id', $id_user)->first();

        if (!$user) {
            return redirect()->intended('user/admin')->with('error', 'user not found');
        }

        return view('admin.edit-data-user', compact('user'));
    }

    public function update_user(Request $request, $id_user){
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'nullable',
            'level' => 'required'
        ]);

        if(!empty($validatedData['password'])){
            $validatedData['password'] = bcrypt($validatedData['password']);
        }else {
            
            unset($validatedData['password']);
        }

        // dd($validatedData);
        User::where('id', $id_user)->update($validatedData);
        return redirect()->intended('user/admin')->with('success', 'Data Pengguna Berhasil Diubah!');
    }

    public function destroy_user($id_user){
        $deleted = User::where('id', $id_user)->delete();

        if ($deleted) {
            return redirect()->intended('user/admin')->with('success', 'User deleted successfully');
        }

        return redirect()->intended('user/admin')->with('error', 'User not found');
    }
}
