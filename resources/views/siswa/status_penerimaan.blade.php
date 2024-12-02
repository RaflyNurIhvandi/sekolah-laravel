@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="kotak_status kts">
            <div class="cn content">
                <div class="kiri atas">
                    <center>
                        @foreach($sis as $s)
                            @if($s->status_siswa == "DITERIMA")
                                <h1 class="mt-5 sl selamat" style="color: white;"><b>Selamat !</b></h1>
                                <p class="des ds" style="color: white;"><b>Anda dinyatakan diterima di {{ $s->nama_sekolah }}<br>pada seleksi Penerimaan siswa baru.</b></p>
                                <p class="des ds" style="color: white;"><b>Kamu telah berhasil melewati bermacam seleksi untuk masuk {{ $s->nama_sekolah }}. Tapi, jangan cepat puas, Kamu harus mempertahankan prestasi jika ingin sukses di kemudian hari</b></p>
                                <p class="des ds" style="color: white;"><b>Tahun ajaran 2022 / 2023</b></p>
                            @elseif($s->status_siswa == "DITOLAK")
                                <h1 class="mt-5 sl selamat" style="color: white;"><b>Mohon Maaf !</b></h1>
                                <p class="des ds" style="color: white;"><b>Anda dinyatakan tidak lolos seleksi Penerimaan siswa baru di {{ $s->nama_sekolah }}<br></b></p>
                                <p class="des ds" style="color: white;"><b>Jangan putus asa dan tetap semangat. Tempat terbaik masih menunggumu, jangan berhenti berusaha.</b></p>
                                <p class="des ds" style="color: white;"><b>Tahun ajaran 2022 / 2023</b></p>
                            @else
                                <h1 class="mt-5 sl selamat" style="color: white;"><b>Sukses !</b></h1>
                                <p class="des ds" style="color: white;"><b>Form pendaftaran anda berhasil dikirim ke {{ $s->nama_sekolah }}<br></b></p>
                                <p class="des ds" style="color: white;"><b>Silahkan menunggu 2 - 3 hari lagi untuk info konfirmasi dari sekolah.</b></p>
                                <p class="des ds" style="color: white;"><b>Tahun ajaran 2022 / 2023</b></p>
                            @endif
                        @endforeach
                    </center>
                </div>
                <div class="kanan bawah">
                    <center>
                        <img src="/siswa/gambar/logo_belajar.png" alt="" class="logo lg log">
                    </center>
                </div>
            </div>
        </div>
        <div class="kotak_keterangan ktk_ktr">
            <div class="kotak_kiri ki">
                <div class="mb-3">
                    <div class="d-flex">
                        <div class="icn ic">
                            <i class="fa fa-graduation-cap fa-xl mt-2"></i>
                        </div>
                        <div class="dta dt">
                            <p class="content_data labl lb" style="color: #838383;"><b>Nama Sekolah<br></b></p>
                            @foreach($sis as $a)
                                <p class="content_data isi is"><b>{{ $s->nama_sekolah }}</b></p>
                            @endforeach
                            <h2></h2>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="d-flex">
                        <div class="icn ic">
                            <i class="fa fa-book fa-xl mt-2"></i>
                        </div>
                        <div class="dta dt">
                            <p class="content_data labl lb" style="color: #838383;"><b>Prodi Sekolah<br></b></p>
                            @foreach($sis as $a)
                                <p class="content_data isi is"><b>{{ $s->nama_jurusan }}</b></p>
                            @endforeach
                            <h2></h2>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="d-flex">
                        <div class="icn ic">
                            <i class="fa fa-user fa-xl mt-2"></i>
                        </div>
                        <div class="dta dt">
                            <p class="content_data labl lb" style="color: #838383;"><b>Tempat / Tanggal Lahir<br></b></p>
                            @foreach($sis as $a)
                                <p class="content_data isi is"><b>{{ $s->tempat_lahir_siswa }}, {{ $s->tanggal_lahir_siswa }}</b></p>
                            @endforeach
                            <h2></h2>
                        </div>
                    </div>
                </div>
                <div>
                    @foreach($sis as $s)
                        @if($s->status_siswa == 'DITERIMA')
                            <a href="/cetak/bukti/penerimaan/{{ $s->no_siswa }}" target="_blank" class="btn btn-primary" style="width: 100%;">Cetak Bukti Penerimaan</a>
                        @elseif($s->status_siswa == 'DITOLAK')
                            <a href="/cetak/bukti/penerimaan/{{ $s->no_siswa }}" target="_blank" class="btn btn-secondary" style="width: 100%;" onclick="return false;">Cetak Bukti Penerimaan</a>
                        @else
                            <a href="/cetak/bukti/penerimaan/{{ $s->no_siswa }}" target="_blank" class="btn btn-secondary" style="width: 100%;" onclick="return false;">Cetak Bukti Penerimaan</a>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="kotak_kanan ka">
                <h4 class="tex-top t-t"><b>Data Peserta</b></h4>
                <p class="con-text c-t" style="color: #838383;"><b>Berikut adalah data yang telah anda gunakan untuk melakukan pendaftaran<br></b></p>
                <div class="kotak_data_peserta kdp">
                    <div class="jarak">
                        <p class="lbl-atas lb-atas"><b>NISN</b></p>
                        @foreach($sis as $s)
                            <p class="lbl-bawah lb-bawah"><b>{{ $s->nisn }}</b></p>
                        @endforeach
                    </div>
                    <div class="jarak">
                        <p class="lbl-atas lb-atas"><b>Nama Lengkap</b></p>
                        @foreach($sis as $s)
                            <p class="lbl-bawah lb-bawah"><b>{{ $s->nama_siswa }}</b></p>
                        @endforeach
                    </div>
                    <div class="">
                        <p class="lbl-atas lb-atas"><b>Nama Sekolah Asal</b></p>
                        @foreach($sis as $s)
                            <p class="lbl-bawah lb-bawah"><b>{{ $s->sekolah_asal_siswa }}</b></p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @foreach($sis as $s)
            @if($s->status_siswa == 'DITERIMA')
                <center class="mt-4">
                    <a href="/go_school/{{ $s->no_siswa }}" class="btn btn-primary" style="width: 180px;;">GO TO GO SCHOOL</a>
                </center>
            @else
            @endif
        @endforeach
        <div class="mt-5 con-fot c-f">
            @foreach($icn as $ic)
                <img src="/gambar/profile_sekolah/{{ $ic->gambar_profile }}" alt="" width="40">
            @endforeach
            @foreach($sis as $s)
                <p class="txt-fot t-f mt-3"><b>Portal Penerimaan Pserta Didik Baru {{ $s->nama_sekolah_siswa }}</b></p>
            @endforeach
            <p class="txt-fot t-f mt-3"><b>Tahun Ajaran 2023 / 2024</b></p>
        </div>
    </div>
    <div class="info">
        <div class="txt-bwh-kiri">INFORMASI</div>
        <div class="txt-bwh-kanan">PRA - PENDAFTARAN</div>
    </div>
