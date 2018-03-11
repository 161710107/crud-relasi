<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Santri;
use App\Wali;
use Session;
class WaliController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $wali = Wali::with('Santri')->get();
        return view('wali.index',compact('wali'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mhs = Santri::all();
        return view('wali.create',compact('mhs'));
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
            'santri_id' => 'required'
        ]);
        $wali = new Wali;
        $wali->nama = $request->nama;
        $wali->santri_id = $request->santri_id;
        $wali->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$wali->nama</b>"
        ]);
        return redirect()->route('wali.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $wali = Wali::findOrFail($id);
        return view('wali.show',compact('wali'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $wali = Wali::findOrFail($id);
        $mhs = Santri::all();
        $selectedMhs = Wali::findOrFail($id)->santri_id;
        return view('wali.edit',compact('mhs','wali','selectedMhs'));
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
            'santri_id' => 'required'
        ]);
        $wali = Wali::findOrFail($id);
        $wali->nama = $request->nama;
        $wali->santri_id = $request->santri_id;
        $wali->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$wali->nama</b>"
        ]);
        return redirect()->route('wali.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $a = Wali::findOrFail($id);
        $a->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('wali.index');
    }
}
