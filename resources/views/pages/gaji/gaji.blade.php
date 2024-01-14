@extends('layout.master')
@php

    use Carbon\Carbon;

@endphp
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush
@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Shift</a></li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-header text-start">
            <h4 class="card-title">Data Karyawan</h4>
            <div class="btn-group" role="group" aria-label="Filter Status">
                <input type="checkbox" id="filterAll" name="filterStatus[]" class="btn-check" autocomplete="off" checked>
                <label class="btn btn-primary m-1" for="filterAll">Semua</label>

                <input type="checkbox" id="filterOnTime" name="filterStatus[]" class="btn-check" autocomplete="off">
                <label class="btn btn-primary m-1" for="filterOnTime">Tepat Waktu</label>

                <input type="checkbox" id="filterLate" name="filterStatus[]" class="btn-check" autocomplete="off">
                <label class="btn btn-primary m-1" for="filterLate">Terlambat</label>

                <input type="checkbox" id="filterOvertime" name="filterStatus[]" class="btn-check" autocomplete="off">
                <label class="btn btn-primary m-1" for="filterOvertime">Lembur</label>
            </div>

            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script>
                $(document).ready(function () {

                    $('input[name="filterStatus[]"]').change(function () {
                        var mo = new URLSearchParams(window.location.search).get('mo');
            var idd = new URLSearchParams(window.location.search).get('idd');
            var status = $(this).attr('id') === 'filterLate' ? 'tidak_tepat_waktu' : 'tepat_waktu';

            // Update the URL
            var newUrl = window.location.pathname + '?mo=' + mo + '&idd=' + idd + '&status=' + status;
            window.history.pushState({ path: newUrl }, '', newUrl);

                        var isChecked = $(this).is(':checked');
                        $(this).next('label').toggleClass('btn-primary', !isChecked).toggleClass('btn-primary', isChecked);

                        if ($(this).attr('id') === 'filterAll' && $(this).is(':checked')) {
                            // If "Semua" is checked, uncheck other checkboxes
                            $('input[name="filterStatus[]"]').not(this).prop('checked', false);
                        } else if ($(this).attr('id') !== 'filterAll' && $(this).is(':checked')) {
                            // If other checkboxes are checked, uncheck "Semua"
                            $('#filterAll').prop('checked', false);

                            // Ensure that "Tepat Waktu" and "Terlambat" cannot be checked at the same time
                            if ($(this).attr('id') === 'filterOnTime') {
                                $('#filterLate').prop('checked', false);
                            } else if ($(this).attr('id') === 'filterLate') {
                                $('#filterOnTime').prop('checked', false);
                            }
                        }
                    });
                });
            </script>


        </div>
      <div class="card-body">
        {{-- <p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p> --}}
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
                <tr>
                  <th>No</th>
                  <th>Gaji Utama</th>
                  <th>Pengurangan / Menit Terlambat</th>
                  <th>Penambahan</th>
                  <th>tes</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="tb-category">
                @foreach ($absen as $item)
                @php
                    $start_time = Carbon::createFromFormat('H:i', $item->absen_masuk);

                    // Check if absen_pulang is not NULL before using Carbon::createFromFormat
                    $end_time = $sm ? Carbon::createFromFormat('H:i', $sm) : null;
                    // for showing the data $minutes_difference ?? 'N/A'
                    $minutes_difference = $end_time ? $end_time->diffInMinutes($start_time) : null;
                    $telat = $minutes_difference*$gpm;
                    $finalValue = $gaji->jumlah - $telat;
                    $finalValue = ($finalValue == $gaji->jumlah) ? 0 : $finalValue; //the money left after being cut


                @endphp

                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ "Rp " . number_format($gaji->jumlah, 0, ',', '.') }}</td>
                    <td>{{ "Rp " . number_format($minutes_difference*$gpm, 0, ',', '.') }} / {{$minutes_difference}}</td>
                    <td>{{ $item->absen_masuk }}</td>
                    <td>{{ $item->absen_pulang ?? 0 }}</td>
                    <td>{{$item->keterangan}}</td>
                </tr>
            @endforeach

              </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush
