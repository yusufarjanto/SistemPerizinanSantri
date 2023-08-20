@extends('master')

@section('isi')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tahun Ajaran</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Daftar Tahun Ajaran Santri</li>
        </ol>

        <div class="row">
            @if(session('message'))
            <div class="alert alert-success alert-dismissible">
                {{session('message')}}
            </div>
            @endif
            <div class="col-md-12">
                <div style="text-align: end; margin-bottom : 10px">
                    <a href="{{ route('tambahtahunajaran') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah
                        Tahun Ajaran</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                    <td>No.</td>
                    <td>Tahun Ajaran</td>
                    <td>Semester</td>
                    <td>Aksi</td>
                    </thead>
                    <tbody>
                        @foreach ($tahunajaran as $ta)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $ta->tahun_ajaran }}</td>
                            <td>{{ $ta->semester }}</td>
                            <td>
                                <a href="tahunajaran/edit/{{$ta->id_tahun_ajaran}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="tahunajaran/delete/{{$ta->id_tahun_ajaran}}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin kah kamu untuk menghapus data');"><i class="fa fa-trash"></i></a>
                              </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
