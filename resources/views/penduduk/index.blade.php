@extends('layouts.adminlte.master')
@section('title','Penduduk')
@section('content')
<section class="content">
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-block bg-gradient-primary col-md-2" data-toggle="modal" data-target="#modal-create">Create Data</button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="penduduk-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>User Input</th>
                        <th>User Update</th>
                        <th>Tanggal Dibuat</th>
                        <th>Tanggal Diupdate</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</section>
@include('penduduk.create')
@include('penduduk.update')
@endsection
@push('scripts')
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script>
    var penduduk_route="{{ url('penduduk/json') }}"
</script>
<script src="{{ asset('js/penduduk.js') }}"></script>

@endpush