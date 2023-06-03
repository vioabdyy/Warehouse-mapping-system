<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;
use App\Models\user;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        $dtpalet = barang::with('user')->paginate(0);
            return view ('admin.admin', compact('dtpalet'));
             
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambah_palet()
    {
        $user = user::all();
        $dtpalet = barang ::all();
        return view ('admin.tambah_palet', compact('dtpalet','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function simpan_palet(Request $request)
    {
        // $dtpalet = barang::all();
        // dd($request->all());
    barang::create([
            'no_palet' => $request->no_palet,
            'invoice' => $request->invoice,
            'user_id' => $request->user_id,
            'tglmasuk' => $request->tglmasuk,
            'tglpindah' => NULL,
            'lorong' => $request->lorong,
            'status' => "tersedia",
    ]);
        return redirect('index')->with('success', 'Berhasil Menambahkan Data');
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
        $user = user::all();
        $dtpalet = barang::all();
        $admin = barang::with('user')->findorfail($id);
        return view('admin.edit_palet',compact('admin', 'dtpalet','user'));
      

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
        $admin = barang::findorfail($id);
        $admin->update($request->all());
        return redirect('index')->with('success', 'Data Berhasil di Update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = barang::findorfail($id);
        $admin->delete();
        return back()->with('info','Data Berhasil Dihapus');

    }
}
