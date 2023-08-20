@extends('master')

@section('isi')
    
<div class="container-fluid px-4">
    <h1 class="mt-4">Tahun Ajaran</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Daftar Tahun Ajaran Santri</li>
    </ol>

    <div class="row">

        <form action="{{ route('updatekuota') }}" method="post">
            @csrf
            <input type="hidden" value="{{ $kuotaizin->id_kuota }}" name="id_kuota">
            <div class="form-floating mb-3">
               <select name="id_kelas" class="form-control">
                <option value="">- Pilih Jenis Izin -</option>
                    @foreach ($kelas as $k)
                <option value="{{ $k->id_kelas }}">{{ $k->nama_kelas }}</option>
                <option
                    value="{{ $k->id_kelas }}"@if ($k->id_kelas == $kuotaizin->id_kelas) selected @endif>
                    {{ $k->nama_kelas }}</option>
                    @endforeach
               </select>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" type="number" name="kuota_izin" placeholder="Masukkan Jumlah Kuota" id="jumlahkuota" value="{{ $kuotaizin->kuota_izin }}">
                <label for="jumlahkuota">Jumlah Kuota (Orang)</label>
            </div>

            <button class="btn btn-primary" type="submit">
                <i class="fa fa-save"></i> Simpan Kuota Izin
            </button>
            <a href="{{ route('kuotaizin') }}" class="btn btn-danger">
                <i class="fa fa-close"></i>
                Batal
            </a>
        </form>
    </div>
</div>
@endsection