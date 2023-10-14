<?php

namespace App\Imports;
use Illuminate\Support\Collection;
use App\AbsenModel;
use App\ShiftModel;
use App\KaryawanModel;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;

class SolutionsImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function  collection(Collection $collection)
    {
        foreach($collection as $item){
            // data id 0
            // data time 1
            $absen = new AbsenModel;
            if ($item[2] <= 1){
                $data = $item[1];
                $data = strtotime($data);
                $absen_times = Carbon::createFromTimestamp((int)($data - 25569) * 86400);
                dd($absen_times);
                if($absen_times !== false){
                    $absen_time = date('H:i:s', $absen_times);
                    $absen_tanggal = date('Y-m-d',$absen_times);
                    $check_id = AbsenModel::where('tanggal',$absen_tanggal)->where('id_pegawai',$item[0])->value('id');
                    if(!empty($check_id)){
                        $id_shift = KaryawanModel::where('id_absen',$item[0])->value('id_shift');
                        $shift_pulang = ShiftModel::where('id',$id_shift)->value('jam_pulang');
                            if($absen_time > $shift_pulang){
                                $status = AbsenModel::where('tanggal',$absen_tanggal)->where('id_pegawai',$item[0])->value('status');
                                if($status == "tepat_waktu"){
                                    AbsenModel::where('id',$check_id)->update([
                                        'absen_pulang'=>$absen_time,
                                        'status'=>'tidak_tepat_waktu'
                                    ]);
                                }
                            }
                            AbsenModel::where('id',$check_id)->update([
                                'absen_pulang'=>$absen_time,
                            ]);
                    }
                    else{
                        $id_shift = KaryawanModel::where('id_absen',$item[0])->value('id_shift');
                        $shift_masuk = ShiftModel::where('id',$id_shift)->value('jam_masuk');
                        if($absen_time < $shift_masuk ){
                            $absen->id_pegawai= $item[0];
                            $absen->tanggal = $absen_tanggal;
                            $absen->absen_masuk = $absen_time;
                            $absen->status ='tidak_tepat_waktu';
                            $absen->save();
                        }
                        else{
                            $absen->id_pegawai= $item[0];
                            $absen->tanggal = $absen_tanggal;
                            $absen->absen_masuk = $absen_time;
                            $absen->status ='tepat_waktu';
                            $absen->save();
                        }
                    }
                }
            }
        }   
    }
}
