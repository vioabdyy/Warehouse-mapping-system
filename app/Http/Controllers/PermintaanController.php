<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang2;
use App\Models\user;
use App\Models\barang;



class PermintaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_permintaan()
    {
        $dtminta= barang2::with('user','barang')->paginate(0);
        return view ('user.permintaan', compact('dtminta'));
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambah_permintaan()
    {
        $barang = barang::all();
        $user = user::all();
        $dtminta = barang2 ::all();
        return view ('user.tambah_permintaan', compact('dtminta','user','barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function simpan_permintaan(Request $request)
    {
        barang2::create([
            'no_palet' => $request->no_palet,
            'invoice' => $request->invoice,
            'user_id' => $request->user_id,
            'tglmasuk' => $request->tglmasuk,
            'tglpindah' => NULL,
            'lorong' => $request->lorong,
            'status' => $request->status,
    ]);
        return redirect('index_permintaan')->with('success', 'Berhasil Menambahkan Data');

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
        $barang = barang::all();
        $user = user::all();
        $dtminta = barang2::all();
        $permintaan = barang2::findorfail($id);
        return view('user.edit_permintaan',compact('permintaan', 'dtminta','user','barang'));
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
        $permintaan = barang2::findorfail($id);
        $permintaan->update($request->all());
        return redirect('index_permintaan')->with('success', 'Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permintaan = barang2::findorfail($id);
        $permintaan->delete(); 
        return back()->with('info','Data Berhasil Dihapus');
    }
}
