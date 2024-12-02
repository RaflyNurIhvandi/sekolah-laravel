<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

    <title>
        @foreach($dafsis as $d)
            Go School | {{ $d->nama_siswa }}
        @endforeach
    </title>

    <!-- Bootstrap core CSS -->
    <link href="/go_school/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!--

TemplateMo 570 Chain App Dev

https://templatemo.com/tm-570-chain-app-dev

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="/go_school/assets/css/templatemo-chain-app-dev.css">
    <link rel="stylesheet" href="/go_school/assets/css/animated.css">
    <link rel="stylesheet" href="/go_school/assets/css/owl.css">

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        @foreach($siswa as $s)
                            <a href="/go_school/{{ $s->no_siswa }}" class="logo">
                        @endforeach
                            <img src="assets/images/logo.png" alt="Chain App Dev">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#services">Jadwal</a></li>
                            <li class="scroll-to-section"><a href="#about">Profile</a></li>
                            <li class="scroll-to-section"><a href="#nilai">Nilai</a></li>
                            <li class="scroll-to-section"><a href="#fasilitas">Fasilitas</a></li>
                            <li>
                                <div class="gradient-button"><a id="modal_trigger" href="#modal"><i
                                            class="fa fa-sign-out-alt"></i> Log Out</a></div>
                            </li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <div id="modal" class="popupContainer" style="display:none;">
        <div class="popupHeader">
            <span class="header_title">Log Out</span>
            <span class="modal_close" id="modal-close"><i class="fa fa-times"></i></span>
        </div>

        <section class="popupBody">
            <!-- Social Login -->
            <div class="social_login">
                <center>
                    <i class="fa fa-exclamation-triangle fa-3x mb-3" style="color: orange;"></i>
                    <h3 class="mb-2">Anda Yakin?</h3>
                    <p class="mb-3" style="line-height: 20px;">Kamu harus Log In kembali untuk melihat aktivitas
                        pembelajaran di sekolah !</p>
                </center>
                <div class="action_btns">
                    <div class="one_half"><a href="#" id="yes" class="btn" onclick="log_out()">Yes, Log
                            Out</a></div>
                    <div class="one_half last"><a href="#" id="cencel" class="btn"
                            onclick="cencel_log_out()">Cencel</a></div>
                </div>
            </div>
        </section>
        <div hidden>
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" id="form-log-out" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
    {{-- home --}}
    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 align-self-center">
                            <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s"
                                data-wow-delay="1s">
                                <div class="row">
                                    <div class="col-lg-12">
                                        @foreach ($siswa as $s)
                                            <h2>Selamat Datang Di GO SCHOOL {{ $s->nama_sekolah_siswa }}</h2>
                                        @endforeach
                                        @foreach($siswa as $s)
                                            <p>
                                                Di website ini kamu dapat melihat aktivitas sekolah seperti jadwal sekolah
                                                setiap hari, melihat nilai hasil ujian, melihat daftar fasilitas apa saja yang tersedia di
                                                {{ $s->nama_sekolah_siswa }}, dan bahkan kamu bisa melihat profile yang sudah kamu daftarkan.
                                            </p>
                                        @endforeach
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="white-button first-button scroll-to-section">
                                            <a href="#newsletter">Subscribe <i class="fa fa-university"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                                <img src="assets/images/slider-dec.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end home --}}

    {{-- jadwal --}}
    <div id="services" class="services section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
                        <h4>Jadwal Kelas Untukmu</h4>
                        <img src="assets/images/heading-line-dec.png" alt="">
                        <p>
                            Siswa diharapkan dapat mematuhi jadwal dan peraturan yang ada, untuk menjadi siswa
                            yang disiplin kamu harus selalu datang tepat waktu, karena tidak ada salahnya untuk datang tepat waktu.
                        </p>
                        <p>KALAU BISA SEKARANG KENAPA HARUS NANTI</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="service-item first-service">
                        <div class="icon"></div>
                        <h4>Senin</h4>
                        @foreach($senin as $sen)
                            <p><b>Jam Ke-{{ $sen->no_urut_jadwal }}</b></p>
                            <p style="line-height: 10px;">Mata Pelajaran : {{ $sen->mapel }}</p>
                            <p style="line-height: 10px;">Nama Guru : {{ $sen->nama_guru }}</p>
                            <p style="line-height: 10px;">Waktu : {{ $sen->jam_mulai }} - {{ $sen->jam_selesai }}</p>
                            <div class="text-button">
                                <i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-item second-service">
                        <div class="icon"></div>
                        <h4>Selasa</h4>
                        @foreach($selasa as $sel)
                            <p><b>Jam Ke-{{ $sel->no_urut_jadwal }}</b></p>
                            <p style="line-height: 10px;">Mata Pelajaran : {{ $sel->mapel }}</p>
                            <p style="line-height: 10px;">Nama Guru : {{ $sel->nama_guru }}</p>
                            <p style="line-height: 10px;">Waktu : {{ $sel->jam_mulai }} - {{ $sel->jam_selesai }}</p>
                            <div class="text-button">
                                <i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-item third-service">
                        <div class="icon"></div>
                        <h4>Rabu</h4>
                        @foreach($rabu as $rab)
                            <p><b>Jam Ke-{{ $rab->no_urut_jadwal }}</b></p>
                            <p style="line-height: 10px;">Mata Pelajaran : {{ $rab->mapel }}</p>
                            <p style="line-height: 10px;">Nama Guru : {{ $rab->nama_guru }}</p>
                            <p style="line-height: 10px;">Waktu : {{ $rab->jam_mulai }} - {{ $rab->jam_selesai }}</p>
                            <div class="text-button">
                                <i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-4">
                    <div class="service-item first-service">
                        <div class="icon"></div>
                        <h4>Kamis</h4>
                        @foreach($kamis as $kam)
                            <p><b>Jam Ke-{{ $kam->no_urut_jadwal }}</b></p>
                            <p style="line-height: 10px;">Mata Pelajaran : {{ $kam->mapel }}</p>
                            <p style="line-height: 10px;">Nama Guru : {{ $kam->nama_guru }}</p>
                            <p style="line-height: 10px;">Waktu : {{ $kam->jam_mulai }} - {{ $kam->jam_selesai }}</p>
                            <div class="text-button">
                                <i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-item second-service">
                        <div class="icon"></div>
                        <h4>Jum'at</h4>
                        @foreach($jumat as $jum)
                            <p><b>Jam Ke-{{ $jum->no_urut_jadwal }}</b></p>
                            <p style="line-height: 10px;">Mata Pelajaran : {{ $jum->mapel }}</p>
                            <p style="line-height: 10px;">Nama Guru : {{ $jum->nama_guru }}</p>
                            <p style="line-height: 10px;">Waktu : {{ $jum->jam_mulai }} - {{ $jum->jam_selesai }}</p>
                            <div class="text-button">
                                <i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-item third-service">
                        <div class="icon"></div>
                        <h4>Sabtu</h4>
                        @foreach($sabtu as $sab)
                            <p><b>Jam Ke-{{ $sab->no_urut_jadwal }}</b></p>
                            <p style="line-height: 10px;">Mata Pelajaran : {{ $sab->mapel }}</p>
                            <p style="line-height: 10px;">Nama Guru : {{ $sab->nama_guru }}</p>
                            <p style="line-height: 10px;">Waktu : {{ $sab->jam_mulai }} - {{ $sab->jam_selesai }}</p>
                            <div class="text-button">
                                <i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end jadwal --}}

    {{-- profile --}}
    <div id="about" class="the-clients">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-heading">
                        <h4>Profile <em>Kamu</em></h4>
                        <img src="assets/images/heading-line-dec.png" alt="">
                        <p>Dibawah ini adalah informasi tentang kamu.</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="naccs">
                        <div class="grid">
                            @foreach($dafsis as $d)
                                <div class="row">
                                    <div class="col-lg-7 align-self-center">
                                        <div class="menu">
                                            <div class="first-thumb active">
                                                <div class="thumb">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-sm-4 col-12">
                                                            <h4>Nama</h4>
                                                            <span class="date">{{ $d->nama_siswa }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="thumb">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-sm-4 col-12">
                                                            <h4>NISN</h4>
                                                            <span class="date">{{ $d->nisn }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="thumb">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-sm-4 col-12">
                                                            <h4>Tempat / Tanggal Lahir</h4>
                                                            <span class="date">{{ $d->tempat_lahir_siswa }}, {{ $d->tanggal_lahir_siswa }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="thumb">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-sm-4 col-12">
                                                            <h4>Jenis Kelamin</h4>
                                                            <span class="date">{{ $d->jenis_kelamin_siswa }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="last-thumb">
                                                <div class="thumb">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-sm-4 col-12">
                                                            <h4>Nama Orang Tua / Wali</h4>
                                                            <span class="date">{{ $d->nama_wali }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <ul class="nacc">
                                            <li class="active">
                                                <div>
                                                    <div class="thumb">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="client-content">
                                                                    <img src="assets/images/quote.png" alt="">
                                                                    <p>“Nama yang sangat bagus, nama {{ $d->nama_siswa }} pasti sangat
                                                                        berarti buat kamu, kami harap nama yang diberikan orang tua kamu itu
                                                                        bisa membawa kesuksesan di masa depan.”</p>
                                                                </div>
                                                                <div class="down-content">
                                                                    <img src="/pendaftaran_siswa/pas_foto_siswa/{{ $d->gambar_siswa }}"
                                                                        alt="">
                                                                    <div class="right-content">
                                                                        <h4>{{ $d->nama_siswa }}</h4>
                                                                        <span>Siswa {{ $d->nama_sekolah_siswa }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <div class="thumb">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="client-content">
                                                                    <img src="assets/images/quote.png" alt="">
                                                                    <p>“Kamu memiliki Nomor Induk Siswa Nasional {{ $d->nisn }}.
                                                                        Kami harap Kamu bisa menjaga nama baik sekolahmu.”</p>
                                                                </div>
                                                                <div class="down-content">
                                                                    <img src="/pendaftaran_siswa/pas_foto_siswa/{{ $d->gambar_siswa }}"
                                                                        alt="">
                                                                    <div class="right-content">
                                                                        <h4>{{ $d->nama_siswa }}</h4>
                                                                        <span>Siswa {{ $d->nama_sekolah_siswa }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <div class="thumb">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="client-content">
                                                                    <img src="assets/images/quote.png" alt="">
                                                                    <p>“Kamu lahir pada tanggal {{ $d->tanggal_lahir_siswa }}, dan alamat
                                                                        rumah kamu di {{ $d->alamat_siswa }}, Kota {{ $d->kota_siswa }}, {{ $d->provinsi_siswa }}, Pos {{ $d->kode_pos_siswa }}, {{ $d->negara_siswa }}.”</p>
                                                                </div>
                                                                <div class="down-content">
                                                                    <img src="/pendaftaran_siswa/pas_foto_siswa/{{ $d->gambar_siswa }}"
                                                                        alt="">
                                                                    <div class="right-content">
                                                                        <h4>{{ $d->nama_siswa }}</h4>
                                                                        <span>Siswa {{ $d->nama_sekolah_siswa }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <div class="thumb">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="client-content">
                                                                    <img src="assets/images/quote.png" alt="">
                                                                    <p>“Kami mengucapkan selamat atas kelahiranmu meskipun terlambat untuk mengatakannya kami
                                                                        sangat beruntung memiliki siswa sepertimu, semoga kamu menjadi orang yang sukses.”</p>
                                                                </div>
                                                                <div class="down-content">
                                                                    <img src="/pendaftaran_siswa/pas_foto_siswa/{{ $d->gambar_siswa }}"
                                                                        alt="">
                                                                    <div class="right-content">
                                                                        <h4>{{ $d->nama_siswa }}</h4>
                                                                        <span>Siswa {{ $d->nama_sekolah_siswa }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <div class="thumb">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="client-content">
                                                                    <img src="assets/images/quote.png" alt="">
                                                                    <p>“Tanpa orang tua kamu bukan apa-apa, bersyukurlah sekarang kamu telah mencapai titik ini,
                                                                        jangan kecewakan orang tua mu, berikan usaha terbaikmu meskipun hanya 1% itu lebih baik dari
                                                                        pada tidak sama sekali.”</p>
                                                                </div>
                                                                <div class="down-content">
                                                                    <img src="/pendaftaran_siswa/pas_foto_siswa/{{ $d->gambar_siswa }}"
                                                                        alt="">
                                                                    <div class="right-content">
                                                                        <h4>{{ $d->nama_siswa }}</h4>
                                                                        <span>Siswa {{ $d->nama_sekolah_siswa }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end profile --}}

    {{-- nilai --}}
    <div id="nilai" class="mt-5">
        <center>
            <h2 class="mb-4" style="line-height: 50px;">Nilai</h2>
            @foreach($nilai as $n)
            <i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <p style="color: rgb(173, 173, 173);">Absen</p>
                            <h2>{{ $n->nilai_absen }}</h2>
                            <i class="fa fa-minus" style="color: rgb(173, 173, 173);"></i>
                        </div>
                        <div class="col">
                            <p style="color: rgb(173, 173, 173);">Tugas</p>
                            <h2>{{ $n->nilai_tugas }}</h2>
                            <i class="fa fa-minus" style="color: rgb(173, 173, 173);"></i>
                        </div>
                        <div class="col">
                            <p style="color: rgb(173, 173, 173);">Kuis</p>
                            <h2>{{ $n->nilai_kuis }}</h2>
                            <i class="fa fa-minus" style="color: rgb(173, 173, 173);"></i>
                        </div>
                        <div class="col">
                            <p style="color: rgb(173, 173, 173);">UTS</p>
                            <h2>{{ $n->nilai_uts }}</h2>
                            <i class="fa fa-minus" style="color: rgb(173, 173, 173);"></i>
                        </div>
                        <div class="col">
                            <p style="color: rgb(173, 173, 173);">UAS</p>
                            <h2>{{ $n->nilai_uas }}</h2>
                            <i class="fa fa-minus" style="color: rgb(173, 173, 173);"></i>
                        </div>
                    </div>
                </div>
                <div class="d-flex mt-5 mb-3">
                    <div style="width: 40%;">
                        <p style="color: rgb(173, 173, 173);">Rata - Rata</p>
                        <h2>{{ $n->rata_rata }}</h2>
                        <i class="fa fa-minus" style="color: rgb(173, 173, 173);"></i>
                    </div>
                    <div style="width: 20%;">
                        <p style="color: rgb(173, 173, 173);">Huruf</p>
                        <h2>{{ $n->nilai_huruf }}</h2>
                        <i class="fa fa-minus" style="color: rgb(173, 173, 173);"></i>
                    </div>
                    <div style="width: 40%;">
                        <p style="color: rgb(173, 173, 173);">Keterangan</p>
                        <h2>{{ $n->keterangan }}</h2>
                        <i class="fa fa-minus" style="color: rgb(173, 173, 173);"></i>
                    </div>
                </div>
                <span style="color: rgb(170, 170, 170);">Semester {{ $n->semester }}</span><br>
                <span style="color: rgb(170, 170, 170);">Tahun Ajaran {{ $n->tahun_ajaran }}</span><br>
                <i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>&nbsp;&nbsp;<i class="fa fa-minus"></i>
            @endforeach
        </center>
    </div>
    {{-- end nilai --}}

    {{-- fasilitas --}}
    <div id="fasilitas" class="pricing-tables">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-heading">
                        <h4>We Have The Best Pre-Order <em>Prices</em> You Can Get</h4>
                        <img src="assets/images/heading-line-dec.png" alt="">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eismod tempor incididunt ut
                            labore et dolore magna.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="pricing-item-regular">
                        <span class="price">$12</span>
                        <h4>Standard Plan App</h4>
                        <div class="icon">
                            <img src="assets/images/pricing-table-01.png" alt="">
                        </div>
                        <ul>
                            <li>Lorem Ipsum Dolores</li>
                            <li>20 TB of Storage</li>
                            <li class="non-function">Life-time Support</li>
                            <li class="non-function">Premium Add-Ons</li>
                            <li class="non-function">Fastest Network</li>
                            <li class="non-function">More Options</li>
                        </ul>
                        <div class="border-button">
                            <a href="#">Purchase This Plan Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="pricing-item-pro">
                        <span class="price">$25</span>
                        <h4>Business Plan App</h4>
                        <div class="icon">
                            <img src="assets/images/pricing-table-01.png" alt="">
                        </div>
                        <ul>
                            <li>Lorem Ipsum Dolores</li>
                            <li>50 TB of Storage</li>
                            <li>Life-time Support</li>
                            <li>Premium Add-Ons</li>
                            <li class="non-function">Fastest Network</li>
                            <li class="non-function">More Options</li>
                        </ul>
                        <div class="border-button">
                            <a href="#">Purchase This Plan Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="pricing-item-regular">
                        <span class="price">$66</span>
                        <h4>Premium Plan App</h4>
                        <div class="icon">
                            <img src="assets/images/pricing-table-01.png" alt="">
                        </div>
                        <ul>
                            <li>Lorem Ipsum Dolores</li>
                            <li>120 TB of Storage</li>
                            <li>Life-time Support</li>
                            <li>Premium Add-Ons</li>
                            <li>Fastest Network</li>
                            <li>More Options</li>
                        </ul>
                        <div class="border-button">
                            <a href="#">Purchase This Plan Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end fasilitas --}}

    <footer id="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-heading">
                        <h4>Terimakasih Sudah Bergabung Bersama Go School &amp; Menjadi Anggota Go School</h4>
                    </div>
                </div>
                {{-- <div class="col-lg-6 offset-lg-3">
                    <form id="search" action="#" method="GET">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <fieldset>
                                    <input type="address" name="address" class="email"
                                        placeholder="Email Address..." autocomplete="on" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <fieldset>
                                    <button type="submit" class="main-button">Subscribe Now <i
                                            class="fa fa-angle-right"></i></button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div> --}}
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-widget">
                        <h4>Contact Us</h4>
                        <p>Go School - +62 822-2861-8269, Trenggalek</p>
                        <p>IG : @goschool</p>
                        <p>Email : goschool@gmail.com</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer-widget">
                        <h4>About Us</h4>
                        <ul>
                            <li><a href="#top">Home</a></li>
                            <li><a href="#services">Jadwal</a></li>
                            <li><a href="#about">Profile</a></li>
                        </ul>
                        <ul>
                            <li><a href="#nilai">Nilai</a></li>
                            <li><a href="#fasilitas">Fasilitas</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer-widget">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><a href="#">--------</a></li>
                            <li><a href="#">--------</a></li>
                            <li><a href="#">--------</a></li>
                            <li><a href="#">--------</a></li>
                            <li><a href="#">--------</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">--------</a></li>
                            <li><a href="#">--------</a></li>
                            <li><a href="#">--------</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer-widget">
                        <h4>tentang Go School</h4>
                        <div class="logo">
                            <img src="assets/images/white-logo.png" alt="">
                        </div>
                        <p>Go School adalah website untuk melakukan segala registrasi pendaftaran sekolah anda. Anda bisa mendaftarkan sekolah anda untuk memperluas jangkauan sekolah anda kepada masyarakat. Di era digital seperti ini kami menyediakan layanan untuk berbagai macam kebutuhan website untuk mengembangkan berbagai projek terutama proses pembelajaran juga sangat penting untuk semua orang, karena ilmu adalah salah satu kebutuhan yang penting untuk hidup di dunia.</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="copyright-text">
                        <p>Copyright © Go School. All Rights Reserved.
                            <br>Design By GoSchoolDeveloper</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- Scripts -->
    <script src="/go_school/vendor/jquery/jquery.min.js"></script>
    <script src="/go_school/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/go_school/assets/js/owl-carousel.js"></script>
    <script src="/go_school/assets/js/animation.js"></script>
    <script src="/go_school/assets/js/imagesloaded.js"></script>
    <script src="/go_school/assets/js/popup.js"></script>
    <script src="/go_school/assets/js/custom.js"></script>
    <script>
        function log_out() {
            document.getElementById('form-log-out').click()
        }

        function cencel_log_out() {
            document.getElementById('modal-close').click()
        }
    </script>
</body>

</html>
