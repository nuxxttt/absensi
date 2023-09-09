<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\CabangModel;

class cabang extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CabangModel::all();
        return view('pages.cabang.index',compact("data"));
    }
    public function absen($id){
        $data = CabangModel::find($id);
        return view('pages.cabang.absen',compact("data"));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.cabang.create');
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
            'lokasi'=>$datas['alamat'],
            'mesin_absen'=>$datas['mesin_absen'],
            'keterangan'=>$datas['keterangan'],
            'status'=>"active"

        ];
        CabangModel::create($data);
        return redirect()->route('cabang.index')->with('success','Data Berhasil Ditambahkan');
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
        $data = CabangModel::find($id);
        return view('pages.cabang.update',compact("data"));
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
            'lokasi'=>$datas['alamat'],
            'mesin_absen'=>$datas['mesin_absen'],
                'keterangan'=>$datas['keterangan'],
            'status'=>"active"

        ];
        CabangModel::where('id',$id)->update($data);
        return redirect()->route('cabang.index')->with('success','Data Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CabangModel::where('id',$id)->delete();
        return redirect()->route('cabang.index')->with('success','Data Berhasil Dihapus');
    }
}
