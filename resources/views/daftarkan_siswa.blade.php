@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="text-center pt-3">Silahkan isi data dibawah</h3>
        <div class="profil-admin mt-4">
            <form action="/form/siswa/daftar" name="form" enctype="multipart/form-data" method="POST">
                @csrf
                <input type="hidden" name="user" id="user" value="{{ Auth::user()->name }}">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="nisn" class="form-label">NISN</label>
                    <input type="text" name="nisn" id="nisn" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="noanggota" class="form-label">No Anggota</label>
                    <input type="text" name="no" id="no" class="form-control">
                </div>
                <div class="mb-3 d-flex">
                    <div style="width: 48%; margin-right:4%;">
                        <label for="tempatlahir">Tempat Lahir</label>
                        <input type="text" name="tempatlahir" id="tempatlahir" class="form-control">
                    </div>
                    <div style="width: 48%;">
                        <label for="tgllahir">Tanggal Lahir</label>
                        <input type="date" name="tgllahir" id="tgllahir" class="form-control">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="umur" class="form-label">Umur</label>
                    <input type="text" name="umur" id="umur" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="genre" class="form-label">Genre</label>
                    <select name="genre" id="genre" class="form-select">
                        <option selected disabled>Laki-laki / Perempuan</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nohp" class="form-label">No HP</label>
                    <input type="text" name="nohp" id="nohp" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="des" class="form-label">Deskripsi</label>
                    <textarea name="des" id="des" rows="3" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" id="alamat" rows="3" class="form-control"></textarea>
                </div>
                <div class="mb-3 mt-4">
                    <button type="button" class="btn btn-success btn-sm" style="width: 100px;" onclick="simpan_siswa()">SIMPAN</button>
                    <button type="button" class="btn btn-secondary btn-sm" style="width: 100px;">RESET</button>
                    <button type="button" class="btn btn-danger btn-sm" style="width: 100px;" onclick="cencel_siswa()">CENCEL</button>
                    <button type="submit" id="sub" hidden></button>
                    <a href="/home" id="cl" hidden></a>
                </div>
            </form>
        </div>
    </div>

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
@endsection
@section('css')
    {{-- profil admin --}}
    <style>
        .profil-admin {
            padding-left: 20%;
            padding-right: 20%;
        }
    </style>
    {{-- end profil admin --}}

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
    {{-- swall --}}
    <script src="/swall/swall.js"></script>
    {{-- form --}}
    <script>
        function cencel_siswa(){
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Data yang diisi akan hilang!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('cl').click()
                }
            })
        }
        function simpan_siswa(){
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
                    document.getElementById('sub').click()
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Data berhasil disimpan',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        }
    </script>
    {{-- form end --}}
@endsection
