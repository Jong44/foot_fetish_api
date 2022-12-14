<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = Brand::with('product')->get();
        $brand->map(function($brand){
            $brand->banner = asset('storage/'. $brand->banner);
            $brand->logo = asset('storage/'. $brand->logo);
            $brand->product->first()->image = asset('storage/'. $brand->product->first()->image);
            return $brand;
        });
        return response()->json(
            [
                'success' => 200,
                'message' => "Data brand berhasil didapatkan",
                'data' => $brand
            ], 
            200
        );
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
        $image_banner = $request->file('banner')->store('brand/banner','public');
        $image_logo = $request->file('banner')->store('brand/logo','public');
        $brand = Brand::create([
            "brand" => $request->brand,
            "nama_brand" => $request->nama_brand,
            "banner" => $image_banner,
            "logo" => $image_logo
        ]);

        return response()->json(
            [
                'success' => 200,
                'message' => "Data brand berhasil disimpan",
                'data' => $brand
            ], 
            200
        );
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
