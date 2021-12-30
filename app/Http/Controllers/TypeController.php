<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function create()
    {
        return view('admin.type.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required'
        ]);
        Type::create($request->all());
        session()->flash('success', 'Success Add New Product Type');
        return redirect()->route('admin.type');
    }
    public function edit(Type $type)
    {
        return view('admin.type.create', compact('type'));
    }
    public function update(Type $type, Request $request)
    {
        $request->validate(['type' => 'required']);
        $type->update($request->all());
        session()->flash('success', 'Success Update Product Type');
        return redirect()->route('admin.type');
    }
    public function destroy(Type $type)
    {
        $type->delete();
        session()->flash('success', 'Success Delete Product Type');
        return redirect()->route('admin.type');
    }
}