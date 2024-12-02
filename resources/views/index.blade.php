<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title></title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Go School</title>

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="/assets/css/font.css" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NewBiz
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/newbiz-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex justify-content-between">

            <div class="logo">
                <!-- Uncomment below if you prefer to use an text logo -->
                <!-- <h1><a href="index.html">NewBiz</a></h1> -->
                <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#team">Team</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                    @if (Route::has('login'))
                        @auth
                            <li><a href="{{ url('/home') }}"
                                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Daftar</a>
                            </li>
                        @else
                            <li><a href="{{ route('login') }}"
                                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                                    in</a></li>

                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}"
                                        class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- #header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="clearfix">
        <div class="container" data-aos="fade-up">

            <div class="hero-img" data-aos="zoom-out" data-aos-delay="200">
                <img src="assets/img/hero-img.svg" alt="" class="img-fluid">
            </div>

            <div class="hero-info" data-aos="zoom-in" data-aos-delay="100">
                <h2>PPDB Online<br><span>Daftar</span><br>Sekolah Impian!</h2>
                <div>
                    <a href="#about" class="btn-get-started scrollto">Get Started</a>
                    <a href="#services" class="btn-services scrollto">School List</a>
                </div>
            </div>

        </div>
    </section><!-- End Hero Section -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about">
            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h3>About Us</h3>
                    <p>
                        Selamat datang di website resmi PPDB (Penerimaan Peserta Didik Baru). Pendaftaran Online dari
                        rumah oleh calon peserta didik, Verifikasi Pendaftaraan Online dari rumah oleh Admin/Operator
                        Sekolah, melihat hasil seleksi PPDB dari rumah oleh calon peserta didik.
                    </p>
                </header>

                <div class="row about-container">

                    <div class="col-lg-6 content order-lg-1 order-2">
                        <p>
                            PPDB adalah agenda tahunan penerimaan peserta didik di setiap jenjang sekolah pada
                            awal semester ganjil setelah proses kenaikan kelas, metode pendaftaran sekolah melalui
                            daring mulai dari jenjang TK, SD, SLTP, SLTA dan Kuliah.
                        </p>

                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon"><i class="bi bi-card-checklist"></i></div>
                            <h4 class="title"><a href="">TK</a></h4>
                            <p class="description">
                                Merupakan jenjang pendidikan anak usia dini (PAUD) dalam bentuk formal
                                yang bersedia untuk anak usia 6 tahun ke bawah.
                            </p>
                        </div>

                        <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon"><i class="bi bi-brightness-high"></i></div>
                            <h4 class="title"><a href="">SD</a></h4>
                            <p class="description">
                                Sekolah Dasar merupakan jenjang pertama wajib belajar di Indonesia
                                yang ditempuh selama 6 tahun.
                            </p>
                        </div>

                        <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon"><i class="bi bi-calendar4-week"></i></div>
                            <h4 class="title"><a href="">SLTP</a></h4>
                            <p class="description">
                                Sekolah Lanjutan Tingkat Pertama merupakan pendidikan formal yang ditempuh setelah lulus sekolah dasar.
                                Yang termasuk dalam SLTP adalah SMP dan MTS.
                            </p>
                        </div>

                        <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon"><i class="bi bi-brightness-high"></i></div>
                            <h4 class="title"><a href="">SLTA</a></h4>
                            <p class="description">
                                Sekolah Lanjutan Tingkat Atas merupakan pendidikan formal setelah SLTP, jenjang ini merupakan
                                wajib belajar terakhir yang ditempuh di SMA, SMK, MA dan/atau MAK.
                            </p>
                        </div>

                        <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon"><i class="bi bi-card-checklist"></i></div>
                            <h4 class="title"><a href="">Perguruan Tinggi</a></h4>
                            <p class="description">
                                Pendidikan formal lanjutan setelah SLTA adalah perguruan tinggi yang ditempuh di universitas dan mendapat gelar
                                D1, D2, D3, D4, S1, S2 dan S3.
                            </p>
                        </div>

                    </div>

                    <div class="col-lg-6 background order-lg-2" data-aos="zoom-in">
                        <img src="assets/img/about-img.svg" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="row about-extra">
                    <div class="col-lg-6" data-aos="fade-right">
                        <img src="assets/img/about-extra-1.svg" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-5 pt-lg-0" data-aos="fade-left">
                        <h4>Program wajib belajar di Indonesia?</h4>
                        <p>
                            Program wajib belajar adalah program pendidikan minimal yang harus diikuti oleh warga
                            negara Indonesia atas tanggung jawab pemerintah dan pemerintah daerah.
                        </p>
                        <p>
                            Program ini dilaksanakan selama 12 tahun, mulai dari SD, SLTP dan SLTA. Tujuannya adalah untuk
                            memperluas pemerataan pendidikan, mengurangi kesenjangan capaian pendidikan, meningkatkan kualitas
                            dan daya saing bangsa.
                        </p>
                    </div>
                </div>

                <div class="row about-extra">
                    <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left">
                        <img src="assets/img/about-extra-2.svg" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-right">
                        <h4>Manfaat PPDB online? Sedikit atau banyak?</h4>
                        <h5 style="font-weight: 500; font-size: 20px;">Bagi Siswa dan Orang Tua Siswa</h5>
                        <p>
                            Mempermudah untuk melakukan pendaftaran siswa baru, mempermudah akses penerimaan siswa
                            baru, pendaftaran menjadi lebih tertib dan mudah dipantau, fasilitas dan pelayanan memuaskan
                            dari pihak Sekolah dan Dinas Pendidikan.
                        </p>
                        <h5 style="font-weight: 500; font-size: 20px;">Bagi Dinas Pendidikan dan Sekolah</h5>
                        <p>
                            Efisiensi pembiayaan dan mengurangi resiko terjadinya KKN (Korupsi, Kolusi dan Nepotisme), meningkatkan
                            reputasi sekolah, memberikan akses yang luas kepada masyarakat, tersedianya sebuah basis data terintegrasi
                            bagi pihak Dinas Pendidikan maupun Sekolah dalam penyelenggaraan penerimaan peserta didik baru.
                        </p>
                    </div>

                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Team Section ======= -->
        <section id="team">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h3>Team</h3>
                    <p>Kita Adalah Tim Developer Pembuat Website Go School.</p>
                </div>
                <div class="row">
                    @foreach ($data as $i)
                        <div class="col-lg-3 col-md-6" data-aos="zoom-out" data-aos-delay="100">
                            <div class="member">
                                <img src="gambar_insert/team/{{ $i->gambar }}" width="300" height="250"
                                    class="img-fluid" alt="">
                                <div class="member-info">
                                    <div class="member-info-content">
                                        <h4>{{ $i->nama }}</h4>
                                        <span>{{ $i->deskripsi }}</span>
                                        <div class="social">
                                            <a target='_blank' href="{{ $i->twitter }}"><i
                                                    class="bi bi-twitter"></i></a>
                                            <a target='_blank' href="{{ $i->facebook }}"><i
                                                    class="bi bi-facebook"></i></a>
                                            <a target='_blank' href="{{ $i->instagram }}"><i
                                                    class="bi bi-instagram"></i></a>
                                            <a target='_blank' href="{{ $i->whatsapp }}"><i
                                                    class="bi bi-whatsapp"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section><!-- End Team Section -->

        <!-- ======= Clients Section ======= -->
        <section id="clients" class="section-bg">

            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h3>Jenjang Terkait.</h3>
                    <p>Terdapat Banyak Jenjang Untuk Berbagai Sekolah Yang Bisa Kamu Pilih.</p>
                </div>
                <div class="row">
                    @foreach ($edit as $i)
                        <div class="col-lg-3 col-md-6" data-aos="zoom-out" data-aos-delay="100">
                            <div class="member">
                                <img src="gambar_insert/icon/{{ $i->gambar }}" width="250" height="250"
                                    class="img-fluid" alt="">
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

        </section><!-- End Clients Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h3>Contact Us</h3>
                </div>
                <center>
                    <div>

                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-md-5 info">
                                    <i class="bi bi-geo-alt"></i>
                                    <p>Trenggalek, Jawa Timur, Indonesia</p>
                                </div>
                                <div class="col-md-4 info">
                                    <i class="bi bi-envelope"></i>
                                    <p>goschool@gmail.com</p>
                                </div>
                                <div class="col-md-3 info">
                                    <i class="bi bi-phone"></i>
                                    <p>+62 822-2861-8169</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </center>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    @foreach ($foter as $i)
                        <div class="col-lg-4 col-md-6 footer-info">
                            <h3>Go School</h3>
                            <p>{{ $i->deskripsi }}</p>
                        </div>
                    @endforeach

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Link Menu</h4>
                        <ul>
                            <li><a href="#hero">Home</a></li>
                            <li><a href="#about">About</a></li>
                            <li><a href="#team">Team</a></li>
                            <li><a href="#contact">Contact</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h4>Contact Us</h4>
                        @foreach ($foter as $i)
                            <p>
                            <p>{{ $i->des }}</p>
                            <strong>Phone:</strong>{{ $i->contact }}<br>
                            <strong>Email:</strong>{{ $i->email }}<br>
                            </p>
                        @endforeach

                        <div class="social-links">
                            @foreach ($tw as $i)
                                <a target='_blank' href="{{ $i->link }}" class="twitter"><i
                                        class="bi bi-twitter"></i></a>
                            @endforeach
                            @foreach ($fb as $i)
                                <a target='_blank' href="{{ $i->link }}" class="facebook"><i
                                        class="bi bi-facebook"></i></a>
                            @endforeach
                            @foreach ($ig as $i)
                                <a target='_blank' href="{{ $i->link }}" class="instagram"><i
                                        class="bi bi-instagram"></i></a>
                            @endforeach
                            @foreach ($wa as $i)
                                <a target='_blank' href="{{ $i->link }}" class="whatsapp"><i
                                        class="bi bi-whatsapp"></i></a>
                            @endforeach
                        </div>

                    </div>
                    @foreach ($foter as $i)
                        <div class="col-lg-3 col-md-6 footer-newsletter">
                            <h4>Message</h4>
                            <p>{{ $i->text }}.</p>
                            <form action="" method="post">
                                <input type="email" name="email"><input type="submit" value="Subscribe">
                            </form>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong>GoSchool</strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!--
        All the links in the footer should remain intact.
        You can delete the links only if you purchased the pro version.
        Licensing information: https://bootstrapmade.com/license/
        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=NewBiz
      -->
                Designed by <a href="https://bootstrapmade.com/">GoSchoolDeveloper</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>