@endsection
@section('css')
    <style>
        .txt-bwh-kanan{
            width: 50%;
            text-align: right;
        }
        .txt-bwh-kiri{
            width: 50%;
        }
        .info{
            display: flex;
            background-color: #007fe7;
            color: rgb(255, 255, 255);
            padding: 1%;
            padding-top: 1.5%;
        }
        .txt-fot{
            color: #838383;
            font-size: 18px;
            line-height: 13px;
        }
        .con-fot{
            text-align: center;
        }
        .jarak{
            margin-bottom: 25px;
        }
        .lbl-bawah{
            font-size: 19px;
            line-height: 10px;
        }
        .lbl-atas{
            font-size: 15px;
            color: #838383;
            line-height: 10px;
        }
        .kotak_data_peserta{
            background-color: #e9e9e9;
            border-radius: 10px;
            padding: 4%;
        }
        .con_text{
            font-size: 16px;
        }
        .isi{
            font-size: 22px;
        }
        .labl{
            font-size: 16px;
        }
        .content_data{
            line-height: 13px;
        }
        .dta{
            width: 92%;
        }
        .icn{
            width: 8%;
        }
        .kotak_kanan{
            width: 48%;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.1);
            padding-top: 2%;
            padding-bottom: 1%;
            padding-right: 3%;
            padding-left: 3%;
            border-radius: 10px;
        }
        .kotak_kiri{
            width: 48%;
            margin-right: 4%;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.1);
            padding-top: 2%;
            padding-bottom: 2%;
            padding-right: 3%;
            padding-left: 3%;
            border-radius: 10px;
        }
        .kotak_keterangan{
            display: flex;
            margin-top: 30px;
        }
        .des{
            font-size: 18px;
        }
        .sl{
            font-size: 50px;
        }
        .logo{
            width: 400px;
        }
        .cn{
            display: flex;
        }
        .kanan{
            width: 48%;
        }
        .kiri{
            width: 48%;
            margin-right: 4%;
        }
        .kotak_status{
            width: 100%;
            background: linear-gradient(#007fe7, #47d5fc);
            border-radius: 13px;
            padding: 2%;
        }
        /* satu */
        @media screen and (max-width: 991px) {
            .ka{
                width: 100%;
                margin-top: 20px;
                padding-top: 4%;
                padding-bottom: 3%;
                padding-right: 4%;
                padding-left: 4%;
            }
            .ki{
                width: 100%;
                padding-top: 4%;
                padding-bottom: 3%;
                padding-right: 4%;
                padding-left: 4%;
            }
            .ktk_ktr{
                display: block;
            }
            .kts{
                padding-right: 5%;
                padding-left: 5%;
            }
            .bawah{
                width: 100%;
            }
            .atas{
                width: 100%;
            }
            .content{
                display: block;
            }
            .lg{
                width: 500px;
            }
        }
        /* dua */
        @media screen and (max-width: 767px) {
            .lg{
                width: 400px;
            }
            .ki{
                padding-bottom: 3%;
            }
        }
        /* tiga */
        @media screen and (max-width: 575px) {
            .t-f{
                font-size: 16px;
                line-height: 20px;
            }
            .c-f{
                text-align: left;
            }
            .kdp{
                padding: 5%;
            }
            .lb-bawah{
                font-size: 17px;
            }
            .lb-atas{
                font-size: 13px;
            }
            .ka{
                padding-top: 5%;
                padding-bottom: 3%;
                padding-right: 5%;
                padding-left: 5%;
            }
            .ki{
                padding-top: 5%;
                padding-bottom: 3%;
                padding-right: 5%;
                padding-left: 5%;
            }
            .dt{
                width: 90%;
            }
            .ic{
                width: 10%;
            }
            .is{
                font-size: 19px;
            }
            .lb{
                font-size: 14px;
            }
            .ds{
                font-size: 15px;
            }
            .selamat{
                font-size: 40px;
            }
            .lg{
                width: 380px;
            }
        }
        /* empat */
        @media screen and (max-width: 464px) {
            .lb-bawah{
                font-size: 16px;
            }
            .lb-atas{
                font-size: 12px;
            }
            .kdp{
                padding: 7%;
            }
            .ka{
                padding-top: 5%;
                padding-bottom: 4%;
                padding-right: 7%;
                padding-left: 7%;
            }
            .is{
                font-size: 18px;
            }
            .lb{
                font-size: 13px;
            }
            .dt{
                width: 90%;
            }
            .ic{
                width: 10%;
                margin-right: 4%;
            }
            .ki{
                padding-top: 5%;
                padding-bottom: 4%;
                padding-right: 7%;
                padding-left: 7%;
            }
            .dt{
                width: 90%;
            }
            .ic{
                width: 10%;
            }
            .lg{
                width: 300px;
            }
        }
    </style>
@endsection
@section('js')
    <script src="/fa_icon/faicon.all.js"></script>
@endsection
