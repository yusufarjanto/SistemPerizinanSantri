@extends('master')
@section('isi')

    <div class="container-fluid px-4">
        <h1 class="mt-4">Menu Perizinan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Data Perizinan</li>
        </ol>
        <div class="row">
            <div class="col-md-12">

                @if (Auth::user()->id_role == '1')
                @elseif(Auth::user()->id_role == '2')

                @elseif(Auth::user()->id_role == '3')
                    <div style="text-align: right; margin-bottom:10px">
                        <a href="{{ route('add') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add
                            Permission</a>
                    </div>
                    <table class="table table-bordered">
                        @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Jenis Izin</th>
                                <th>Lama Izin</th>
                                <th>Tanggal Izin</th>
                                <th>Created at</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perizinan as $pj)
                                <tr @if ($pj->status == 0) style="background-color:#ffbcbc" @endif>
                                    <td>{{ $loop->iteration }}.@if ($pj->status == 0)
                                            <i style="font-style: italic">draft</i>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($pj->jenis_izin == null)
                                            <i>Belum di-set</i>
                                        @else
                                            {{ $pj->jenis_izin->jenis_izin }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($pj->lama_izin == "")
                                            <i>belum di-set</i>
                                        @endif
                                        {{ $pj->lama_izin }} Hari
                                    </td>
                                    <td>
                                        @if ($pj->tanggal_izin == "")
                                            <i>belum di-set</i>
                                        @endif
                                        {{ $pj->tanggal_izin }}
                                    </td>
                                    <td>{{ $pj->created_at }}</td>
                                    <td>
                                        @if ($pj->status == 0)
                                            <a href="perizinan/tambahizin/{{ $pj->id_izin }}"
                                                class="btn btn-primary btn-sm">Lanjutkan Izin</a>
                                            <a href="perizinan/hapus/{{ $pj->id_izin }}" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apakah yakin ingin menghapus data?')">Hapus</a>
                                        @else
                                            <button class="btn btn-success btn-sm">Lihat</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>

    </div>

@endsection
