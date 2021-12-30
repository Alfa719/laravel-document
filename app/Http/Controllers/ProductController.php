<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function edit(Product $product)
    {
        $type = Type::get();
        return view('admin.product.create', compact('product', 'type'));
    }
    public function update(Product $product, Request $request)
    {

        // dd($awal);
        $a = $request->validate([
            'thumbnail' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'title' => 'required',
            'type_id' => 'required',
            'tahun' => 'required|min:4|numeric',
        ]);
        if ($product->thumbnail != null) {
            $awal = $product->thumbnail;
            $request->thumbnail->move(public_path('/asset/img/product'), $awal);
        } else {
            $awal = time() . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('/asset/img/product'), $awal);
        }

        $a['user_id'] = $product->user_id;
        $a['thumbnail'] = $awal;
        // dd($a);
        $product->update($a);
        session()->flash('success', 'Success Update Product');
        return redirect()->route('admin.product');
    }
    public function destroy(Product $product)
    {
        $imagePath = public_path() . '/asset/img/product/' . $product->thumbnail;
        $filePath = public_path() . '/asset/product/' . $product->title;
        // dd($file);
        @unlink($imagePath);
        @unlink(strtolower($filePath));
        $product->delete();

        session()->flash('success', 'Success Delete Product');
        return redirect()->route('admin.product');
    }
    public function updateType(Product $product, Request $request)
    {
        // dd($request->all());

        $product->update(['type_id' => $request->type_id]);
        session()->flash('success', 'Success Verification The Product');
        return redirect()->route('admin.verify-product');
    }
}
