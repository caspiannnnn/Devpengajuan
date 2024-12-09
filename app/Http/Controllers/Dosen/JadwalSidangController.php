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
use App\Models\Dosen\ModelJadwalSidang;

use Carbon\Carbon;
use PDF;

class JadwalSidangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('proposal')
                        ->select('file_repo.id as id_repo','proposal.id as id_proposal','judul_ta.judul','mahasiswa.nim','mahasiswa.nama','mahasiswa.program_studi','mahasiswa.fakultas','file_repo.nama as nama_file','proposal.status')
                        ->join('judul_ta', 'judul_ta.id', '=', 'proposal.id_judul')
                        ->join('mahasiswa', 'mahasiswa.nim', '=', 'proposal.nim')
                        ->join('file_repo', 'proposal.id_repo', '=', 'file_repo.id')
                        ->join('revisi_proposal', 'revisi_proposal.nim', '=', 'mahasiswa.nim')
                        ->where('revisi_proposal.status_revisi', 'Selesai')
                        ->get();

        return view('page.dosen.pelaksanaan-sidang.jadwal-sidang.index', ['data' => $data]);
    }

    public function create($id){
        $data = DB::table('proposal')
                ->select('file_repo.id as id_repo','proposal.id as id_proposal','judul_ta.judul','mahasiswa.nim','mahasiswa.nama','mahasiswa.program_studi','mahasiswa.fakultas','file_repo.nama as nama_file','proposal.status')
                ->join('judul_ta', 'judul_ta.id', '=', 'proposal.id_judul')
                ->join('mahasiswa', 'mahasiswa.nim', '=', 'proposal.nim')
                ->join('file_repo', 'proposal.id_repo', '=', 'file_repo.id')
                ->join('revisi_proposal', 'revisi_proposal.nim', '=', 'mahasiswa.nim')
                ->where('revisi_proposal.status_revisi', 'Selesai')
                ->where('mahasiswa.nim', $id)
                ->first();

        // dd($data);

        return view('page.dosen.pelaksanaan-sidang.jadwal-sidang.create', ['data' => $data]);
    }

    public function store(Request $request){
        
        $validatedData = $request->validate([
            'tanggal_sidang' => 'required',
            'jam_sidang' => 'required',
        ]);

        $input = ModelJadwalSidang::create([
            'nim' => $request->nim,
            'datetime' => $request->tanggal_sidang,
            'jam' => $request->jam_sidang,
        ]);

        DB::table('revisi_proposal')->where('nim', $request->nim)->update([
            'status_revisi' => 'Sidang'
        ]);
        
        DB::table('proposal')->where('nim', $request->nim)->update([
            'status' => 'Sidang'
        ]);

        return redirect('/jadwal-sidang')->with('success','Berhasil menambahkan data');

    }

    public function lihat_jadwal_sidang()
    {
        $data = DB::table('proposal')
                        ->select('file_repo.id as id_repo','proposal.id as id_proposal','judul_ta.judul','mahasiswa.nim','mahasiswa.nama','file_repo.nama as nama_file','file_repo.local_path','proposal.status', 'jadwal_ta.datetime as tanggal_sidang', 'jadwal_ta.jam as jam_sidang')
                        ->join('judul_ta', 'judul_ta.id', '=', 'proposal.id_judul')
                        ->join('mahasiswa', 'mahasiswa.nim', '=', 'proposal.nim')
                        ->join('file_repo', 'proposal.id_repo', '=', 'file_repo.id')
                        ->join('revisi_proposal', 'revisi_proposal.nim', '=', 'mahasiswa.nim')
                        ->join('jadwal_ta', 'jadwal_ta.nim', '=', 'mahasiswa.nim')
                        ->where('revisi_proposal.status_revisi', 'Sidang')
                        ->orderBy('jadwal_ta.datetime', 'ASC')
                        ->orderBy('jadwal_ta.jam', 'ASC')
                        ->get();

        return view('page.dosen.pelaksanaan-sidang.jadwal-sidang.lihat-jadwal', ['data' => $data]);
    }
    
    public function lihat_hasil_sidang()
    {
        $data = DB::table('proposal')
                        ->select('file_repo.id as id_repo','proposal.id as id_proposal','judul_ta.judul','mahasiswa.nim','mahasiswa.nama','file_repo.nama as nama_file','file_repo.local_path','proposal.status', 'jadwal_ta.datetime as tanggal_sidang', 'jadwal_ta.jam as jam_sidang')
                        ->join('judul_ta', 'judul_ta.id', '=', 'proposal.id_judul')
                        ->join('mahasiswa', 'mahasiswa.nim', '=', 'proposal.nim')
                        ->join('file_repo', 'proposal.id_repo', '=', 'file_repo.id')
                        ->join('revisi_proposal', 'revisi_proposal.nim', '=', 'mahasiswa.nim')
                        ->join('jadwal_ta', 'jadwal_ta.nim', '=', 'mahasiswa.nim')
                        ->where('revisi_proposal.status_revisi', 'Lulus')
                        ->orderBy('jadwal_ta.datetime', 'ASC')
                        ->orderBy('jadwal_ta.jam', 'ASC')
                        ->get();
                        
                        return view('page.dosen.pelaksanaan-sidang.hasil-sidang.index', ['data' => $data]);
    }
                    
    public function cetak_hasil_sidang($id)
    {
        $nilai_penguji =  DB::table('mahasiswa')
                    ->join('nilai_penguji', 'nilai_penguji.nim', '=', 'mahasiswa.nim')
                    ->where('mahasiswa.nim','=', $id)
                    ->first();
        
        $nilai_pembimbing =  DB::table('mahasiswa')
                    ->join('nilai_pembimbing', 'nilai_pembimbing.nim', '=', 'mahasiswa.nim')
                    ->where('mahasiswa.nim','=', $id)
                    ->first();

        $jadwal_sidang =  DB::table('mahasiswa')
                            ->join('jadwal_ta', 'jadwal_ta.nim', '=', 'mahasiswa.nim')  
                            ->where('mahasiswa.nim','=', $id)                  
                            ->first();
        
        $data_judul = DB::table('proposal')
                        ->join('judul_ta', 'judul_ta.id', '=', 'proposal.id_judul')
                        ->where('proposal.nim','=', $id)
                        ->first();

        $data = ([
            'nim' => $nilai_penguji->nim,
            'nama' => $nilai_penguji->nama,
            'program_studi' => $nilai_penguji->program_studi,
            'fakultas' => $nilai_penguji->fakultas,

            'pbb1' => $nilai_pembimbing->pbb1,
            'pbb2' => $nilai_pembimbing->pbb2,
            'nilai_pbb1' => $nilai_pembimbing->nilai_pbb1,
            'nilai_pbb2' => $nilai_pembimbing->nilai_pbb2,
            'nilai_rata_pbb' => $nilai_pembimbing->rata_rata,
            'nilai_akhir_pbb' => $nilai_pembimbing->nilai_akhir,
            
            'penguji_1' => $nilai_penguji->penguji_1,
            'penguji_2' => $nilai_penguji->penguji_2,
            'penguji_3' => $nilai_penguji->penguji_3,
            'pemaparan_p1' => $nilai_penguji->pemaparan_p1,
            'pemaparan_p2' => $nilai_penguji->pemaparan_p2,
            'pemaparan_p3' => $nilai_penguji->pemaparan_p3,
            'materi_pokok_p1' => $nilai_penguji->materi_pokok_p1,
            'materi_pokok_p2' => $nilai_penguji->materi_pokok_p2,
            'materi_pokok_p3' => $nilai_penguji->materi_pokok_p3,
            'masalah_p1' => $nilai_penguji->masalah_p1,
            'masalah_p2' => $nilai_penguji->masalah_p2,
            'masalah_p3' => $nilai_penguji->masalah_p3,
            'jumlah_p1' => $nilai_penguji->jumlah_p1,
            'jumlah_p2' => $nilai_penguji->jumlah_p2,
            'jumlah_p3' => $nilai_penguji->jumlah_p3,
            'rata_rata_penguji' => $nilai_penguji->rata_rata,
            'nilai_akhir_penguji' => $nilai_penguji->nilai_akhir,
            
            'total_nilai_bimbingan_sidang' => $nilai_penguji->nilai_akhir+$nilai_pembimbing->nilai_akhir,

            'datetime' => $jadwal_sidang->datetime,
            'hari' => Carbon::parse($jadwal_sidang->datetime)->translatedFormat('l'),
            'tanggal' => Carbon::parse($jadwal_sidang->datetime)->translatedFormat('d'),
            'bulan' => Carbon::parse($jadwal_sidang->datetime)->translatedFormat('F'),
            'tahun' => Carbon::parse($jadwal_sidang->datetime)->translatedFormat('Y'),
            'jam' => $jadwal_sidang->jam,

            'tanggal_hari_ini' =>Carbon::today()->translatedFormat('d F Y'),

        ]);

        // return $data;
        return view('page.dosen.pelaksanaan-sidang.hasil-sidang.cetak',['data'=>$data, 'data_judul'=>$data_judul]);

        // $pdf = PDF::loadview('page.dosen.pelaksanaan-sidang.hasil-sidang.cetak',['data'=>$data, 'data_judul'=>$data_judul]);
	    // return $pdf->download('hasil-sidang-pdf');
    }
}
