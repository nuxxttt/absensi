    @extends('layout.master')

    @section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/database/karyawan">Karyawan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update Karyawan</li>
        </ol>
    </nav>
    <div class="row">
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">

            <h6 class="card-title">Update Karyawan</h6>
            <form 
            action="{{ route('karyawan.update', $data->id) }}" 
            method="POST" 
            enctype="multipart/form-data"    
            class="forms-sample">
                @csrf
                @method('PUT')
                @php

                @endphp
    <div class="mb-3">
        <label for="exampleInputUsername1" class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" value="{{$data->nama}}" id="exampleInputUsername1" autocomplete="off" placeholder="Nama Karyawan">
    </div>
    <div class="mb-3">
        <label for="exampleInputUsername4" class="form-label">Jabatan</label>
        <input type="text" name="jabatan" class="form-control" value="{{$data->jabatan}}" id="exampleInputUsername4" autocomplete="off" placeholder="Jabatan Karyawan">
    </div>
    <div class="mb-3">
        <label for="exampleInputUsername4" class="form-label">Id Absen</label>
        <input type="number" name="id_absen" value="{{$data->id_absen}}" class="form-control" id="exampleInputUsername4" autocomplete="off" placeholder="">
    </div>
    <div class="mb-3">
        <label for="exampleInputUsername4" class="form-label">Gaji</label>
        <input type="number" name="gaji" value="{{$gaji}}" class="form-control" id="exampleInputUsername4" autocomplete="off" placeholder="">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlSelect1" class="form-label">Tugas Di Cabang</label>
        <select class="form-select" name="cabang" id="exampleFormControlSelect1">
            @php
                $data = CabangModel::all();
            @endphp
                @foreach ($data as $item)
                    <option @if ($item->id === $data->id_cabang)
                        selected
                    @endif value="{{$item->id}}">{{$item->nama}}</option>
                @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlSelect1" class="form-label">Tugas Di Cabang</label>
        <select class="form-select" name="shift" id="exampleFormControlSelect1">
            @php
                $data = ShiftModel::all();
            @endphp
                @foreach ($data as $item)
                    <option @if ($item->id === $data->id_shift)
                        selected
                    @endif value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
        </select>
    </div>
            <button type="submit" class="btn btn-primary me-2">Submit</button>
            <button  
            onclick="window.history.go(-1); return false;"
            type="submit"
            value="Cancel" class="btn btn-secondary">Cancel</button>
            </form>

        </div>
        </div>
    </div>
    </div>

    @endsection
