<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KaryawanModel;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\AbsenModel;



class gaji extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = KaryawanModel::all();
        return view("pages.gaji.index",compact("data"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tanggal_awal = date("Y-m-01");
        $tanggal_akhir = date("Y-m-t");
        $data = AbsenModel::where('id_pegawai', $id)->get();
        $idd = $id;
        //->whereBetween('created_at', [$tanggal_awal, $tanggal_akhir])
        return view("pages.gaji.show",compact("data", "idd"));
    }


    public function gaji(Request $request, $id)
    {
        $mo = $request->input('mo');
        $status = $request->input('status');

        $item = AbsenModel::where('id_pegawai', $mo)->first();
        $absen = AbsenModel::where('id_pegawai', $id)->get();

        $absen = $absen->filter(function ($item) use ($mo, $status) {
            return Carbon::parse($item->tanggal)->format('Y-m') == $mo && $item->status == $status;
        });

        $karyawan = KaryawanModel::where('id_absen', $id);

        $fn = $absen->all();  // Convert the filtered collection back to an array

        // Display the filtered dates (you can remove this line if not needed for debugging)

        return view("pages.gaji.gaji", compact("item", "absen"));
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
