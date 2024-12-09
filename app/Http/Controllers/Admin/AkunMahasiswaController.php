<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\ModelMahasiswa;

class AkunMahasiswaController extends Controller
{
    public function index()
    {
        $mhs = DB::table('mahasiswa')->where('id_role', null)->orderByDesc("id")->get();
        $mhs_akun = DB::table('mahasiswa')->where('id_role','!=', null)->orderByDesc("id")->get();
        
        return view('page.admin.akun.mahasiswa.index', ['data' => $mhs,'data_akun' => $mhs_akun]);
    }

    public function edit($id)
    {
        $mhs = DB::table('mahasiswa')->where('id', $id)->first();

        // var_dump($dosen);exit();
        
        return view('page.admin.akun.mahasiswa.edit', ['data' => $mhs]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'password' => 'required'
        ]);
        
        DB::table('mahasiswa')->where('id', $request->id)->update([
            'pas' => bcrypt($request->password),
        ]);
        
        DB::table('users')->where('id', $request->id_role)->update([
            'password' => bcrypt($request->password),
        ]);

        return redirect('/akun/mahasiswa')->with('success','Berhasil mengedit password.');
    }

    public function approve(Request $request)
    {
        $data = DB::table('mahasiswa')->where('id', $request->id)->first();
        
        $user = User::create([
            'name' => $data->nama,
            'username' => $data->nim,
            'email' => $data->email,
            'level' => 'mahasiswa',
            'password' => $data->pas,
        ]);

        $id_role = DB::table('users')->where('username', $data->nim)->first();

        if($user){
            DB::table('mahasiswa')->where('id', $request->id)->update([
                'id_role' => $id_role->id
            ]);

            $msg =[
                'sukses' => 1,
                'msg' => 'Berhasil menambahkan akun'
            ];
            echo json_encode($msg);
        }

    }
}
