@extends('master')

@section('isi')
    
<div class="container-fluid px-4">
    <h1 class="mt-4">Tambah Kelas</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Create new class</li>
    </ol>

    <div class="row">

        <form action="{{ route('updateclass') }}" method="post">
            @csrf
            <input type="hidden" name="id_kelas" value="{{ $kelas->id_kelas }}">
            <div class="form-floating mb-3">
                <input class="form-control" type="text" name="nama_kelas" placeholder="Masukkan Nama Kelas" id="nama_kelas" value="{{ $kelas->nama_kelas }}">
                <label for="nama-kelas">Nama Kelas</label>
            </div>
            <button class="btn btn-primary" type="submit">
                <i class="fa fa-save"></i> Simpan Nama Kelas
            </button>
            <a href="{{ route('showkelas') }}" class="btn btn-danger">
                <i class="fa fa-close"></i>
                Batal
            </a>
        </form>
    </div>
</div>
@endsection