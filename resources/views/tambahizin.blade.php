@extends('master')

@section('isi')

    <style>
        .f1-steps {
            overflow: hidden;
            position: relative;
            margin-top: 20px;
        }

        .f1-progress {
            position: absolute;
            top: 24px;
            left: 0;
            width: 100%;
            height: 1px;
            background: #ddd;
        }

        .f1-progress-line {
            position: absolute;
            top: 0;
            left: 0;
            height: 1px;
            background: #338056;
        }

        .f1-step {
            position: relative;
            text-align: center;
            float: left;
            width: 25%;
            padding: 0 5px;
        }

        .f1-step-icon {
            display: inline-block;
            width: 40px;
            height: 40px;
            margin-top: 4px;
            background: #ddd;
            font-size: 16px;
            color: #fff;
            line-height: 40px;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 50%;
        }

        .f1-step.activated .f1-step-icon {
            background: #fff;
            border: 1px solid #338056;
            color: #338056;
            line-height: 38px;
        }

        .f1-step.active .f1-step-icon {
            width: 48px;
            height: 48px;
            margin-top: 0;
            background: #338056;
            font-size: 22px;
            line-height: 48px;
        }

        .f1-step p {
            color: #ccc;
        }

        .f1-step.activated p {
            color: #338056;
        }

        .f1-step.active p {
            color: #338056;
        }

        .f1 fieldset {
            display: none;
            text-align: left;
        }

        .f1-buttons {
            text-align: right;
        }

        .f1 .input-error {
            border-color: #f35b3f;
        }
    </style>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Perizinan</h1>
            <i class="breadcrumb-item active">Membuat Form Wizard Bootstrap</i>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('updatejenis') }}" method="post" class="f1">
                    @csrf
                    <input type="hidden" name="id_izin" value="{{ $izinTersimpan->id_izin }}">
                    <div class="f1-steps">
                        <div class="f1-progress">
                            <div class="f1-progress-line" data-now-value="25" data-number-of-steps="4" style="width: 25%;">
                            </div>
                        </div>
                        <div class="f1-step active">
                            <div class="f1-step-icon"><i class="fa fa-sitemap"></i></div>
                            <p>Jenis izin</p>
                        </div>
                        <div class="f1-step">
                            <div class="f1-step-icon"><i class="fa fa-calendar"></i></div>
                            <p>Alamat</p>
                        </div>
                        <div class="f1-step">
                            <div class="f1-step-icon"><i class="fa fa-key"></i></div>
                            <p>pengikut</p>
                        </div>
                        <div class="f1-step">
                            <div class="f1-step-icon"><i class="fa fa-address-book"></i></div>
                            <p>Sosial</p>
                        </div>
                    </div>
                    <!-- step 1 -->
                    <fieldset>
                        <div class="form-group">
                            <h4>Identitas Pribadi</h4>
                            <label>Jenis Izin</label>
                            @if ($izinTersimpan == '')
                                <select name="id_jenis_izin" class="form-control" required>
                                    <option value="">- Pilih Jenis Izin -</option>
                                    @foreach ($jenisIzin as $ji)
                                        <option value="{{ $ji->id_jenis_izin }}">{{ $ji->jenis_izin }}</option>
                                    @endforeach
                                </select>
                            @else
                                <select name="id_jenis_izin" class="form-control" required>
                                    <option value="">- Pilih Jenis Izin -</option>
                                    @foreach ($jenisIzin as $ji)
                                        <option
                                            value="{{ $ji->id_jenis_izin }}"@if ($ji->id_jenis_izin == $izinTersimpan->id_jenis_izin) selected @endif>
                                            {{ $ji->jenis_izin }}</option>
                                    @endforeach
                                </select>
                            @endif

                            <hr>
                        </div>
                        <div class="f1-buttons">
                            <a href="{{ route('perizinan') }}" type="button" class="btn btn-danger btn-previous"> <i
                                    class="fa fa-arrow-left"></i>Kembali</a>
                            <button type="submit" class="btn btn-primary btn-next">Selanjutnya <i
                                    class="fa fa-arrow-right"></i></button>
                        </div>
                    </fieldset>
                    <!-- step 2 -->
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // Form
            $('.f1 fieldset:first').fadeIn('slow');
        });
    </script>

@endsection
