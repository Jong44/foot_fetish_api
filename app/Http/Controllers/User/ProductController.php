<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Kategori;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::with('brands','foto')->get();
        $product->map(function($product){
            $product->image = asset('storage/'. $product->image);
            $product->brands->first()->logo = asset('storage/' .$product->brands->first()->logo);
            $product->brands->first()->banner = asset('storage/' .$product->brands->first()->banner);
            $product->foto->first()->foto1 = asset('storage/' .$product->foto->first()->foto1);
            $product->foto->first()->foto2 = asset('storage/' .$product->foto->first()->foto2);
            $product->foto->first()->foto3 = asset('storage/' .$product->foto->first()->foto3);
            $product->foto->first()->foto4 = asset('storage/' .$product->foto->first()->foto4);
            return $product;
        });
        return $product;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_brand = $request->id_brand;
        $id_kategori = $request->id_kategori;
        $brand = Brand::where('id',$id_brand)->first();
        if($brand){
            $kategori = Kategori::where('id',$id_kategori)->first();
            if($kategori){
                $image = $request->file('image')->store('product/image','public');
                $product = Product::create([
                    "id_brand" => $id_brand,
                    "id_kategori" => $id_kategori,
                    "brand" => $brand->brand,
                    "kategori" => $kategori->nama_kategori,
                    "nama_product" => $request->nama_product,
                    "harga" => $request->harga,
                    "description" => $request->description,
                    "rate" => 0,
                    "sold" => 0,
                    "review" => 0,
                    "image" => $image
                ]);
                return response()->json(
                    [
                        'success' => 200,
                        'message' => "Data product berhasil disimpan",
                        'data' => $product
                    ], 
                    200
                );
            }
            else {
                return response()->json(
                    [
                        'success' => 404,
                        'message' => "Data kategori tidak ditemukan",
                    ], 
                    404
                );
            }
        }
        else{
            return response()->json(
                [
                    'success' => 404,
                    'message' => "Data brand tidak ditemukan",
                ], 
                404
            ); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
