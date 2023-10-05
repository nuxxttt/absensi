<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KaryawanModel;
Use App\GajiModel;

class karyawan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = KaryawanModel::all();
        return view('pages.karyawan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datas = $request->all();
        $data =[
            "nama"=>$datas['nama'],
            'id_cabang'=>$datas['cabang'],
            'jabatan'=>$datas['jabatan'],
            'gaji'=>$datas['gaji'],
            'id_shift'=>$datas['shift'],
            'id_absen' => $datas['id_absen']

        ];
        KaryawanModel::create($data);
        $karyawan=KaryawanModel::where('nama',$datas['nama'])->where('id_cabang',$datas['cabang'])->first();
        $gaji = [
            'id_pegawai'=>$karyawan->id,
            'jumlah'=>$datas['gaji'],
            'status'=>"gaji_pokok",
            'keterangan'=>'data_gaji'
        ];
        $makan = [
            'id_pegawai'=>$karyawan->id,
            'jumlah'=>$datas['uang_makan'],
            'status'=>"uang_makan",
            'keterangan'=>''
        ];
        $bensin = [
            'id_pegawai'=>$karyawan->id,
            'jumlah'=>$datas['uang_bensin'],
            'status'=>"uang_bensin",
            'keterangan'=>''
        ];
        GajiModel::create($gaji);
        GajiModel::create($makan);
        GajiModel::create($bensin);
        return redirect()->route('karyawan.index')->with('success','Data Berhasil Ditambahkan');
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
        $data = KaryawanModel::find($id);
        return view('pages.karyawan.update',compact($data));
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
        $datas = $request->all();
        $data =[
            "nama"=>$datas['nama'],
            'id_cabang'=>$datas['cabang'],
            'jabatan'=>$datas['jabatan'],
            'gaji'=>$datas['gaji'],
            'id_shift'=>"shift",
            'id_absen' => 'id_absen'

        ];
        $gaji = [
            'id_pegawai'=>$id,
            'jumlah'=>$datas['gaji'],
            'status'=>"gaji_pokok",
            'keterangan'=>'data_gaji'

        ];
        GajiModel::where('id_pegawai',$id)->update($gaji);
        KaryawanModel::find($id)->update($data);
        return redirect()->route('karyawan.index')->with('success','Data Berhasil DiPerbarui');
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
