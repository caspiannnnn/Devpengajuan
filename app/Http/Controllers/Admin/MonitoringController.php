<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Dosen\ModelInputJudul;

class MonitoringController extends Controller
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
                        ->orderBy('proposal.id', 'DESC')->get();

        return view('page.admin.mahasiswa-judul', ['data' => $data]);
    }

    public function dosen_judul()
    { 
        $data = DB::table('judul_ta')
                        ->join('dosen', 'judul_ta.id_dosen', '=', 'dosen.id')
                        ->orderBy('judul_ta.id', 'DESC')->get();

        return view('page.admin.dosen-input-judul', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form.mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $post = ModelMahasiswa::create($input);
        
        return redirect('/mahasiswa')->with('success','Berhasil menambahkan data.');
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
        $mhs = DB::table('mahasiswa')->where('id', $id)->first();

        // var_dump($dosen);exit();
        
        return view('form.mahasiswa.edit', ['data' => $mhs]);
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
        DB::table('mahasiswa')->where('id', $request->id)->update([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'jenkel' => $request->jenkel,
            'program_studi' => $request->program_studi,
            'fakultas' => $request->fakultas,
        ]);
        return redirect('/mahasiswa')->with('success','Berhasil mengedit data.');
    }
    
    public function delete($id)
    {
        ModelMahasiswa::destroy($id);

        return redirect('/mahasiswa')->with('success','Berhasil menghapus data.');
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
