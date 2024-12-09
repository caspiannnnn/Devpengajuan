<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use File;
use Storage;
use Carbon\Carbon;

use App\Models\Dosen\ModelInputJudul;
use App\Models\Mahasiswa\ModelPilihJudul;
use App\Models\Mahasiswa\ModelFileRepo;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('proposal')
                        ->join('judul_ta', 'judul_ta.id', '=', 'proposal.id_judul')
                        ->join('mahasiswa', 'mahasiswa.nim', '=', 'proposal.nim')
                        ->join('revisi_proposal', 'revisi_proposal.nim', '=', 'proposal.nim')
                        ->where('proposal.nim', '=', auth()->user()->username)
                        ->get();

        $jadwal = DB::table('proposal')
                ->join('jadwal_ta', 'jadwal_ta.nim', '=', 'proposal.nim')
                ->where('proposal.nim', '=', auth()->user()->username)
                ->first();

        $data_jadwal="";
        if(!empty($jadwal)){
            $data_jadwal = ([
                'tanggal_sidang' => Carbon::parse($jadwal->datetime)->translatedFormat('d F Y'),
                'jam_sidang' => $jadwal->jam
            ]);
            return view('page.mahasiswa.status.index', ['data' => $data, 'data_jadwal'=>$data_jadwal]);
        }

        // dd($data_jadwal); exit();
        return view('page.mahasiswa.status.index', ['data' => $data, 'data_jadwal'=>$data_jadwal]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data = DB::table('mahasiswa')->where('nim', auth()->user()->username)->first();
        $data = DB::table('proposal')
                        ->join('judul_ta', 'judul_ta.id', '=', 'proposal.id_judul')
                        ->join('mahasiswa', 'mahasiswa.nim', '=', 'proposal.nim')
                        ->where('mahasiswa.nim', auth()->user()->username)
                        ->first();

        return view('page.mahasiswa.status.create', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = DB::table('proposal')
                        ->join('judul_ta', 'judul_ta.id', '=', 'proposal.id_judul')
                        ->join('mahasiswa', 'mahasiswa.nim', '=', 'proposal.nim')
                        ->where('mahasiswa.nim', auth()->user()->username)
                        ->first();

        $validatedData = $request->validate([
            'upload_file' => 'required|mimes:pdf|file|max:2048',
        ]);

        $file = $request->file('upload_file');

        if($file){
            $filename = $data->nim."-".$data->nama."-".$file->getClientOriginalName();
            $request->file('upload_file')->storeAs('repo', $filename);
            $Savefile = ModelFileRepo::create([
                'nama' => $filename,
                'local_path' => 'storage/repo/'.$filename,
            ]);

            DB::table('proposal')->where('nim', auth()->user()->username)->update([
                'id_repo' => $Savefile->id
            ]);

            DB::table('revisi_proposal')->where('nim', auth()->user()->username)->update([
                'revisi_ke' => 0,
                'status_revisi' => 'Tinjau',
                'nim' => auth()->user()->username,
                'id_repo' => $Savefile->id
            ]);

            return redirect('/status');
        }
        // $orignal_filename = time().$file->getClientOriginalName();
        // return $orignal_filename;

    }

    public function revisi($id){
        $data = DB::table('proposal')
                        ->select('file_repo.id as id_repo','proposal.id as id_proposal','revisi_proposal.id as id_revisi_proposal','revisi_proposal.revisi_text','judul_ta.judul','judul_ta.pbb1 as kode_dosen','judul_ta.kuota as kuota','file_repo.nama as nama_file','file_repo.local_path','proposal.status')
                        ->join('judul_ta', 'proposal.id_judul', '=', 'judul_ta.id')
                        ->join('file_repo', 'file_repo.id', '=', 'proposal.id_repo')
                        ->join('revisi_proposal', 'revisi_proposal.id_repo', '=', 'file_repo.id')
                        ->where('proposal.nim', $id)
                        ->where('revisi_proposal.status_revisi', 'Belum')
                        ->first();
        return view('page.mahasiswa.status.revisi', ['data' => $data]);
    }

    public function save(Request $request){

        $data = DB::table('proposal')
                        ->join('judul_ta', 'judul_ta.id', '=', 'proposal.id_judul')
                        ->join('mahasiswa', 'mahasiswa.nim', '=', 'proposal.nim')
                        ->where('mahasiswa.nim', auth()->user()->username)
                        ->first();

        $validatedData = $request->validate([
            'upload_file' => 'required|mimes:pdf|file|max:2048',
        ]);

        // if(Storage::exists($request->file_path)){
        //     // Storage::delete($request->file_path);
        //     return "ada";
        //     /*
        //         Delete Multiple File like this way
        //         Storage::delete(['upload/test.png', 'upload/test2.png']);
        //     */
        // }else{
            //     return "Gaada";
            // }
        if(asset($request->file_path)){
            // unlink($request->file_path);
            unlink(public_path($request->file_path));
        }else{
            return "Gaada";
        }

        $file = $request->file('upload_file');


        if($file){
            $filename = $data->nim."-".$data->nama."-".$file->getClientOriginalName();
            $request->file('upload_file')->storeAs('repo', $filename);
            DB::table('file_repo')->where('id', $request->id_repo)->update([
                'nama' => $filename,
                'local_path' => 'storage/repo/'.$filename,
            ]);

            DB::table('proposal')->where('nim', auth()->user()->username)->update([
                'status' => 'Revisi'
            ]);

            DB::table('revisi_proposal')->where('nim', auth()->user()->username)->update([
                'status_revisi' => 'Tinjau'
            ]);

            return redirect('/status');
        }
    }

    public function hasil_sidang_mahasiswa()
    {
        $data = DB::table('proposal')
                        ->select('file_repo.id as id_repo','proposal.id as id_proposal','judul_ta.judul','mahasiswa.nim','mahasiswa.nama','file_repo.nama as nama_file','file_repo.local_path','proposal.status', 'jadwal_ta.datetime as tanggal_sidang', 'jadwal_ta.jam as jam_sidang')
                        ->join('judul_ta', 'judul_ta.id', '=', 'proposal.id_judul')
                        ->join('mahasiswa', 'mahasiswa.nim', '=', 'proposal.nim')
                        ->join('file_repo', 'proposal.id_repo', '=', 'file_repo.id')
                        ->join('revisi_proposal', 'revisi_proposal.nim', '=', 'mahasiswa.nim')
                        ->join('jadwal_ta', 'jadwal_ta.nim', '=', 'mahasiswa.nim')
                        ->where('revisi_proposal.status_revisi', 'Lulus')
                        ->where('mahasiswa.nim', auth()->user()->username)
                        ->get();
                        
                        return view('page.mahasiswa.hasil-sidang.index', ['data' => $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    public function delete($id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
