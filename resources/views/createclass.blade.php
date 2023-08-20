@extends('master')

@section('isi')
    
<div class="container-fluid px-4">
    <h1 class="mt-4">Tahun Ajaran</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Daftar Tahun Ajaran Santri</li>
    </ol>

    <div class="row">

        <form action="{{ route('saveclass') }}" method="post">
            @csrf
            <div class="form-floating mb-3">
                <input class="form-control" type="text" name="nama_kelas" placeholder="Masukkan Nama Kelas" id="nama_kelas" required>
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