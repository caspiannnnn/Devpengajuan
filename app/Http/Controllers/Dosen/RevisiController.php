<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Models\Dosen\ModelInputJudul;
use App\Models\Mahasiswa\ModelPilihJudul;
use App\Models\Dosen\ModelRevisi;

class RevisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('proposal')
                        ->select('file_repo.id as id_repo','proposal.id as id_proposal','judul_ta.judul','mahasiswa.nim','mahasiswa.nama','file_repo.nama as nama_file','file_repo.local_path','proposal.status')
                        ->join('judul_ta', 'judul_ta.id', '=', 'proposal.id_judul')
                        ->join('mahasiswa', 'mahasiswa.nim', '=', 'proposal.nim')
                        ->join('file_repo', 'proposal.id_repo', '=', 'file_repo.id')
                        ->join('revisi_proposal', 'revisi_proposal.nim', '=', 'mahasiswa.nim')
                        ->where('proposal.approve_by', auth()->user()->username)
                        ->where('revisi_proposal.status_revisi', 'Tinjau')
                        ->get();

        return view('page.dosen.revisi.index', ['data' => $data]);
    }

    public function lihat_revisi($id){

        $data = DB::table('proposal')
                        ->select('file_repo.id as id_repo','proposal.id as id_proposal','judul_ta.judul','judul_ta.pbb1 as kode_dosen','judul_ta.kuota as kuota','mahasiswa.nim','mahasiswa.nama','file_repo.nama as nama_file','file_repo.local_path','proposal.status')
                        ->join('judul_ta', 'judul_ta.id', '=', 'proposal.id_judul')
                        ->join('mahasiswa', 'mahasiswa.nim', '=', 'proposal.nim')
                        ->join('file_repo', 'proposal.id_repo', '=', 'file_repo.id')
                        ->join('revisi_proposal', 'revisi_proposal.id_repo', '=', 'file_repo.id')
                        ->where('file_repo.id', $id)
                        ->first();

        // dd($data);

        return view('page.dosen.revisi.lihat-file', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('page.dosen.input-judul.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data_revisi = DB::table('revisi_proposal')->where('nim', $request->input('nim'))->count();

        $validatedData = $request->validate([
            'revisi_text' => 'required',
        ]);

        DB::table('revisi_proposal')->where('nim', $request->input('nim'))->update([
            'revisi_text' => $request->input('revisi_text'),
            'revisi_ke' => $data_revisi+1,
            'status_revisi' => 'Belum',
            'nim' => $request->input('nim'),
            'revisi_by' => auth()->user()->username,
            'id_repo' => $request->input('id_repo'),
        ]);

        DB::table('proposal')->where('nim', $request->input('nim'))->update([
            'status' => 'Revisi',
        ]);

        return redirect('/revisi')->with('success','Berhasil menambahkan data');
    }

    public function setuju_revisi(Request $request){
        $data_revisi = DB::table('revisi_proposal')->where('nim', $request->nim)->count();
        
        DB::table('revisi_proposal')->where('nim', $request->nim)->update([
            'revisi_ke' => $data_revisi+1,
            'status_revisi' => 'Selesai',
            'revisi_by' => auth()->user()->username
        ]);

        DB::table('proposal')->where('nim', $request->nim)->update([
            'status' => 'Selesai',
        ]);
        echo json_encode("Berhasil menambahkan data");
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
