@extends('master')

@section('isi')

<div class="container-fluid px-4">
    <h1 class="mt-4">Perizinan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Perizinan</li>
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
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Orang Tua</th>
                        <th>Tanggal Izin</th>
                        <th>Tanggal Masuk Kembali</th>
                        <th>Keterangan Izin</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Orang Tua</th>
                        <th>Tanggal Izin</th>
                        <th>Tanggal Masuk Kembali</th>
                        <th>Keterangan Izin</th>
                        <th>aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($izin as $i)
                        
                    
                    <tr>
                        <td>{{ $i->id_izin }}</td>
                        <td>{{ $i->id_orang_tua }}</td>
                        <td>{{ $i->tanggal_izin }}</td>
                        <td>{{ $i->tanggal_masuk }}</td>
                        <td>{{ $i->keterangan }}</td>
                        <td><a href="/izin/edit/{{$i->id_izin}}" type="button" class="btn btn-warning btn-sm"><i class="fa fa-edit">Edit</i></a>
                            <a href="/izin/hapus/{{$i->id_izin}}" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Lo Yakin Mau Menggelapkan Kunjungan?');"><i class="fa fa-trash">Hapus</i></a>
                         </td>
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