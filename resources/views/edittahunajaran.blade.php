@extends('master')

@section('isi')
    
<div class="row">

    <form action="{{ route('updatetahunajaran') }}" method="post">
        @csrf
        <input type="hidden" name="id_tahun_ajaran" value="{{ $tahunajaran->id_tahun_ajaran }}">
        <div class="form-floating mb-3">
            {{-- INPUT TAHUN AJARAN --}}
            <input class="form-control" type="text" name="tahun_ajaran" placeholder="Masukkan tahun ajaran" id="tahun_ajaran" value="{{ $tahunajaran->tahun_ajaran }}">
            <label for="tahun-ajaran">tahun ajaran</label>
        </div>
        <div class="form-floating mb-3">
            {{-- PILIH SEMESTER --}}
           <select name="semester" class="form-control">
            <option value="1" @if($tahunajaran->semester == "1") selected @endif>Semester 1</option>
            <option value="2"@if($tahunajaran->semester == "2") selected @endif>Semester 2</option>
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

@endsection