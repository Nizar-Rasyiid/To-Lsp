<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\User;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Artikel::get();
        return view('admin/artikel', ['data' => $data]);
    }

    // for user
    public function Uindex()
    {
        $data = Artikel::get();
        $newest = Artikel::orderBy('created_at', 'desc')->paginate(3);
        $data = Artikel::orderBy('read', 'desc')->paginate(5);
        return view('user/index', ['data' => $data,'newest' => $newest]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Menampilkan Kategori dan user di combo box add artikel
        return view('admin/addartikel',[
            'kategori' => Kategori::get(),
            'user' => User::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // mengambil nama dari file
        $filename = $request->gambar_artikel->getClientOriginalName();
        // menaruh file ke storage
        $image = $request->gambar_artikel->storeAs('artikel',$filename);

        $data = Artikel::create([
            'user_id' => $request->user_id,
            'kategori_id' => $request->kategori_id,
            'judul_artikel' => $request->judul_artikel,
            'isi_artikel' => $request->isi_artikel,
            'gambar_artikel' => $image,
        ]);

        
        // jika selesai kembali ke halaman artikel
        return redirect()->route('artikel')->with('success','Data Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Fitur untuk membaca
        $show = Artikel::where('id_artikel', $id)->value('read');
        $data = Artikel::where('id_artikel', $id)->first();
        // menambah satu agar masuk ke dalam column read,dan menjadi acuan untuk menjadi ter favorit
        $data->read = $show + 1;
        $data->save();
        return view('user/read', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Artikel::where('id_artikel',$id)->first();
        $kategori = Kategori::get();
        if ($data) {
            return view('admin/editartikel',[
                'data' => $data,
                'kategori' => $kategori,
            ]);
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

        $filename = $request->gambar_artikel->getClientOriginalName(null);
        $image = $request->gambar_artikel->storeAs('artikel',$filename);

        $data = Artikel::where('id_artikel',$id)->firstOrfail();

            $data->user_id = $request->user_id;
            $data->kategori_id = $request->kategori_id;
            $data->judul_artikel = $request->judul_artikel;
            $data->isi_artikel = $request->isi_artikel;
            $data->gambar_artikel = $image;

            $data->save();

            return redirect()->route('artikel');
    }


    public function destroy($id)
    {
        $data = Artikel::where('id_artikel',$id)->first();
        if ($data) {
            if ($data->delete()) {
                return redirect()->route('artikel');
            }else{
                return abort('404');
            }
        }else {
            return abort('404');
        }
    }

}
