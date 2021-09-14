<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;


class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $response;
    public function __construct()
    {
    }
    public function index()
    {
        return  Produk::all();
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
        //


        $valid =  $request->validate([

            'nama' => 'required',
            'slug' => 'required',
            'harga' => 'required',

        ]);
        if ($valid == true) {
            $data =   Produk::create($request->all());
            return $data;
        } else {
            return 'False';
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
        return Produk::find($id); 

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
        $produk = Produk::find($id); 
        $produk->update($request->all());
        return $produk ; 
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
        return Produk::destroy($id) ; 
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  str $name  $id
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        //
        return Produk::where('nama','like','%'.$name.'%')->get(); 
    }
}
