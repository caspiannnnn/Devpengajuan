<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\ModelDosen;

class AkunDosenController extends Controller
{
    public function index()
    {
        $dosen = DB::table('dosen')->where('id_role', null)->orderByDesc("id")->get();
        // $dosen_akun = DB::table('dosen')->where('id_role','!=', null)->orderByDesc("id")->get();
        $dosen_akun = DB::table('dosen')
                        ->join('users', 'users.id', '=', 'dosen.id_role')
                        ->orderByDesc("dosen.id")->get();
        
        // dd($dosen_akun);
        return view('page.admin.akun.dosen.index', ['data' => $dosen,'data_akun' => $dosen_akun]);
    }

    public function create($id)
    {
        $dosen = DB::table('dosen')->where('id', $id)->first();

        return view('page.admin.akun.dosen.create',['data' => $dosen]);
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
            'password' => 'required',
            'role' => 'required',
        ]);
        
        $user = User::create([
            'name' => $request->nama_dosen,
            'username' => $request->no_induk,
            'email' => $request->email,
            'level' => $request->role,
            'password' => bcrypt($request->password),
        ]);

        $id_role = DB::table('users')->where('username', $request->no_induk)->first();

        if($user){
            DB::table('dosen')->where('id', $request->id_dosen)->update([
                'id_role' => $id_role->id
            ]);
        }
        
        return redirect('/akun/dosen')->with('success','Berhasil menambahkan data.');
    }

    public function edit($id)
    {
        $dosen = DB::table('users')
            ->join('dosen', 'users.id', '=', 'dosen.id_role')
            ->where('users.id', $id)->first();
        
        // return $dosen;

        return view('page.admin.akun.dosen.edit',['data' => $dosen]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'password' => 'required',
        ]);
        
        DB::table('users')->where('id', $request->id_role)->update([
            'password' => bcrypt($request->password),
        ]);

        return redirect('/akun/dosen')->with('success','Berhasil mengedit password.');
    }
}
