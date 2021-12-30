<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index($nim)
    {
        $mahasiswa = User::where('nomor_induk', $nim)->firstOrFail();
        $mahasiswaProduct = $mahasiswa->products->whereNotNull('type');
        $prodi = Prodi::get();
        // dd($mahasiswa);
        return view('mahasiswa.profile', compact('mahasiswa', 'mahasiswaProduct', 'prodi'));
    }
    public function show($id)
    {
        $product = Product::where('id', $id)->firstOrFail();
        // dd($product);
        return view('mahasiswa.show', compact('product'));
    }
    public function create()
    {
        $prodi = Prodi::get();
        return view('admin.mahasiswa.create', compact('prodi'));
    }
    public function store(Request $request)
    {
        $a = $request->validate([
            'nomor_induk' => 'required|unique:users,nomor_induk|numeric',
            'name' => 'required',
            'gender' => 'required',
            'email' => 'required|unique:users,email',
            'address' => 'required',
            'prodi_id' => 'required',
        ]);
        $a['image'] = 'unknown.svg';
        $a['level_user'] = 'mahasiswa';
        $a['password'] = bcrypt($a['nomor_induk']);
        // dd($a);
        User::create($a);
        session()->flash('success', 'Success Add New Mahasiswa');
        return redirect()->route('admin.mahasiswa');
    }
    public function edit(User $user)
    {
        $prodi = Prodi::get();
        return view('admin.mahasiswa.create', compact('user', 'prodi'));
    }
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'address' => 'required',
            'prodi_id' => 'required',
        ]);
        // dd($request->all());
        $user->update($request->all());
        session()->flash('success', 'Success Update Mahasiswa');
        return redirect()->route('admin.mahasiswa');
    }
    public function updateProfile(Request $request, User $user)
    {
        $awal = $user->image;
        // dd($awal);
        $a = $request->validate([
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'name' => 'required',
            'gender' => 'required',
            'email' => 'email|required|unique:users,nomor_induk,' . $user->id,
            'prodi_id' => 'required',
            'address' => 'required',
            // 'nomor_induk' => 'required|unique:users,nomor_induk,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
        ]);
        if ($user->image == 'unknown.svg') {
            $a['image'] = time() . '.' . $request->image->extension();
            $request->image->move(public_path('/asset/img/user'), $a['image']);
        } else {
            $awal = $user->image;
            $request->image->move(public_path('/asset/img/user'), $awal);
            $a['image'] = $awal;
        }

        if ($request->password == null) {
            $a['password'] = $user->password;
        } else {
            $a['password'] = bcrypt($a['password']);
        }
        // dd($a);
        $user->update($a);
        session()->flash('success', 'Success Update Your Profile');
        return redirect()->route('mahasiswa.profile', $user->nomor_induk);
    }
    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('success', 'Success Delete Mahasiswa');
        return redirect()->route('admin.mahasiswa');
    }
    public function userProduct(User $user)
    {
        return view('product.create', compact('user'));
    }
}
