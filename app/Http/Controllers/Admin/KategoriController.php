<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagename = 'Data Kategori';
        $data = kategori::all();
        return view('admin.kategori.index', compact('data','pagename'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pagename = 'Form Input Kategori';
        return view('admin.kategori.create', compact('pagename'));
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
        $request->validate([
            'txt_namakategori'=> 'required',
            'txt_ketkategori'=> 'required',
            'radio_status'=> 'required',
        ]);

        $data_kategori = new kategori([

            'nama_kategori'=>$request->get('txt_namakategori'),
            'keterangan_kategori'=>$request->get('txt_ketkategori'),
            'status_kategori'=>$request->get('radio_status'),
        ]);

        $data_kategori->save();
        return redirect('admin/kategori')->with('sukses','Kategori Berhasil Ditambahkan');
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
        $pagename = 'Edit Kategori';
        $data = kategori::find($id);
        return view('admin.kategori.edit', compact('data','pagename'));
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
        $request->validate([
            'txt_namakategori'=> 'required',
            'txt_ketkategori'=> 'required',
            'radio_status'=> 'required',
        ]);

        $tugas = kategori::find($id);

        $tugas->nama_kategori = $request->get('txt_namakategori');
        $tugas->keterangan_kategori = $request->get('txt_ketkategori');
        $tugas->status_kategori= $request->get('radio_status');
    

         $tugas->save();
        return redirect('admin/kategori')->with('sukses','Tugas Berhasil Dirubah');
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
        $tugas=kategori::find($id);
        $tugas->delete();
        return redirect('admin/kategori')->with('sukses','Kategori Berhasil Dihapus');
    }
}
