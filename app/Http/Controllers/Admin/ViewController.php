<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Models\User;
use App\Models\Prodi;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class ViewController extends Controller
{
    public function index()
    {
        $allMahasiswa = User::where('level_user', 'mahasiswa')->count();
        $allDosen = User::where('level_user', 'dosen')->count();
        $allProduct = Product::whereNotNull('type_id')->count();
        $allVerifProduct = Product::where('type_id', null)->count();
        return view('admin.index', compact('allMahasiswa', 'allDosen', 'allProduct', 'allVerifProduct'));
    }
    public function showDosen(Request $request)
    {
        $dosen = User::where('level_user', 'dosen')->simplePaginate(5);
        // dd($dosen->count());
        return view('admin.dosen.index', compact('dosen'));
    }
    public function showMahasiswa(Request $request)
    {
        $mahasiswa = User::where('level_user', 'mahasiswa')->simplePaginate(5);
        return view('admin.mahasiswa.index', compact('mahasiswa'));
    }
    public function showProduct(Request $request)
    {
        $product = Product::whereNotNull('type_id')->simplePaginate(5);
        // dd($product);
        return view('admin.product.index', compact('product'));
    }
    public function showType(Request $request)
    {
        $type = Type::get();
        return view('admin.type.index', compact('type'));
    }
    public function showProdi(Request $request)
    {
        $prodi = Prodi::simplePaginate(5);
        return view('admin.prodi.index', compact('prodi'));
    }
    public function productVerification()
    {
        $products = Product::where('type_id', null)->simplePaginate(5);
        $type = Type::get();
        // dd($products);
        return view('admin.product.product-verify', compact('products', 'type'));
    }
    public function update(User $user, Request $request)
    {
        $awal = $user->image;
        // dd($awal);
        $a = $request->validate([
            'image' => 'nullable|image|mimes:png,jpg,svg,jpeg|max:2048',
            'name' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'nomor_induk' => 'required|unique:users,nomor_induk,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        $request->image->move(public_path('/asset/img/admin'), $awal);
        $a['image'] = $awal;
        if ($request->password == null) {
            $a['password'] = $user->password;
        } else {
            $a['password'] = bcrypt($a['password']);
        }
        // dd($a);
        $user->update($a);
        session()->flash('success', 'Success Update Your Profile');
        return redirect()->route('admin.profile');
    }
}