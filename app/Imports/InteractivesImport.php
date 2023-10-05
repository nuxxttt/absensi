<?php

namespace App\Imports;
use Illuminate\Support\Collection;
use App\AbsenModel;
use App\ShiftModel;
use App\KaryawanModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;


class InteractivesImport implements ToCollection
{
    // /**
    // * @param array $row
    // *
    // * @return \Illuminate\Database\Eloquent\Model|null
    // */
    // public function model(array $row)
    // {
    //     // return new AbsenModel([
    //     //     //
    //     // ]);
    // }
     /**
     * @param collection $collection
     *
     * 
    */
    public function collection(Collection $collection){
        $data = $collection->slice(4);
        foreach ($data as $item){
            $absen_masuk = strtotime($item[4]);
            $absen = new AbsenModel;
            // $absen->tanggal = $item[0];
            // $absen->absen_masuk = $item[1];
            // $absen->absen_pulang = $item[2];
            // $absen->save();
            $id_shift = KaryawanModel::where('id_absen',$item[0])->value('id_shift');
            $shift_masuk = ShiftModel::where('id',$id_shift)->value('jam_masuk');
            $shift_masuk = strtotime($shift_masuk);
            if($item[4] != null){
                if($absen_masuk < $shift_masuk){
                    $absen->id_pegawai= $item[1];
                    $absen->tanggal = $item[3];
                    $absen->absen_masuk = $item[4];
                    $absen->absen_pulang = $item[5];
                    $absen->status ='tepat_waktu';
                    $absen->save();
                }
                else{
                    $absen->id_pegawai= $item[1];
                    $absen->tanggal = $item[3];
                    $absen->absen_masuk = $item[4];
                    $absen->absen_pulang = $item[5];
                    $absen->status ='terlambat';
                    $absen->save();
                }
            }
            
        }
    }
}
