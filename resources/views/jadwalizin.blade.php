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
        <i class="breadcrumb-item active">Tentukan jadwal izin</i>
        <div class="row">
            <div class="col-md-12">
                @if ($izinTersimpan == '')
                    <i style="color : rgb(255, 0, 0);"><i class="fa fa-fa-warning"></i>データが見つかりません!</i>
                @else
                    <form action="{{ route('updatejadwal') }}" method="post" class="f1">
                        @csrf
                        <input type="hidden" name="id_izin" value="{{ $izinTersimpan->id_izin }}">
                        <div class="f1-steps">
                            <div class="f1-progress">
                                <div class="f1-progress-line" data-now-value="25" data-number-of-steps="4"
                                    style="width: 50%;">
                                </div>
                            </div>
                            <div class="f1-step active">
                                <div class="f1-step-icon"><i class="fa fa-sitemap"></i></div>
                                <p>Jenis izin</p>
                            </div>
                            <div class="f1-step active">
                                <div class="f1-step-icon"><i class="fa fa-calendar"></i></div>
                                <p>Jadwal</p>
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
                                <h4>Tentukan Jadwal Izin</h4>
                                <label>Tanggal Izin</label>
                                @if ($izinTersimpan->tanggal_izin == $izinTersimpan->tanggal_izin)
                                <input style="width:75%" type="date" name="tanggal_izin" class="form-control" value="{{ $izinTersimpan->tanggal_izin }}">
                                @else                                    
                                <input style="width:75%" type="date" name="tanggal_izin" class="form-control" required>
                                @endif
                                <br>
                                <label>Lama Izin (Hari)</label>
                                @if ($izinTersimpan->id_jenis_izin == 2)
                                    <input style="width:25%" type="number" name="lama_izin" class="form-control" value="{{ $izinTersimpan->lama_izin }}" required>
                                @else
                                    <input style="width:25%" type="number" name="lama_izin" class="form-control"
                                        value="1" readonly>
                                @endif
                                <hr>
                            </div>
                            <div class="f1-buttons">
                                <a href="/perizinan/tambahizin/{{ $izinTersimpan->id_izin }}" type="button" class="btn btn-danger btn-previous"> <i
                                        class="fa fa-arrow-left"></i>Kembali</a>
                                <button type="submit" class="btn btn-primary btn-next">Selanjutnya <i
                                        class="fa fa-arrow-right"></i></button>
                            </div>
                        </fieldset>
                        <!-- step 2 -->
                    </form>
                @endif
            </div>
        </div>
    </div>
    <script>
        function scroll_to_class(element_class, removed_height) {
            var scroll_to = $(element_class).offset().top - removed_height;
            if ($(window).scrollTop() != scroll_to) {
                $('html, body').stop().animate({
                    scrollTop: scroll_to
                }, 0);
            }
        }

        function bar_progress(progress_line_object, direction) {
            var number_of_steps = progress_line_object.data('number-of-steps');
            var now_value = progress_line_object.data('now-value');
            var new_value = 0;
            if (direction == 'right') {
                new_value = now_value + (100 / number_of_steps);
            } else if (direction == 'left') {
                new_value = now_value - (100 / number_of_steps);
            }
            progress_line_object.attr('style', 'width: ' + new_value + '%;').data('now-value', new_value);
        }

        $(document).ready(function() {
            // Form
            $('.f1 fieldset:first').fadeIn('slow');

            $('.f1 input[type="text"], .f1 input[type="password"], .f1 textarea').on('focus', function() {
                $(this).removeClass('input-error');
            });

            // step selanjutnya (ketika klik tombol selanjutnya)
            $('.f1 .btn-next').on('click', function() {
                var parent_fieldset = $(this).parents('fieldset');
                var next_step = true;
                // navigation steps / progress steps
                var current_active_step = $(this).parents('.f1').find('.f1-step.active');
                var progress_line = $(this).parents('.f1').find('.f1-progress-line');

                // validasi form
                parent_fieldset.find('input[type="text"], input[type="password"], textarea').each(
                    function() {
                        if ($(this).val() == "") {
                            $(this).addClass('input-error');
                            next_step = false;
                        } else {
                            $(this).removeClass('input-error');
                        }
                    });

                if (next_step) {
                    parent_fieldset.fadeOut(400, function() {
                        // change icons
                        current_active_step.removeClass('active').addClass('activated').next()
                            .addClass('active');
                        // progress bar
                        bar_progress(progress_line, 'right');
                        // show next step
                        $(this).next().fadeIn();
                        // scroll window to beginning of the form
                        scroll_to_class($('.f1'), 20);
                    });
                }
            });

            // step sbelumnya (ketika klik tombol sebelumnya)
            $('.f1 .btn-previous').on('click', function() {
                // navigation steps / progress steps
                var current_active_step = $(this).parents('.f1').find('.f1-step.active');
                var progress_line = $(this).parents('.f1').find('.f1-progress-line');

                $(this).parents('fieldset').fadeOut(400, function() {
                    // change icons
                    current_active_step.removeClass('active').prev().removeClass('activated')
                        .addClass('active');
                    // progress bar
                    bar_progress(progress_line, 'left');
                    // show previous step
                    $(this).prev().fadeIn();
                    // scroll window to beginning of the form
                    scroll_to_class($('.f1'), 20);
                });
            });

            // submit (ketika klik tombol submit diakhir wizard)
            $('.f1').on('submit', function(e) {
                // validasi form
                $(this).find('input[type="text"], input[type="password"], textarea').each(function() {
                    if ($(this).val() == "") {
                        e.preventDefault();
                        $(this).addClass('input-error');
                    } else {
                        $(this).removeClass('input-error');
                    }
                });
            });
        });
    </script>

@endsection
