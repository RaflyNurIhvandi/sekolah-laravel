@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="text-center pt-3">Silahkan Isi data Admin dan Sekolah anda</h3>
        <div class="profil-admin mt-4">
            <form action="/daftar/admin/sekolah" name="form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user" id="user" value="{{ Auth::user()->name }}">
                <div class="card-data-admin mb-5">
                    <h5>Profil Admin</h5>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama">
                    </div>
                    <div class="mb-3">
                        <label for="noanggota" class="form-label">No Anggota</label>
                        <input type="text" class="form-control" name="noanggota" id="noanggota">
                    </div>
                    <div class="mb-3">
                        <label for="tempat/tanggal_lahir" class="form-label">Tempat / Tanggal Lahir</label>
                        <div class="d-flex">
                            <input type="text" class="form-control" style="width: 50%; margin-right:5%;" name="tempat"
                                id="tempat">
                            <input type="date" class="form-control" style="width: 45%;" name="tgl" id="tgl">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="nohp" class="form-label">No Hp</label>
                        <input type="text" class="form-control" name="nohp" id="nohp">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
                    </div>
                </div>
                <div class="card-data-sekolah mb-5">
                    <h5>Profil Sekolah</h5>
                    <div class="mb-3">
                        <label for="namasekolah" class="form-label">Nama Sekolah</label>
                        <input type="text" class="form-control" name="namasekolah" id="namasekolah">
                    </div>
                    <div class="mb-3">
                        <label for="tingkatsekolah" class="form-label">Tingkat Sekolah</label>
                        <select name="tingkatsekolah" id="tingkatsekolah" class="form-select">
                            <option value="T9">Universitas</option>
                            <option value="T8">SMK</option>
                            <option value="T7">SMA</option>
                            <option value="T6">Mts</option>
                            <option value="T5">SMP</option>
                            <option value="T4">MI</option>
                            <option value="T3">SD</option>
                            <option value="T2">TK</option>
                            <option value="T1">PAUD</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="npsn" class="form-label">NPSN</label>
                        <input type="text" class="form-control" name="npsn" id="npsn">
                    </div>
                    <div class="mb-3">
                        <label for="alamatsekolah" class="form-label">Alamat Sekolah</label>
                        <textarea class="form-control" name="alamatsekolah" id="alamatsekolah" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <button type="button" class="btn btn-primary btn-sm me-2" onclick="save()">Simpan</button>
                        <button type="submit" id="ed" hidden></button>
                        <button type="reset" class="btn btn-secondary btn-sm me-2">Reset</button>
                        <button type="button" class="btn btn-danger btn-sm" onclick="cencel()">Cencel</button>
                        <a href="/home" id="ccl" hidden></a>
                    </div>
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

    <script>
        function cencel() {
            Swal.fire({
                title: 'Anda yakin?',
                text: "Semua data yang diisi akan hilang dan tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('ccl').click()
                }
            })
        }

        function save() {
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Pastikan data yang diisi sudah benar!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                var nama = document.getElementById('nama').value
                var noanggota = document.getElementById('noanggota').value
                var tempat = document.getElementById('tempat').value
                var tgl = document.getElementById('tgl').value
                var nohp = document.getElementById('nohp').value
                var email = document.getElementById('email').value
                var alamat = document.getElementById('alamat').value
                var namasekolah = document.getElementById('namasekolah').value
                var tingkatsekolah = document.getElementById('tingkatsekolah').value
                var npsn = document.getElementById('npsn').value
                var alamatsekolah = document.getElementById('alamatsekolah').value
                if (result.isConfirmed) {
                    if (nama == '') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Warning',
                            text: 'Nama Admin tidak boleh kosong!',
                            showConfirmButton: false,
                            timer: 1200
                        })
                    } else if (noanggota == '') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Warning',
                            text: 'No Anggota tidak boleh kosong!',
                            showConfirmButton: false,
                            timer: 1200
                        })
                    } else if (tempat == '') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Warning',
                            text: 'Tempat Lahir tidak boleh kosong!',
                            showConfirmButton: false,
                            timer: 1200
                        })
                    } else if (tgl == '') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Warning',
                            text: 'Tanggal Lahir tidak boleh kosong!',
                            showConfirmButton: false,
                            timer: 1200
                        })
                    } else if (nohp == '') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Warning',
                            text: 'No HP tidak boleh kosong!',
                            showConfirmButton: false,
                            timer: 1200
                        })
                    } else if (email == '') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Warning',
                            text: 'Email tidak boleh kosong!',
                            showConfirmButton: false,
                            timer: 1200
                        })
                    } else if (alamat == '') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Warning',
                            text: 'Alamat Admin tidak boleh kosong!',
                            showConfirmButton: false,
                            timer: 1200
                        })
                    } else if (namasekolah == '') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Warning',
                            text: 'Nama Sekolah tidak boleh kosong!',
                            showConfirmButton: false,
                            timer: 1200
                        })
                    } else if (tingkatsekolah == '') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Warning',
                            text: 'Tingkat Sekolah tidak boleh kosong!',
                            showConfirmButton: false,
                            timer: 1200
                        })
                    } else if (npsn == '') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Warning',
                            text: 'NPSN tidak boleh kosong!',
                            showConfirmButton: false,
                            timer: 1200
                        })
                    } else if (alamatsekolah == '') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Warning',
                            text: 'Alamat Sekolah tidak boleh kosong!',
                            showConfirmButton: false,
                            timer: 1200
                        })
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Data berhasil disimpan',
                            confirmButtonColor: '#16FF00',
                            confirmButtonText: 'Yes'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                document.getElementById('ed').click()
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Anda akan masuk ke halaman Admin',
                                    showConfirmButton: false,
                                    timer: 2000
                                })
                            }
                        })
                    }
                }
            })
        }
    </script>
@endsection
