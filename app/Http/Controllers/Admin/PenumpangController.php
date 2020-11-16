<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\penumpang;
use Illuminate\Http\Request;

class PenumpangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagename = 'Data Penumpang';
        $data = penumpang::all();
        return view('admin.penumpang.index', compact('data','pagename'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pagename = 'Form Input Penumpang';
        return view('admin.penumpang.create', compact('pagename'));
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
            'txt_nikpenumpang'=> 'required',
            'txt_namapenumpang'=> 'required',
            'txt_alamatpenumpang'=> 'required',
        ]);

        $data_penumpang = new penumpang([

            'nik_penumpang'=>$request->get('txt_nikpenumpang'),
            'nama_penumpang'=>$request->get('txt_namapenumpang'),
            'alamat_penumpang'=>$request->get('txt_alamatpenumpang'),
        ]);

        $data_penumpang->save();
        return redirect('admin/penumpang')->with('sukses','Penumpang Berhasil Ditambahkan');
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
