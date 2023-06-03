<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_driver()
    {
        $dtuser = user::all();
        return view ('admin.driver', compact('dtuser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambah_driver()
    {
        $dtuser = user ::all();
        return view ('admin.tambah_driver', compact('dtuser'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function simpan_driver(Request $request)
    {
        user::create([
            'name' => $request->name,
            'level' => $request->level,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return redirect('index_driver')->with('success', 'Berhasil Menambahkan Data');
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
        $dtuser = user::all();
        $user = user::findorfail($id);
        return view('admin.edit_driver',compact('user', 'dtuser'));
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
        $user = user::findorfail($id);
        $user->update($request->all());
        return redirect('index_driver')->with('success', 'Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = user::findorfail($id);
        $user->delete();
        return back()->with('info','Data Berhasil Dihapus');
    }
}
