<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jadwal;
use App\Models\MataKuliah;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    //
    function index() {
        $jadwal = Jadwal::query()->with('dosen')->with('ruangan')->with('matkul')->get();
        return view('jadwal', ['data' => $jadwal]);
        // return response()->json(['data' => $jadwal]);
    }

    function add_view() {
        $id = "JD-00". Jadwal::query()->get()->count() + 1;
        $matkul = MataKuliah::all();
        $dosen = Dosen::all();
        $ruangan = Ruangan::all();
        return view('add', ['matkul' => $matkul, 'dosen' => $dosen, 'ruangan' => $ruangan, 'id' => $id]);
    }

    function update_view($id) {
        $jadwal = Jadwal::find($id);
        $cur_matkul = MataKuliah::find($jadwal->mata_kuliah_id);
        $cur_dosen = Dosen::find($jadwal->dosen_id);
        $cur_ruangan = Ruangan::find($jadwal->ruangan_id);
        $matkul = MataKuliah::all();
        $dosen = Dosen::all();
        $ruangan = Ruangan::all();
        return view('edit', ['jadwal' => $jadwal, 'matkul' => $matkul, 'dosen' => $dosen, 'ruangan' => $ruangan, 'cur_matkul' => $cur_matkul, 'cur_dosen' => $cur_dosen, 'cur_ruangan' => $cur_ruangan]);
    }

    function add(Request $req) {
        $data = $req->all();
        $jadwal = new Jadwal();

        // date (yyyy-mm-dd)
        $date = $data['tahun'].'-'.$data['bulan'].'-'.$data['tanggal'];

        $jadwal->id = $data['id'];
        $jadwal->mata_kuliah_id = $data['mata_kuliah_id'];
        $jadwal->dosen_id = $data['dosen_id'];
        $jadwal->ruangan_id = $data['ruangan_id'];
        $jadwal->tanggal = $date;
        $jadwal->jam_mulai = $data['jam_mulai'];
        $jadwal->jam_selesai = $data['jam_selesai'];

        $jadwal->save();

        return redirect('/jadwal')->with(['success' => 'Jadwal Added']);
    }

    function edit(Request $req) {
         $data = $req->all();
        $jadwal = Jadwal::find($data['id']);

        // date (yyyy-mm-dd)
        $date = $data['tahun'].'-'.$data['bulan'].'-'.$data['tanggal'];
        $jadwal->mata_kuliah_id = $data['mata_kuliah_id'];
        $jadwal->dosen_id = $data['dosen_id'];
        $jadwal->ruangan_id = $data['ruangan_id'];
        $jadwal->tanggal = $date ?? $jadwal->tanggal;
        $jadwal->jam_mulai = $data['jam_mulai'];
        $jadwal->jam_selesai = $data['jam_selesai'];

        $jadwal->save();

        return redirect('/jadwal')->with(['success' => 'Jadwal Updated']);
    }

    function destroy($id) {
        $jadwal = Jadwal::find($id);
        $jadwal->delete();
        return redirect('/jadwal')->with(['success' => 'Jadwal Deleted']);
    }
}
