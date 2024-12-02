@extends('layouts.app')

@section('content')
    <main id="main">
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6 footer-info">
                        <h3>Go School</h3>
                        <p>Go School adalah website untuk melakukan segala registrasi pendaftaran sekolah anda. Anda bisa mendaftarkan sekolah anda untuk memperluas jangkauan sekolah anda kepada masyarakat. Di era digital seperti ini kami menyediakan layanan untuk berbagai macam kebutuhan website untuk mengembangkan berbagai projek terutama proses pembelajaran juga sangat penting untuk semua orang, karena ilmu adalah salah satu kebutuhan yang penting untuk hidup di dunia.</p>
                    </div>
                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h4>Contact Us</h4>
                        <p>Tuangkan kesempatan anda pada Go School maka jalan anda untuk sukses telah anda buka sendiri.<br><br>
                            <strong>Phone:</strong> +62 822-2861-8169<br>
                            <strong>Email:</strong> goschool@gmail.com<br>
                        </p>

                    </div>

                    <div class="col-lg-3 col-md-6 footer-newsletter">
                        <h4>Message</h4>
                        <p>Terimakasih sudah berkunjung ke website kami. Semoga semua usaha anda membuahkan hasil yang sangat luar biasa, karena proses adalah hal terpenting untuk membentuk kesuksesan itu sendiri.</p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>
                    </div>

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
                Designed by : GoSchoolDeveloper
            </div>
        </div>
    </footer><!-- End Footer -->

    {{-- form daftar --}}
    <div class="container">
        <div style="padding-left: 15%; padding-right: 15%;" class="daftar" id="daftar">
            <div class="form-daftar">
                <h3 class="mb-3 mt-3 text-center">Daftar</h3>
                <form action="/tambah/profile" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user" id="user" value="{{ Auth::user()->name }}">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="3"></textarea>
                    </div>
                    <div class="bawah">
                        <div class="sosial">
                            <div class="mb-3">
                                <label for="wa" class="form-label">NISN</label>
                                <input type="text" class="form-control" name="nisn" id="nisn">
                            </div>
                            <div class="mb-5">
                                <label for="tempat" class="form-label">Tempat / Tanggal Lahir</label>
                                <div style="">
                                    <input type="text" style="width: 55%;" class="form-control float-start"
                                        name="tempat" id="tempat">
                                    <input type="date" style="width: 40%;" class="form-control float-end"
                                        name="tgl" id="tgl">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="fb" class="form-label">Status</label>
                                <select class="form-select" name="status" id="status">
                                    <option selected value="Siswa">Siswa</option>
                                    <option value="Guru">Guru</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email">
                            </div>
                        </div>
                        <div class="profil"><br class="brr1" id="brr1"><br class="brr2" id="brr2">
                            <center>
                                <span class="war-foto" id="wr-f">Masukan foto profile!</span>
                            </center>
                            <img src="/gambar/preview.jpg" class="gambar" id="prv" width="260" height="260"
                                onclick="preImg()">
                            <input type="file" name="gambar" id="gbr" onchange="gI()" hidden>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary btn-sm" onclick="s()">Daftar</button>
                    <button type="submit" id="v" hidden></button>
                    <button type="reset" class="btn btn-danger btn-sm" onclick="ccl()">Cencel</button>
                </form>
            </div>
        </div>
    </div>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
