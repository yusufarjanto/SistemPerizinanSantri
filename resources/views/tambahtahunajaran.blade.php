@extends('master')

@section('isi')
    
<div class="container-fluid px-4">
    <h1 class="mt-4">Tahun Ajaran</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Daftar Tahun Ajaran Santri</li>
    </ol>

    <div class="row">

        <form action="{{ route('simpantahunajaran') }}" method="post">
            @csrf
            <div class="form-floating mb-3">
                <input class="form-control" type="text" name="tahun_ajaran" placeholder="Masukkan tahun ajaran" id="tahun_ajaran" required>
                <label for="tahun-ajaran">tahun ajaran</label>
            </div>
            <div class="form-floating mb-3">
               <select name="semester" class="form-control">
                <option value="1">Semester 1</option>
                <option value="2">Semester 2</option>
               </select>
            </div>
            <button class="btn btn-primary" type="submit">
                <i class="fa fa-save"></i> Simpan Tahun Pelajaran
            </button>
            <a href="{{ route('tampiltahunajaran') }}" class="btn btn-danger">
                <i class="fa fa-close"></i>
                Batal
            </a>
        </form>
    </div>
</div>
@endsection