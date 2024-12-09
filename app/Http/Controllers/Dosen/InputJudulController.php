<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Models\Dosen\ModelInputJudul;
class InputJudulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $judul = ModelInputJudul::all()->sortByDesc("id");

        // dd($judul); exit();
        return view('page.dosen.input-judul.index', ['data' => $judul]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.dosen.input-judul.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_dosen = DB::table('dosen')->where('no_induk', auth()->user()->username)->first();

        $validatedData = $request->validate([
            'judul' => 'required',
            'pbb1' => 'required',
            'kuota' => 'required|numeric',
        ]);

        $inputjudul = ModelInputJudul::create([
            'judul' => $request->input('judul'),
            'pbb1' => $request->input('pbb1'),
            'kuota' => $request->input('kuota'),
            'id_dosen' => $id_dosen->id
        ]);

        return redirect('/input-judul')->with('success','Berhasil menambahkan judul');
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
        $data = DB::table('judul_ta')->where('id', $id)->first();
        return view('page.dosen.input-judul.edit', ['data' => $data]);
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
        DB::table('judul_ta')->where('id', $request->id)->update([
            'judul' => $request->input('judul'),
            'pbb1' => $request->input('pbb1'),
            'kuota' => $request->input('kuota')
        ]);
        return redirect('/input-judul')->with('success','Berhasil mengedit data.');
    }

    public function delete($id)
    {
        ModelInputJudul::destroy($id);

        return redirect('/input-judul')->with('success','Berhasil menghapus data.');
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
