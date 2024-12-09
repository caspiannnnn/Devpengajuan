<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Models\Dosen\ModelInputJudul;
use App\Models\Mahasiswa\ModelPilihJudul;

class StatusJudulController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $approve_judul = DB::table('proposal')->where('approve_by', 'NULL')->first();
        $belum_approve_judul = DB::table('proposal')
                        ->join('judul_ta', 'judul_ta.id', '=', 'proposal.id_judul')
                        ->join('mahasiswa', 'mahasiswa.nim', '=', 'proposal.nim')
                        ->where('proposal.approve_by', '=', NULL)
                        ->get();
        
        $approve_judul = DB::table('proposal')
                        ->join('judul_ta', 'judul_ta.id', '=', 'proposal.id_judul')
                        ->join('mahasiswa', 'mahasiswa.nim', '=', 'proposal.nim')
                        ->where('proposal.approve_by', '!=', NULL)
                        ->get();

        // dd($approve_judul); exit();
        return view('page.dosen.status-judul.index', ['data_belum_setuju' => $belum_approve_judul,'data_setuju' => $approve_judul]);
    }

    public function approve_judul(Request $request)
    {
        $data = DB::table('judul_ta')->where('id', $request->id)->first();
        $kuota_belum = DB::table('proposal')->where('id_judul', $request->id)->where('approve_by', '=', NULL)->count();
        $kuota_ada = DB::table('proposal')->where('id_judul', $request->id)->where('approve_by', '!=', NULL)->count();
        $kuotas = DB::table('proposal')->where('id_judul', $request->id)->first();

        
        //Cek Kuota Judul
        if($kuota_ada>=($data->kuota)){
            $msg =[
                'penuh' => 1,
                'kuota_penuh' => 'Kuota sudah terpenuhi',
            ];
            echo json_encode($msg);
        }
        else{
            // DB::table('proposal')->where('id', $kuotas->id)->update([
            //     'approve_by' => auth()->user()->username,
            //     'status' => 'Disetujui',
            // ]);
            DB::table('proposal')->where('nim', $request->nim)->update([
                'approve_by' => auth()->user()->username,
                'status' => 'Disetujui',
            ]);
            $msg =[
                'tidak_penuh' => 1,
                'setujui' => 'Judul disetujui'
            ];
            echo json_encode($msg);
        }
    }

    public function unapprove_judul(Request $request)
    {
            DB::table('proposal')->where('nim', $request->id)->delete();
            
            $msg =[
                'status' => 1,
                'msg' => 'Judul tidak disetujui'
            ];
            echo json_encode($msg);
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
