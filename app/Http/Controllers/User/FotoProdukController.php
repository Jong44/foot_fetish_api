<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Foto_Produk;
use App\Models\Product;


class FotoProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foto = Foto_Produk::get();
        return $foto;
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
        $id_product = $request->id_product;
        $cek = Product::where('id',$id_product)->first();
        if($cek){
            $cek_id = Foto_Produk::where('id_product', $id_product)->first();
            if($cek_id){
                return response()->json(
                    [
                        'success' => 401,
                        'message' => "Gagal menambahkan foto",
                    ], 
                    401
                );
            } else {
                $foto1 = $request->file('foto1')->store('product/image_product', 'public');
                $foto2 = $request->file('foto2')->store('product/image_product', 'public');
                $foto3 = $request->file('foto3')->store('product/image_product', 'public');
                $foto4 = $request->file('foto4')->store('product/image_product', 'public');
                $product = Foto_Produk::create([
                    "id_product" => $id_product,
                    "foto1" => $foto1,
                    "foto2" => $foto2,
                    "foto3" => $foto3,
                    "foto4" => $foto4,
                ]);

                return response()->json(
                    [
                        'success' => 200,
                        'message' => "Data brand berhasil disimpan",
                        'data' => $product
                    ], 
                    200
                );
            }
        } else {
            return response()->json(
                [
                    'success' => 404,
                    'message' => "Id Product tidak ditemukan",
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
