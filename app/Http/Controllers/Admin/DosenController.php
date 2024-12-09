<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\ModelDosen;
use App\Models\User;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosen = ModelDosen::all(); 
        
        return view('page.admin.dosen.index', ['data' => $dosen]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.admin.dosen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $input = $request->all();
        $validatedData = $request->validate([
            'no_induk' => 'required|unique:dosen',
            'nama_dosen' => 'required',
            'program_studi' => 'required',
            'fakultas' => 'required',
            'email' => 'required|email|unique:users',
        ]);

        $dosen = ModelDosen::create([
            'no_induk' => $request->input('no_induk'),
            'nama_dosen' => $request->input('nama_dosen'),
            'jurusan' => $request->input('program_studi'),
            'fakultas' => $request->input('fakultas'),
            'email' => $request->input('email')
        ]);
        
        return redirect('/dosen')->with('success','Berhasil menambahkan data.');
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
        $dosen = DB::table('dosen')->where('id', $id)->first();
        return view('page.admin.dosen.edit', ['data' => $dosen]);
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
        
        // $User = DB::table('users')->where('username', $request->input('no_induk'))->update([
        //     'name' => $request->input('nama_dosen'),
        //     'email' => $request->input('email'),
        // ]);

        // if($User){
        //     DB::table('dosen')->where('id', $request->id)->update([
        //         'nama_dosen' => $request->input('nama_dosen'),
        //         'jurusan' => $request->input('program_studi'),
        //         'fakultas' => $request->input('fakultas'),
        //         'email' => $request->input('email'),
        //     ]);

        $users = DB::table('users')->where('username', $request->no_induk)->first();
        $dosen = DB::table('dosen')->where('email', $request->email)->where('no_induk', $request->no_induk)->first();

        if(($users == null) && (!$dosen)){
            $validatedData = $request->validate([
                'nama_dosen' => 'required',
                'program_studi' => 'required',
                'fakultas' => 'required',
                'email' => 'required|email|unique:users',
            ]);

            DB::table('dosen')->where('id', $request->id)->update([
                'nama_dosen' => $request->nama_dosen,
                'jurusan' => $request->program_studi,
                'fakultas' => $request->fakultas,
                'email' => $request->email,
            ]);
            return redirect('/dosen')->with('success','Berhasil mengedit data.');
        }
        else if(($users != null) && (!$dosen)){
            $validatedData = $request->validate([
                'nama_dosen' => 'required',
                'program_studi' => 'required',
                'fakultas' => 'required',
                'email' => 'required|email|unique:users',
            ]);

            DB::table('users')->where('username', $request->no_induk)->update([
                'email' => $request->email,
            ]);
            DB::table('dosen')->where('id', $request->id)->update([
                'nama_dosen' => $request->nama_dosen,
                'jurusan' => $request->program_studi,
                'fakultas' => $request->fakultas,
                'email' => $request->email,
            ]);
            return redirect('/dosen')->with('success','Berhasil mengedit data.');
        }
        else if($dosen){
            DB::table('dosen')->where('id', $request->id)->update([
                'nama_dosen' => $request->nama_dosen,
                'jurusan' => $request->program_studi,
                'fakultas' => $request->fakultas,
            ]);
            return redirect('/dosen')->with('success','Berhasil mengedit data.');
        }

    }

    public function delete($id)
    {
        $dosen = DB::table('dosen')->where('id', $id)->first();
        $id_user = DB::table('users')->where('username', $dosen->no_induk)->first();

        $hapususer = User::destroy($id_user->id);

        if($hapususer){
            ModelDosen::destroy($id);
        }

        return redirect('/dosen')->with('success','Berhasil menghapus data.');
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
