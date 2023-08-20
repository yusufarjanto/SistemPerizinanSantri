@extends('master')

@section('isi')
    
<div class="container-fluid px-4">
    <h1 class="mt-4">Kuota Izin</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Daftar Kuota Izin Santri</li>
    </ol>

    <div class="row">
        @if(session('message'))
        <div class="alert alert-success alert-dismissible">
            {{session('message')}}
        </div>
        @endif
        <div class="col-md-12">
            <div style="text-align: end; margin-bottom : 10px">
                <a href="{{ route('createkuotaizin') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah
                    Kuota Izin</a>
            </div>
            <table class="table table-bordered">
                <thead>
                <td>No.</td>
                <td>kelas</td>
                <td>Kuota Izin</td>
                </thead>
                <tbody>
                    @foreach ($kuotaizin as $k)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $k->kelas->nama_kelas }}</td>
                        <td>{{ $k->kuota_izin }} Orang</td>
                        <td>
                            <a href="kuota/edit/{{$k->id_kuota}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="kuota/delete/{{$k->id_kuota}}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin kah kamu untuk menghapus kuota?');"><i class="fa fa-trash"></i></a>
                          </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection