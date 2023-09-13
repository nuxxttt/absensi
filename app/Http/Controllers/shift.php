<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShiftModel;

class shift extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ShiftModel::all();
        return view("pages.shift.index",compact("data"));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.shift.create");
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
        // falidasi required
        $this->validate($request,[
            "name" => "required",
            "jam_masuk" => "required",
            "jam_pulang" => "required",
            "id_cabang" => "required",
        ]);
        $data =[
            "name"=>$datas['name'],
            'jam_masuk'=>$datas['jam_masuk'],
            'jam_pulang'=>$datas['jam_pulang'],
            'id_cabang'=>$datas['id_cabang'],
        ];
        ShiftModel::create($data);
        return redirect()->route('shift.index')->with('success','Data Berhasil Ditambahkan');
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
        $data = ShiftModel::find($id);
        return view("pages.shift.update",compact("data"));
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
            "name"=>$datas['name'],
            'jam_masuk'=>$datas['jam_masuk'],
            'jam_pulang'=>$datas['jam_pulang'],
            'id_cabang'=>$datas['id_cabang'],
        ];
        ShiftModel::find($id)->update($data);
        return redirect()->route('shift.index')->with('success','Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ShiftModel::find($id)->delete();
        return redirect()->route('shift.index')->with('success','Data Berhasil DiHapus');
    }
}
