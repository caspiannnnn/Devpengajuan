<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\ModelMahasiswa;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegisterForm()
    {
        return view('page.auth.register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required|min:5|unique:mahasiswa,nim',
            'email' => 'required|email|unique:mahasiswa,email',
            'password' => 'required',
            'jenkel' => 'required',
            'no_hp' => 'required|numeric',
            'program_studi' => 'required',
            'fakultas' => 'required',
        ]);

        // $User = User::create([
        //     'name' => $request->input('name'),
        //     'username' => $request->input('username'),
        //     'email' => $request->input('email'),
        //     'password' => bcrypt($request->input('password')),
        //     'level' => null,
        //     'remember_token' => Str::random(60),
        // ]);
        
        // $user = DB::table('users')->where('username', $request->input('username'))->first();
        $Mahasiswa = ModelMahasiswa::create([
            'nim' => $request->input('username'),
            'nama' => $request->input('name'),
            'jenkel' => $request->input('jenkel'),
            'no_hp' => $request->input('no_hp'),
            'program_studi' => $request->input('program_studi'),
            'fakultas' => $request->input('fakultas'),
            'email' => $request->input('email'),
            'pas' => bcrypt($request->input('password')),
            // 'id_role' => $user->id,
        ]);
        // if($User){
        // }
        return redirect('/')->with('success','Berhasil registrasi');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
