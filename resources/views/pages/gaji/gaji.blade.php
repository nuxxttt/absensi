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
        <div class="card-header text-center">
            <h3 class="">Gaji Karyawan</h3>
        </div>
      <div class="card-body">
        <div class="gaji">
          <div class="container">
            <div class="row">
              <div class="col-sm-3">
                <div class="title1  title mt-3 mb-3">
                  <h5 class="title">Nama karyawan</h5>
                </div>
              </div>
              <div class="col-sm">
                <div class="isi1  mt-3 mb-3 grid align-center">
                  <p class="isi">isi pertama</p>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-3">
                <div class="title1  title mt-3 mb-3">
                  <h5 class="title">Jabatan</h5>
                </div>
              </div>
              <div class="col-sm ">
                <div class="isi1  mt-3 mb-3 grid align-center">
                  <p class="isi">isi kedua</p>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-3">
                <div class="title1  title mt-3 mb-3">
                  <h5 class="title">Gaji Pokok</h5>
                </div>
              </div>
              <div class="col-sm ">
                <div class="isi1  mt-3 mb-3 grid" style="display: grid; align-items: center;">
                  <p class="isi">isi ketiga</p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <div class="title1  title mt-3 mb-3">
                  <h5 class="title"></h5>
                </div>
              </div>
              <div class="col-sm ">
                <div class="isi1  mt-3 mb-3 grid" style="display: grid; align-items: center;">
                  <p class="isi">isi ketiga</p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <div class="title1  title mt-3 mb-3">
                  <h5 class="title">Uang Makan</h5>
                </div>
              </div>
              <div class="col-sm ">
                <div class="isi1  mt-3 mb-3 grid" style="display: grid; align-items: center;">
                  <p class="isi">isi ketiga</p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <div class="title1  title mt-3 mb-3">
                  <h5 class="title">Kalimat Ketiga</h5>
                </div>
              </div>
              <div class="col-sm ">
                <div class="isi1  mt-3 mb-3 grid" style="display: grid; align-items: center;">
                  <p class="isi">isi ketiga</p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <div class="title1  title mt-3 mb-3">
                  <h5 class="title">Kalimat Ketiga</h5>
                </div>
              </div>
              <div class="col-sm ">
                <div class="isi1  mt-3 mb-3 grid" style="display: grid; align-items: center;">
                  <p class="isi">isi ketiga</p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <div class="title1  title mt-3 mb-3">
                  <h5 class="title">Kalimat Ketiga</h5>
                </div>
              </div>
              <div class="col-sm ">
                <div class="isi1  mt-3 mb-3 grid" style="display: grid; align-items: center;">
                  <p class="isi">isi ketiga</p>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>





@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush
