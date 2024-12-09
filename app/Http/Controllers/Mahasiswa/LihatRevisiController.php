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

class LihatRevisiController extends Controller
{
    public function index()
    {
        $data = DB::table('proposal')
                        ->join('judul_ta', 'judul_ta.id', '=', 'proposal.id_judul')
                        ->join('mahasiswa', 'mahasiswa.nim', '=', 'proposal.nim')
                        ->join('revisi_proposal', 'revisi_proposal.nim', '=', 'proposal.nim')
                        ->where('proposal.nim', '=', auth()->user()->username)
                        ->get();

        // dd($data); exit();
        return view('page.mahasiswa.lihat-revisi.index', ['data' => $data]);
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
        return view('page.mahasiswa.lihat-revisi.revisi', ['data' => $data]);
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

            return redirect('/lihat-revisi');
        }
    }
}
