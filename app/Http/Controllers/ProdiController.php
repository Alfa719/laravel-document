<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function create()
    {
        return view('admin.prodi.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'mimes:png,jpg,svg,jpeg|image|max:2048',
            'nama_prodi' => 'required'
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('asset/img/prodi'), $imageName);
        $request->image = $imageName;
        // dd($request->all());
        Prodi::create([
            'image' => $imageName,
            'nama_prodi' => $request->nama_prodi
        ]);
        session()->flash('success', 'Success Add New Program');

        return redirect()->route('admin.prodi');
    }
    public function edit(Prodi $prodi)
    {
        return view('admin.prodi.create', compact('prodi'));
    }
    public function update(Prodi $prodi, Request $request)
    {
        $awal = $prodi->image;
        // dd($awal);
        $a = $request->validate([
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'nama_prodi' => 'required',
        ]);

        if ($request->image == null) {
            $a['image'] = $prodi->image;
        } else {
            $request->image->move(public_path('/asset/img/prodi'), $awal);
            $a['image'] = $awal;
        }
        // dd($a);
        $prodi->update([
            'image' => $a['image'],
            'nama_prodi' => $request->nama_prodi
        ]);
        session()->flash('success', 'Success Update Program');
        return redirect()->route('admin.prodi');
    }

    public function destroy(Prodi $prodi)
    {
        // dd($prodi->id);
        $imagePath = public_path() . '/asset/img/prodi/' . $prodi->image;
        // dd($file);
        @unlink($imagePath);
        $prodi->delete();
        session()->flash('success', 'Success Delete Program');
        return redirect()->route('admin.prodi');
    }
}
