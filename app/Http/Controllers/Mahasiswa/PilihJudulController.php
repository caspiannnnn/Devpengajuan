<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\Dosen\ModelInputJudul;
use App\Models\Mahasiswa\ModelPilihJudul;
use App\Models\Dosen\ModelRevisi;

class PilihJudulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $judul = ModelInputJudul::all()->sortByDesc("id");

        // Cek apakah mahasiswa sudah mengajukan judul
        $proposal = DB::table('proposal')->where('nim', auth()->user()->username)->first();
        
        return view('page.mahasiswa.input-judul.index', ['data' => $judul, 'proposal' => $proposal]);
    }

    public function pilih_judul(Request $request)
    {
        $data = DB::table('judul_ta')->where('id', $request->id)->first();
        
        //Cek apa mahasiswa sudah ambil judul
        $proposal = DB::table('proposal')->where('id_judul', $request->id )->where('nim', auth()->user()->username )->first();
        
        if(!$proposal){
            $inputjudul = ModelPilihJudul::Create([
                'id_judul' => $request->id,
                'nim' => auth()->user()->username,
                'waktu_pengajuan' => Carbon::now(),
                'status' => 'Pengajuan',
            ]);

            $inputrevisi_proposal = ModelRevisi::Create([
                'revisi_ke' => 0,
                'status_revisi' => 'Tinjau',
                'nim' => auth()->user()->username,
            ]);

            echo json_encode('Berhasil memilih judul');
        }
        else{
            echo json_encode('Anda sudah memilih judul ini');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
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
