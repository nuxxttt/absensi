    @extends('layout.master')
@php
    use App\CabangModel;
@endphp
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
            action="{{ route('shift.update', $data->id) }}" 
            method="POST" 
            enctype="multipart/form-data"    
            class="forms-sample">
                @csrf
                @method('PUT')
                @php

                @endphp
            <div class="mb-3">
                <label for="exampleInputUsername1" class="form-label">Nama</label>
                <input type="text" name="name"  value="{{$data->name}}"class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Nama Shift">
            </div>
            <div class="mb-3">
                <label for="exampleInputUsername4" class="form-label">Jam Masuk</label>
                <input type="time" name="jam_masuk"  value="{{$data->jam_masuk}}"class="form-control" id="exampleInputUsername4" autocomplete="off" placeholder="Alamat Cabang">
            </div>
            <div class="mb-3">
                <label for="exampleInputUsername4"  class="form-label">Jam Pulang</label>
                <input type="time" name="jam_pulang" value="{{$data->jam_pulang}}" class="form-control" id="exampleInputUsername4" autocomplete="off" placeholder="Alamat Cabang">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Cabang</label>
                <select class="form-select" name="id_cabang" id="exampleFormControlSelect1">
                @php
                    $cabang = $data->id_cabang;
                    $data = CabangModel::all();

                @endphp
                @foreach ($data as $item)
                    <option @if ($cabang == $item->id )
                        
                    @endif
                    value="{{ $item->id }}">{{ $item->nama }}</option>                
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
