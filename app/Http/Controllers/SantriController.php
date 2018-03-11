<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Santri;
use App\Ustad;
use Session;
class SantriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $mhs = Santri::with('Ustad')->get();
        return view('santri.index',compact('mhs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dosen = Ustad::all();
        return view('santri.create',compact('dosen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required|',
            'nis' => 'required|unique:santris',
            'ustad_id' => 'required'
        ]);
        $mhs = new Santri;
        $mhs->nama = $request->nama;
        $mhs->nis = $request->nis;
        $mhs->ustad_id = $request->ustad_id;
        $mhs->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$mhs->nama</b>"
        ]);
        return redirect()->route('santri.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mhs = Santri::findOrFail($id);
        return view('santri.show',compact('mhs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mhs = Santri::findOrFail($id);
        $dosen = Ustad::all();
        $selectedDosen = Santri::findOrFail($id)->ustad_id;
        return view('santri.edit',compact('mhs','dosen','selectedDosen'));
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
        $this->validate($request,[
            'nama' => 'required|',
            'nis' => 'required|',
            'ustad_id' => 'required'
        ]);
        $mhs = Santri::findOrFail($id);
        $mhs->nama = $request->nama;
        $mhs->nis = $request->nis;
        $mhs->ustad_id = $request->ustad_id;
        $mhs->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$mhs->nama</b>"
        ]);
        return redirect()->route('santri.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $a = Santri::findOrFail($id);
        $a->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('santri.index');
    }
}
