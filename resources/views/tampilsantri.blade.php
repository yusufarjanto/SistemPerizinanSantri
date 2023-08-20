@extends('master')

@section('isi')

<div class="container-fluid px-4">
    <h1 class="mt-4">Santri</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Daftar Santri</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable Example
        </div>
        <div class="card-body">
            @if(session('message'))
                <div class="alert alert-success alert-dismissible">
                    {{session('message')}}
                </div>
                @endif
            <table id="datatablesSimple" class="tb tb-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id Santri</th>
                        <th>ID Orang Tua</th>
                        <th>NIS</th>
                        <th>Nama Santri</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Id Santri</th>
                        <th>ID Orang Tua</th>
                        <th>NIS</th>
                        <th>Nama Santri</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($santri as $i)
                        
                    
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $i->id_santri }}</td>
                        <td>{{ $i->id_orang_tua }}</td>
                        <td>{{ $i->nis }}</td>
                        <td>{{ $i->nama_santri }}</td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
                <div class="card-tools">
                    <a class="btn btn-primary" href="{{ route('tambahizin') }}"><i class="fa fa-plus"></i>Tambah izin</a>
                    <a class="btn btn-warning" href="{{route('cetakperizinan')}}" target="_blank"><i class="fa fa-print"></i> Cetak PDF</a>

                </div>
        </div>
    </div>
</div>

@endsection