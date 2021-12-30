<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{

    public function index()
    {
        $user = Auth::user()->level_user;
        if ($user === 'admin') {
            return redirect()->route('admin.index');
        }
        $allProduct = Product::whereNotNull('type_id')->get();
        // dd($allProduct);
        return view('home', compact('allProduct'));
    }
    public function show($id)
    {
        $product = Product::where('id', $id)->firstOrFail();
        // $product->whereNotNull
        // dd($product);
        return view('product.show', compact('product'));
    }
    public function upload(User $user, Product $product, Request $request)
    {
        $request->validate([
            'thumbnail' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048',
            'title' => 'required',
            'tahun' => 'nullable|min:4',
            'file_product' => 'required'
        ]);
        if ($request->thumbnail !== null) {
            $imageName = time() . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('/asset/img/product'), $imageName);
        } else {
            $imageName = $request->thumbnail;
        }

        $fileName = Str::slug($request->title . '-' . time()) . '.' . $request->file_product->extension();
        $request->file_product->move(public_path('/asset/product'), $fileName);
        // dd($a);
        $product->create([
            'title' => $fileName,
            'thumbnail' => $imageName,
            'type_id' => null,
            'user_id' => $user->id,
            'tahun' => $request->tahun,
        ]);
        return redirect()->route('home');
    }
    public function download($fileName)
    {
        $file = \public_path('asset/product/')  . $fileName;
        return response()->download($file, $fileName, [
            // 'Content-Length : ' . filesize($file)
        ]);
    }
    public function search(Request $request, Type $type, User $user)
    {
        $keyword = $request->get('search');
        $allProduct = Product::where('title', 'LIKE', "%$keyword%")
            ->orWhere('tahun', 'LIKE', "%$keyword%")
            ->orWhereHas('type', function ($query) use ($keyword) {
                return $query->where('type', 'LIKE', "%$keyword%");
            })
            ->orWhereHas('user', function ($query) use ($keyword) {
                return $query->where('name', 'LIKE', "%$keyword%");
            })
            ->get();

        // $allProduct = Product::whereHas('user', function ($query) use ($keyword) {
        //     return $query->where('name', 'LIKE', "%$keyword%");
        // })->get();
        // dd($allProduct);
        return view('home', compact('allProduct'));
    }
}