<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kategori::get();
        return view('admin/kategori', ['data' => $data]);
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
        // Proses Menambah data pada kategori
        $data = Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);
        
        // jika selesai kembali ke halaman kategori
        return redirect()->route('kategori')->with('success','Data Berhasil Dibuat');
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
        $data = Kategori::where('id_kategori',$id)->first();
        if ($data) {
            return view('admin/editkategori',['data' => $data]);
        }else {
            return abort('404');
        }
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
        $data = Kategori::where('id_kategori',$id)->first();
        if ($data) {
            //change data which have been gotten from database from input in website
            $data->nama_kategori = $request->nama_kategori;
            //saving process/update the latest data in database
            $result = $data->save();
            //Chechking if it's true go to kategori
            if ($result) {
               return redirect()->route('kategori');
            }
            return view('admin/editkategori',['data' => $data]);
        }else {
            abort('404');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Kategori::where('id_kategori',$id)->first();
        if ($data) {
            if ($data->delete()) {
                return redirect()->route('kategori');
            }else{
                return abort('404');
            }
        }else {
            return abort('404');
        }
    }
}
