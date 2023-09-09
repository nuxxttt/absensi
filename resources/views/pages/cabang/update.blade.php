    @extends('layout.master')

    @section('content')
    <nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="database/cabang">Cabang</a></li>
        <li class="breadcrumb-item active" aria-current="page">update Cabang</li>
    </ol>
    </nav>
    <div class="row">
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">

            <h6 class="card-title">Input Cabang</h6>
            <form 
            action="{{ route('cabang.update', $data->id) }}" 
            method="POST" 
            enctype="multipart/form-data"    
            class="forms-sample">
                @csrf
                @method('PUT')
                @php

                @endphp
            <div class="mb-3">
                <label for="exampleInputUsername1" class="form-label">Nama</label>
                <input type="text" value="{{$data->nama}}" name="nama" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Nama Cabang">
            </div>
            <div class="mb-3">
                <label for="exampleInputUsername4" class="form-label">Alamat</label>
                <input type="text" name="alamat" value="{{$data->lokasi}}" class="form-control" id="exampleInputUsername4" autocomplete="off" placeholder="Alamat Cabang">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Mesin Absen</label>
                <select class="form-select" name="mesin_absen" id="exampleFormControlSelect1">
                    <option value="solution"
                        @if ("solution" == $data->mesin_absen)
                            selected
                        @endif
                        >{{"solution"}}
                    </option>
                    <option value="interactive"
                    @if ("interactive" == $data->mesin_absen)
                        selected
                    @endif
                    >{{"Interactive"}}
                </option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputUsername4" class="form-label">Keterangan</label>
                <input type="text" name="keterangan" value="{{$data->keterangan}}" class="form-control" id="exampleInputUsername4" autocomplete="off" placeholder="Keterangan Cabang">
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
