<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    public function index()
    {
        return view('userman.index');
    }

    // USER MANAGEMENT ADMIN - START - //
    
    public function regIndexAdmin()
    {
        $dataReg = User::where('level', '=', 'Admin')->get();
        return view('userman.admin.regIndexAdmin', compact('dataReg'));
    }

    public function regAdmin()
    {
        return view('userman.admin.regAdmin');
    }

    public function regAdminEdit($id)
    {
        $adminId = User::findorfail($id);
        return view('userman.admin.regAdminEdit', compact('adminId'));
    }

    public function regAdminProses(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'username' => 'required',
            'password' => 'required',
            'level' => 'required',
        ]);
 
        $validatedData['password'] = Hash::make($validatedData['password']);
 
        User::create($validatedData);
        return redirect('/regIndexAdmin');
    }

    public function regAdminProsesEdit(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'username' => 'required',
        ]);

        $adminId = User::findorfail($id);
        $adminId->update($validatedData);

        return redirect('/regIndexAdmin');
    }

    public function regDestroyAdmin($id)
    {
        $adminId = User::findorfail($id);
        $adminId->delete();

        return redirect('/regIndexAdmin');
    }

    // USER MANAGEMENT ADMIN - END - //

    // USER MANAGEMENT PETUGAS - START - //

    public function regIndexPet()
    {
        $dataReg = User::where('level', '=', 'Petugas')->get();
        return view('userman.petugas.regIndexPet', compact('dataReg'));
    }

    public function regPet()
    {
        return view('userman.petugas.regPet');
    }

    public function regPetEdit($id)
    {
        $petugasId = User::findorfail($id);
        return view('userman.petugas.regPetEdit', compact('petugasId'));
    }

    public function regPetProses(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'username' => 'required',
            'password' => 'required',
            'level' => 'required',
        ]);
 
        $validatedData['password'] = Hash::make($validatedData['password']);
 
        User::create($validatedData);
        return redirect('/regIndexPet');
    }

    public function regPetProsesEdit(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'username' => 'required',
        ]);

        $petugasId = User::findorfail($id);
        $petugasId->update($validatedData);

        return redirect('/regIndexPet');
    }

    public function regDestroyPet($id)
    {
        $petugasId = User::findorfail($id);
        $petugasId->delete();

        return redirect('/regIndexPet');
    }

    // USER MANAGEMENT PETUGAS - END - //

    // USER MANAGEMENT SISWA - START - //

    public function regIndexSis()
    {
        $dataReg = User::where('level', '=', 'Siswa')->get();
        return view('userman.siswa.regIndexSis', compact('dataReg'));
    }

    public function regSis()
    {
        $siswa = Siswa::all();
        return view('userman.siswa.regSis', compact('siswa'));
    }

    public function regSisEdit($id)
    {
        $siswa = Siswa::all();
        $siswaId = User::findorfail($id);
        return view('userman.siswa.regSisEdit', compact('siswaId', 'siswa'));
    }

    public function regSisProses(Request $request)
    {
        $validatedData = $request->validate([
            'siswa_id' => 'required',
            'username' => 'required',
            'password' => 'required',
            'level' => 'required',
        ]);

        $nama = Siswa::select('nama')
        ->where('siswas.id', '=', $request->siswa_id)
        ->get();

        $user = new User();
        foreach ($nama as $key) {
            $name = $key->nama;
            $user->nama = $name;
        }

        $pw = $validatedData['password'] = Hash::make($validatedData['password']);
        $user->siswa_id = $request->siswa_id;
        $user->username = $request->username;
        $user->password = $pw;
        $user->level = $request->level;
        $user->save();
        // User::create($validatedData);
        return redirect('/regIndexSis');
    }

    public function regSisProsesEdit(Request $request, $id)
    {
        $validatedData = $request->validate([
            'siswa_id' => 'required',
            'username' => 'required',
        ]);

        $nama = Siswa::select('nama')
        ->where('siswas.id', '=', $request->siswa_id)
        ->get();

        $user = User::findorfail($id);
        foreach ($nama as $key) {
            $name = $key->nama;
            $user->nama = $name;
        }
        $user->siswa_id = $request->siswa_id;
        $user->username = $request->username;
        $user->save();
        // User::create($validatedData);
        return redirect('/regIndexSis');;
    }

    public function regDestroySis($id)
    {
        $siswaId = User::findorfail($id);
        $siswaId->delete();

        return redirect('/regIndexSis');
    }

    // USER MANAGEMENT SISWA - END - //
}
