@extends('master')

@section('isi')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Daftar Kelas</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Daftar Kelas</li>
        </ol>

        <div class="row">
            @if(session('message'))
            <div class="alert alert-success alert-dismissible">
                {{session('message')}}
            </div>
            @endif
            <div class="col-md-12">
                <div style="text-align: end; margin-bottom : 10px">
                    <a href="{{ route('createclass') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah
                        Tahun Ajaran</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                    <td>No.</td>
                    <td>Kelas</td>
                    {{-- <td>Semester</td>
                    <td>Aksi</td> --}}
                    </thead>
                    <tbody>
                        @foreach ($kelas as $k)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $k->nama_kelas }}</td>
                            <td>
                                <a href="kelas/edit/{{$k->id_kelas}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="kelas/delete/{{$k->id_kelas}}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin kah kamu untuk menghapus kelas?');"><i class="fa fa-trash"></i></a>
                              </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