@endsection
@section('css')
    {{-- daftarkan sekolah --}}
    <style>
        .inp-sekolah {
            background-color: #ddf5ff;
            padding-top: 2%;
            padding-bottom: 2%;
        }
    </style>
    {{-- end daftarkan sekolah --}}

    {{-- daftar sekolah --}}
    <style>
        .universitas {
            display: none;
        }

        .sma-smk {
            display: none;
        }

        .smp-mts {
            display: none;
        }

        .sd-mi {
            display: none;
        }

        .tk-paud {
            display: none;
        }

        .cardd {
            background-color: #DEDEA7;
            border-radius: 7px;
            width: 80%;
        }
    </style>
    {{-- end daftar sekolah --}}

    {{-- daftar --}}
    <style>
        .brr2 {
            display: none;
        }

        .brr1 {
            display: block;
        }
    </style>
    {{-- end daftar --}}

    {{-- form --}}
    <style>
        .gambar {
            border-radius: 5px;
            border: 3px solid #888;
        }

        .gambar:hover {
            cursor: pointer;
        }

        .war-foto {
            color: red;
        }

        .br2 {
            display: none;
        }

        .br1 {
            display: block;
        }

        .profil {
            padding-left: 10%;
            padding-top: %;
        }

        .sosial {
            width: 50%;
        }

        .bawah {
            display: flex;
        }

        .edit-team {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 4%;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }

        .form-editteam {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
            border-radius: 5px;
        }

        .tambah-team {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 4%;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }

        .form-tambahteam {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
            border-radius: 5px;
        }

        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    {{-- end form --}}

    {{-- tampilan --}}
    <style>
        .form-profil {
            display: block;
        }

        .nama {
            margin-top: 7%;
        }

        .pp {
            border-radius: 7px;
        }

        .edit-tools {
            float: right;
        }

        .data {
            font-size: 18px;
        }

        .kanan {
            font-size: 18px;
        }

        .tengah {
            font-size: 18px;
        }

        .kiri {
            margin-right: 7%;
        }

        .kartu {
            padding: 3%;
            display: flex;
        }

        .konten {
            height: 500px;
        }

        .kotak {
            height: 90%;
            background-color: #BFCCB5;
            border-radius: 7px;
        }
    </style>
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

    {{-- swall --}}
    <link rel="stylesheet" href="/swall/swall.css">
