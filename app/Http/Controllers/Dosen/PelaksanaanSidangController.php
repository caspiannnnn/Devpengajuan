<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Models\Dosen\ModelInputJudul;
use App\Models\Mahasiswa\ModelPilihJudul;
use App\Models\Dosen\ModelRevisi;
use App\Models\Dosen\ModelNilaiPembimbing;
use App\Models\Dosen\ModelNilaiPenguji;

class PelaksanaanSidangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('proposal')
                ->select('file_repo.id as id_repo','proposal.id as id_proposal','judul_ta.judul','mahasiswa.nim','mahasiswa.nama','file_repo.nama as nama_file','file_repo.local_path','proposal.status', 'jadwal_ta.datetime as tanggal_sidang', 'jadwal_ta.jam as jam_sidang')
                ->join('judul_ta', 'judul_ta.id', '=', 'proposal.id_judul')
                ->join('mahasiswa', 'mahasiswa.nim', '=', 'proposal.nim')
                ->join('file_repo', 'proposal.id_repo', '=', 'file_repo.id')
                ->join('revisi_proposal', 'revisi_proposal.nim', '=', 'mahasiswa.nim')
                ->join('jadwal_ta', 'jadwal_ta.nim', '=', 'mahasiswa.nim')
                ->where('revisi_proposal.status_revisi', 'Sidang')
                ->get();

        return view('page.dosen.pelaksanaan-sidang.nilai-pembimbing.index', ['data' => $data]);
    }

    public function edit($id){
        $data = DB::table('proposal')
                        ->select('file_repo.id as id_repo','proposal.id as id_proposal','judul_ta.judul','judul_ta.pbb1 as kode_dosen','judul_ta.kuota as kuota','mahasiswa.nim','mahasiswa.nama','file_repo.nama as nama_file','file_repo.local_path','proposal.status')
                        ->join('judul_ta', 'judul_ta.id', '=', 'proposal.id_judul')
                        ->join('mahasiswa', 'mahasiswa.nim', '=', 'proposal.nim')
                        ->join('file_repo', 'proposal.id_repo', '=', 'file_repo.id')
                        ->join('revisi_proposal', 'revisi_proposal.id_repo', '=', 'file_repo.id')
                        ->where('file_repo.id', $id)
                        ->first();

        return view('page.dosen.pelaksanaan-sidang.lihat-file', ['data' => $data]);
    }

    public function nilai_pembimbing_create($id){
        $mahasiswa = DB::table('mahasiswa')->where('nim', $id)->first();

        return view('page.dosen.pelaksanaan-sidang.nilai-pembimbing.create', ['data'=> $mahasiswa]);
    }

    public function nilai_pembimbing_store(Request $request){
        $validatedData = $request->validate([
            'pbb1' => 'required',
            'pbb2' => 'required',
            'nilai_pbb1' => 'required',
            'nilai_pbb2' => 'required',
            'rata_rata' => 'required',
            'nilai_akhir' => 'required',
        ]);

        $input = ModelNilaiPembimbing::create([
            'nim' => $request->nim,
            'pbb1' => $request->pbb1,
            'pbb2' => $request->pbb2,
            'nilai_pbb1' => $request->nilai_pbb1,
            'nilai_pbb2' => $request->nilai_pbb2,
            'rata_rata' => $request->rata_rata,
            'nilai_akhir' => $request->nilai_akhir
        ]);

        DB::table('revisi_proposal')->where('nim', $request->nim)->update([
            'status_revisi' => 'Penilaian'
        ]);

        return redirect('/pelaksanaan-sidang')->with('success','Berhasil menambahkan data');
    }

    public function penguji_index()
    {
        $data = DB::table('proposal')
                ->select('file_repo.id as id_repo','proposal.id as id_proposal','judul_ta.judul','mahasiswa.nim','mahasiswa.nama','file_repo.nama as nama_file','file_repo.local_path','proposal.status', 'jadwal_ta.datetime as tanggal_sidang', 'jadwal_ta.jam as jam_sidang')
                ->join('judul_ta', 'judul_ta.id', '=', 'proposal.id_judul')
                ->join('mahasiswa', 'mahasiswa.nim', '=', 'proposal.nim')
                ->join('file_repo', 'proposal.id_repo', '=', 'file_repo.id')
                ->join('revisi_proposal', 'revisi_proposal.nim', '=', 'mahasiswa.nim')
                ->join('jadwal_ta', 'jadwal_ta.nim', '=', 'mahasiswa.nim')
                ->where('revisi_proposal.status_revisi', 'Penilaian')
                ->get();

        return view('page.dosen.pelaksanaan-sidang.nilai-penguji.index', ['data' => $data]);
    }

    public function nilai_penguji_create($id){
        $mahasiswa = DB::table('mahasiswa')->where('nim', $id)->first();

        return view('page.dosen.pelaksanaan-sidang.nilai-penguji.create', ['data'=> $mahasiswa]);
    }

    public function nilai_penguji_store(Request $request){

        // return $request;

        $validatedData = $request->validate([
            'penguji_1' => 'required',
            'pemaparan_p1' => 'required',
            'materi_pokok_p1' => 'required',
            'masalah_p1' => 'required',
            'jumlah_p1' => 'required',
            
            'penguji_2' => 'required',
            'pemaparan_p2' => 'required',
            'materi_pokok_p2' => 'required',
            'masalah_p2' => 'required',
            'jumlah_p2' => 'required',
            
            'penguji_3' => 'required',
            'pemaparan_p3' => 'required',
            'materi_pokok_p3' => 'required',
            'masalah_p3' => 'required',
            'jumlah_p3' => 'required',

            'rata_rata' => 'required',
            'nilai_akhir' => 'required',
        ]);

        $input = ModelNilaiPenguji::create([
            'nim' => $request->nim,

            'penguji_1' => $request->penguji_1,
            'pemaparan_p1' => $request->pemaparan_p1,
            'materi_pokok_p1' => $request->materi_pokok_p1,
            'masalah_p1' => $request->masalah_p1,
            'jumlah_p1' => $request->jumlah_p1,

            'penguji_2' => $request->penguji_2,
            'pemaparan_p2' => $request->pemaparan_p2,
            'materi_pokok_p2' => $request->materi_pokok_p2,
            'masalah_p2' => $request->masalah_p2,
            'jumlah_p2' => $request->jumlah_p2,
            
            'penguji_3' => $request->penguji_3,
            'pemaparan_p3' => $request->pemaparan_p3,
            'materi_pokok_p3' => $request->materi_pokok_p3,
            'masalah_p3' => $request->masalah_p3,
            'jumlah_p3' => $request->jumlah_p3,

            'rata_rata' => $request->rata_rata,
            'nilai_akhir' => $request->nilai_akhir
        ]);

        DB::table('revisi_proposal')->where('nim', $request->nim)->update([
            'status_revisi' => 'Lulus'
        ]);
        
        DB::table('proposal')->where('nim', $request->nim)->update([
            'status' => 'Lulus'
        ]);

        return redirect('/penguji')->with('success','Berhasil menambahkan data');
    }
}
