@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Shift</a></li>
  </ol>
</nav>

@php
    use Carbon\Carbon;
@endphp

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title text-center mt-2">Data Penggajian</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="tb-category">
              @foreach ($data as $item)
                <tr>
                  <td>{{ $loop->index+1 }}</td>
                  <td>{{ Carbon::parse($item->tanggal)->formatLocalized('%B %Y') }}</td>
                  <td>
                    <div class="text-end">
                      <a href="{{ url('/penggajian/'. $idd . "?mo=" . Carbon::parse($item->tanggal)->format('Y-m')) }}" class="btn btn-primary btn-sm">View</a>
                    </div>
                  </td>
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
