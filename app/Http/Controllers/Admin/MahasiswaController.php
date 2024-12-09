<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\ModelMahasiswa;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mhs = DB::table('mahasiswa')->orderByDesc("id")->get();
        
        return view('page.admin.mahasiswa.index', ['data' => $mhs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.admin.mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nim' => 'required|min:5|unique:mahasiswa,nim',
            'nama' => 'required',
            'no_hp' => 'required|numeric',
            'email' => 'required|email|unique:mahasiswa,email',
            'jenkel' => 'required',
            'program_studi' => 'required',
            'fakultas' => 'required',
        ]);

        $post = ModelMahasiswa::create([
            'nim' => $request->input('nim'),
            'nama' => $request->input('nama'),
            'jenkel' => $request->input('jenkel'),
            'program_studi' => $request->input('program_studi'),
            'fakultas' => $request->input('fakultas'),
            'no_hp' => $request->input('no_hp'),
            'email' => $request->input('email'),
        ]);
        
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
        
        return view('page.admin.mahasiswa.edit', ['data' => $mhs]);
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
        $users = DB::table('users')->where('username', $request->nim)->first();
        $mahasiswa = DB::table('mahasiswa')->where('email', $request->email)->where('nim', $request->nim)->first();

        if(($users == null) && (!$mahasiswa)){
            $validatedData = $request->validate([
                'nama' => 'required',
                'no_hp' => 'required|numeric',
                'email' => 'required|email|unique:mahasiswa,email',
                'jenkel' => 'required',
                'program_studi' => 'required',
                'fakultas' => 'required',
            ]);

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
        else if(($users != null) && (!$mahasiswa)){
            $validatedData = $request->validate([
                'nama' => 'required',
                'no_hp' => 'required|numeric',
                'email' => 'required|email|unique:mahasiswa,email',
                'jenkel' => 'required',
                'program_studi' => 'required',
                'fakultas' => 'required',
            ]);

            DB::table('users')->where('username', $request->nim)->update([
                'email' => $request->email,
            ]);
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
        else if($mahasiswa){
            DB::table('mahasiswa')->where('id', $request->id)->update([
                'nama' => $request->nama,
                'no_hp' => $request->no_hp,
                'jenkel' => $request->jenkel,
                'program_studi' => $request->program_studi,
                'fakultas' => $request->fakultas,
            ]);
            return redirect('/mahasiswa')->with('success','Berhasil mengedit data.');
        }
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
