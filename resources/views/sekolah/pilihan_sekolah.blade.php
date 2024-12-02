@extends('layouts.app')

@section('content')
    <div class="container">
        <center>
            @foreach($sekolah as $i)
                <div class="card mb-3" style="max-width: 100%;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="/gambar/profile_sekolah/{{ $i->gambar_profile }}" class="img-fluid rounded-start" width="100%">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title mb-3">{{ $i->nama_sekolah }}</h4>
                                <p class="card-text">{{ $i->subjek }}</p>
                                <h5>Alamat :</h5>
                                <p class="card-text">{{ $i->alamat_sekolah }}</p>
                            </div>
                            <div class="mt-2 mb-3">
                                <a href="/lihat/sekolah/{{ $i->kode_sekolah }}" class="btn btn-primary btn-sm" style="width: 100px;">Lihat</a>
                                <button type="button" class="btn btn-primary btn-sm" style="width: 100px;">Daftar</button>
                            </div>
                            <p class="card-text"><small class="text-muted">Last updated {{ $i->updated_at }}</small></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </center>
    </div>
@endsection
@section('css')
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
@endsection
