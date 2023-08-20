@extends('master')

@section('isi')
   

<div class="col-lg-12" style="padding-left: 25%, padding-right :25%">
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Data Perizinan</h3></div>
        <div class="card-body">
            <form action="{{ route('update') }}" method="post">
                @csrf
                <input type="hidden" name="id_izin" value="{{ $izin->id_izin }}">
                <div class="col-lg-5">
                <div class="form-floating mb-3">
                    <div class="form-group">
                        <label >Orang Tua</label>
                       <select style="width:50%" name="id_orang_tua" class="form-control">
                        <option value=""> Pilih Orang Tua </option>
                        <option value="1" @if($izin->id_orang_tua == "1") selected @endif> Orang Tua Ayan </option>
                        <option value="2" @if($izin->id_orang_tua == "2") selected @endif> Orang Tua Andi </option>
                        <option value="3" @if($izin->id_orang_tua == "3") selected @endif> Orang Tua Yusuf </option>
                       </select>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="inputPassword" value="{{ $izin->tanggal_izin }}" name="tanggal_izin" type="date" placeholder="tanggal">
                    <label for="inputPassword">tanggal izin</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="inputPassword" value="{{ $izin->tanggal_masuk }}" name="tanggal_masuk" type="date" placeholder="tanggal">
                    <label for="inputPassword">tanggal masuk</label>
                </div>
                
                <div class="form-floating mb-3">
                    <input class="form-control" id="inputEmail" name="keterangan" value="{{ $izin->keterangan }}" type="text" placeholder="Sakit">
                    <label for="inputEmail">Keterangan</label>
                </div>
                </div>
                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection