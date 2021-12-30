<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index($nidn)
    {
        $dosen = User::where('nomor_induk', $nidn)->firstOrFail();
        $dosenProduct = $dosen->products->whereNotNull('type');
        return view('dosen.profile', compact('dosen', 'dosenProduct'));
    }
    public function show($id)
    {
        $product = Product::where('id', $id)->firstOrFail();
        // dd($product);
        return view('dosen.show', compact('product'));
    }
    public function create()
    {
        return view('admin.dosen.create');
    }
    public function store(Request $request)
    {
        $a = $request->validate([
            'nomor_induk' => 'required|min:10|unique:users,nomor_induk|numeric',
            'name' => 'required',
            'gender' => 'required',
            'email' => 'required|unique:users,email',
            'address' => 'required',
        ]);
        $a['image'] = 'unknown.svg';
        $a['level_user'] = 'dosen';
        $a['password'] = bcrypt($a['nomor_induk']);
        // dd($a);
        User::create($a);
        session()->flash('success', 'Success Add New Dosen');
        return redirect()->route('admin.dosen');
    }
    public function edit(User $user)
    {
        return view('admin.dosen.create', compact('user'));
    }
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'address' => 'required',
        ]);
        // dd($request->all());
        $user->update($request->all());
        session()->flash('success', 'Success Update Dosen');
        return redirect()->route('admin.dosen');
    }
    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('success', 'Success Delete Dosen');
        return redirect()->route('admin.dosen');
    }
    public function userProduct(User $user)
    {
        return view('product.create', compact('user'));
    }
    public function updateProfile(Request $request, User $user)
    {

        // dd($awal);
        $a = $request->validate([
            'image' => 'nullable|image|mimes:png,jpg,svg,jpeg|max:2048',
            'name' => 'required',
            'gender' => 'required',
            'email' => 'email|required|unique:users,nomor_induk,' . $user->id,
            'address' => 'required',
            // 'nomor_induk' => 'required|unique:users,nomor_induk,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
        ]);
        if ($request->image == null) {
            $a['image'] = $user->image;
        } else {
            if ($user->image == 'unknown.svg') {
                $a['image'] = time() . '.' . $request->image->extension();
                $request->image->move(public_path('/asset/img/user'), $a['image']);
            } else {
                $awal = $user->image;
                $request->image->move(public_path('/asset/img/user'), $awal);
                $a['image'] = $awal;
            }
        }

        if ($request->password == null) {
            $a['password'] = $user->password;
        } else {
            $a['password'] = bcrypt($a['password']);
        }
        // dd($a);
        $user->update($a);
        session()->flash('success', 'Success Update Your Profile');
        return redirect()->route('dosen.profile', $user->nomor_induk);
    }
}