@endsection
@section('js')
    {{-- swall --}}
    <script src="/swall/swall.js"></script>

    {{-- daftarkan sekolah --}}
    <script>
        function guruSudahMasuk(){
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Ingin masuk ke halaman admin sekarang?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('daftaradminguru').click()
                    Swal.fire({
                        icon: 'success',
                        title: 'Anda akan masuk ke halaman Admin',
                        showConfirmButton: false,
                        timer: 2000
                    })
                }
            })
        }
        function guruSudahDaftar(){
            Swal.fire({
                title: 'Anda sudah mendaftar!',
                text: "Ingin masuk ke halaman admin sekarang?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('daftaradminguru').click()
                    Swal.fire({
                        icon: 'success',
                        title: 'Anda akan masuk ke halaman Admin',
                        showConfirmButton: false,
                        timer: 2000
                    })
                }
            })
        }
        function masuksudahdaftar(){
            Swal.fire({
                title: 'Anda ingin masuk ke halaman Admin sekarang?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('adminsekolah').click()
                    Swal.fire({
                        icon: 'success',
                        title: 'Anda akan masuk ke halaman Admin',
                        showConfirmButton: false,
                        timer: 2000
                    })
                }
            })
        }
        function daftarsudahdaftar(){
            Swal.fire({
                title: 'Anda sudah mendaftar!',
                text: "Ingin masuk ke halaman admin sekarang?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('adminsekolah').click()
                    Swal.fire({
                        icon: 'success',
                        title: 'Anda akan masuk ke halaman Admin',
                        showConfirmButton: false,
                        timer: 2000
                    })
                }
            })
        }
        function masukbelumdaftar() {
            Swal.fire({
                title: 'Anda belum mendaftar!',
                text: "Ingin mendaftarkan sekolah anda sekarang?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('daftarkansekolah').click()
                }
            })
        }

        function daftarbelumdaftar() {
            document.getElementById('daftarkansekolah').click()
        }

        function guruMasuk() {
            Swal.fire({
                title: 'Ingin Mendaftar?',
                text: "Anda belum mendaftar sebagai admin guru!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('daftarkanguru').click();
                }
            })
        }
        function guruDaftar() {
            Swal.fire({
                title: 'Ingin Mendaftar?',
                text: "Anda belum mendaftar sebagai admin guru!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('daftarkanguru').click();
                }
            })
        }

        function siswaDaftarBelumDaftar() {
            Swal.fire({
                title: 'Ingin mendaftar?',
                text: "Lengkapi data anda untuk masuk ke sekolah!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('daftarsiswa').click()
                }
            })
        }
        function siswaMasukBelumDaftar() {
            Swal.fire({
                title: 'Anda belum mendaftar!',
                text: "Ingin mendaftarkan diri anda sebagai siswa untuk masuk ke sekolah?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('daftarsiswa').click()
                }
            })
        }
        function siswaDaftarSudahDaftar() {
            Swal.fire({
                title: 'Anda sudah daftar!',
                text: "Ingin masuk ke sekolah?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('masuksekolah').click()
                    Swal.fire({
                        icon: 'success',
                        title: 'Anda akan masuk ke halaman sekolah',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        }
        function siswaMasukSudahDaftar() {
            Swal.fire({
                title: 'Ingin Masuk Sekolah?',
                text: "Anda ingin masuk ke halaman sekolah?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('masuksekolah').click()
                    Swal.fire({
                        icon: 'success',
                        title: 'Anda akan masuk ke halaman sekolah',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        }
    </script>
    {{-- end daftarkan sekolah --}}

    {{-- daftar --}}
    <script>
        function universitas() {
            document.getElementById('tk-paud').style.display = 'none'
            document.getElementById('sd-mi').style.display = 'none'
            document.getElementById('smp-mts').style.display = 'none'
            document.getElementById('sma-smk').style.display = 'none'
            document.getElementById('universitas').style.display = 'block'
        }

        function sma_smk() {
            document.getElementById('tk-paud').style.display = 'none'
            document.getElementById('sd-mi').style.display = 'none'
            document.getElementById('smp-mts').style.display = 'none'
            document.getElementById('sma-smk').style.display = 'block'
            document.getElementById('universitas').style.display = 'none'
        }

        function smp_mts() {
            document.getElementById('tk-paud').style.display = 'none'
            document.getElementById('sd-mi').style.display = 'none'
            document.getElementById('smp-mts').style.display = 'block'
            document.getElementById('sma-smk').style.display = 'none'
            document.getElementById('universitas').style.display = 'none'
        }

        function sd_mi() {
            document.getElementById('tk-paud').style.display = 'none'
            document.getElementById('sd-mi').style.display = 'block'
            document.getElementById('smp-mts').style.display = 'none'
            document.getElementById('sma-smk').style.display = 'none'
            document.getElementById('universitas').style.display = 'none'
        }

        function tk_paud() {
            document.getElementById('tk-paud').style.display = 'block'
            document.getElementById('sd-mi').style.display = 'none'
            document.getElementById('smp-mts').style.display = 'none'
            document.getElementById('sma-smk').style.display = 'none'
            document.getElementById('universitas').style.display = 'none'
        }

        function s() {
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Pastikan data yang diisi benar!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('v').click()
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Berhasil melakukan pendaftaran',
                        showConfirmButton: false,
                        timer: 1000
                    })
                }
            })
        }

        function ccl() {
            document.getElementById('wr-f').style.display = 'block'
            document.getElementById('brr2').style.display = 'none'
            document.getElementById("prv").src = '/gambar/preview.jpg'
        }

        function preImg() {
            document.getElementById('gbr').click()
        }

        function gI() {
            document.getElementById('wr-f').style.display = 'none'
            document.getElementById('brr2').style.display = 'block'
            document.getElementById("prv").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("gbr").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("prv").src = oFREvent.target.result;
            };
        };
    </script>
    {{-- end daftar --}}

    {{-- edit profile --}}
    <script>
        function sa() {
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Pastikan data yang diisi benar!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('ve').click()
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Berhasil menyimpan data',
                        showConfirmButton: false,
                        timer: 1000
                    })
                }
            })
        }

        function previewImg() {
            document.getElementById('gambar').click()
        }

        function gambarInput() {
            document.getElementById('war-foto').style.display = 'none'
            document.getElementById('br2').style.display = 'block'
            document.getElementById("preview").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("gambar").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("preview").src = oFREvent.target.result;
            };
        };

        function tambahTeam() {
            document.getElementById('tambah-team').style.display = 'block'
        }
        var close = document.getElementById('close')
        close.onclick = function() {
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Data yang diperbarui akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('reset-hid').click()
                }
            })
        }

        function resetNoHid() {
            document.getElementById('war-foto').style.display = 'block'
            document.getElementById('br2').style.display = 'none'
            document.getElementById("preview").src = '/gambar/preview.jpg'
        }

        function resetHid() {
            document.getElementById('war-foto').style.display = 'block'
            document.getElementById('br2').style.display = 'none'
            document.getElementById("preview").src = '/gambar/preview.jpg'
            document.getElementById('tambah-team').style.display = 'none'
        }
        window.onclick = function(event) {
            if (event.target == document.getElementById('tambah-team')) {
                document.getElementById('tambah-team').style.display = 'none'
            }
        }
    </script>
@endsection
