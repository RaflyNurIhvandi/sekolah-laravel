@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($psekolah as $i)
            <h1 class="text-dark text-center">{{ $i->nama_sekolah }}</h1>
            <div class="clearfix text-dark mt-5">
                <img src="/gambar/profile_sekolah/{{ $i->gambar_profile }}" class="col-md-3 float-md-end mb-3 ms-md-3 g-about" alt="">
                <p>
                    {{ $i->subjek }}
                </p>
                <p>
                    {{ $i->deskripsi }}
                </p>
                <h5 class="text-center alamat">Alamat</h5>
                <p class="text-center">{{ $i->alamat_sekolah }}</p>
            </div>
        @endforeach
    </div>
    <div class="box-fasilitas">
        <div class="container">
            <h2 class="text-center mb-4">Fasilitas Sekolah</h2>
            <div class="fasilitas">
                <div class="kiri kr">
                    <h4 class="text-center">Fasilitas Umum</h4>
                    @foreach($fumum as $u)
                        <div class="card mb-5 card-tambahan">
                            <img src="/gambar/fasilitas/umum/{{ $u->gambar }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $u->nama_fasilitas }}</h5>
                                <p class="card-text">{{ $u->keterangan }}</p>
                                <p class="card-text">Jumlah : {{ $u->jumlah }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="kanan kn">
                    <h4 class="text-center">Fasilitas Lain</h4>
                    @foreach($ftbh as $t)
                        <div class="card mb-5 card-tambahan">
                            <img src="/gambar/fasilitas/tambahan/{{ $t->gambar }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $t->nama_fasilitas }}</h5>
                                <p class="card-text">{{ $t->keterangan }}</p>
                                <p class="card-text">Jumlah : {{ $t->jumlah }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="text-center pb-4">
                @foreach($psekolah as $i)
                    <button type="button" class="btn btn-primary btn-sm" style="width: 100px;" onclick="dfr()">DAFTAR</button>
                    <a href="/daftar/sekolah/{{ $i->kode_sekolah }}" id="dfskl" hidden></a>
                    <a href="/masuk/sekolah" class="btn btn-primary btn-sm" style="width: 100px;">KEMBALI</a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('css')
    <style>
        .alamat{
            border-bottom: 1px solid black;
        }
        .card-tambahan{
            box-shadow: 2px 3px 12px rgb(63, 102, 105);
        }
        .box-fasilitas {
            background-color: #C2DEDC;
            padding-top: 30px;
            box-shadow: inset 0px 5px 25px rgb(88, 139, 139);
        }

        .kiri {
            width: 100%;
            margin-bottom: 30px;
        }

        .kanan {
            width: 100%;
        }

        .fasilitas {
            display: flex;
            flex-wrap: wrap;
        }

        @media screen and (min-width: 550px) {
            .kr {
                width: 50%;
                padding-right: 5%;
                padding-left: 5%;
            }

            .kn {
                width: 50%;
                padding-right: 5%;
                padding-left: 5%;
            }
        }
    </style>
    <link href="/assets/img/favicon.png" rel="icon">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="/assets/css/font.css" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">

    {{-- swall --}}
    <link rel="stylesheet" href="/swall/swall.css">
@endsection
@section('js')
    <script>
        function dfr(){
            document.getElementById('dfskl').click()
        }
    </script>
@endsection
