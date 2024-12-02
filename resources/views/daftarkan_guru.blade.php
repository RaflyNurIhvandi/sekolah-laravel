@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="text-center pt-3">Silahkan isi data diri Anda</h3>
        <div class="profil-guru mt-4">
            <form action="/daftarkan/guru"  method="POST" enctype="multipart/form-data">
                @csrf
                <h4>Data Diri</h4>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="noanggota" class="form-label">No Anggota</label>
                    <input type="text" name="noanggota" id="noanggota" class="form-control">
                </div>
                <div class="mb-3 d-flex">
                    <div style="width: 48%; margin-right: 4%;">
                        <label for="tempat" class="form-label">Tempat Lahir</label>
                        <input type="text" name="tempatlahir" id="tempatlahir" class="form-control">
                    </div>
                    <div style="width: 48%;">
                        <label for="tgl" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tgl" id="tgl" class="form-control">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="umur" class="form-label">Umur</label>
                    <input type="text" name="umur" id="umur" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="genre" class="form-label">Genre</label>
                    <select name="genre" id="genre" class="form-select">
                        <option selected disabled>Laki-Laki / Perempuan</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="keahlian" class="form-label">Keahlian</label>
                    <input type="text" name="keahlian" id="keahlian" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="nohp" class="form-label">No HP</label>
                    <input type="text" name="nohp" id="nohp" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" id="alamat" rows="3" class="form-control"></textarea>
                </div>
                <div class="mb-5">
                    <label for="des" class="form-label">Deskripsi Anda</label>
                    <textarea name="des" id="des" rows="3" class="form-control"></textarea>
                </div>
                <h4>Data Sekolah</h4>
                <div class="mb-3">
                    <label for="namasekolah" class="form-label">Nama Sekolah</label>
                    <input type="text" name="namasekolah" id="namasekolah" class="form-control">
                </div>
                <div class="mb-5">
                    <label for="npsn" class="form-label">NPSN</label>
                    <input type="text" name="npsn" id="npsn" class="form-control">
                </div>
                <div class="d-flex">
                    <h4>Sosial Media</h4><span style="margin-top: 3px;">&nbsp;(tidak wajib)</span>
                </div>
                <div class="mb-3">
                    <label for="wa" class="form-label">Whats App</label>
                    <input type="text" name="wa" id="wa" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="ig" class="form-label">Instagram</label>
                    <input type="text" name="ig" id="ig" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="fb" class="form-label">Facebook</label>
                    <input type="text" name="fb" id="fb" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="tw" class="form-label">Twitter</label>
                    <input type="text" name="tw" id="tw" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="tt" class="form-label">Tik Tok</label>
                    <input type="text" name="tt" id="tt" class="form-control">
                </div>
                <div class="mb-5">
                    <label for="yt" class="form-label">YouTube</label>
                    <input type="text" name="yt" id="yt" class="form-control">
                </div>
                <h4>Data lain</h4>
                <div class="mb-3">
                    <label for="foto" class="form-label">Pas Foto (3x4)</label><br>
                    <input type="file" name="foto" id="foto" hidden onchange="preview_pas_foto()">
                    <img src="/gambar/preview.jpg" id="preview-pas-foto" class="pas-foto" width="255" height="330" onclick="chn_pas_foto()">
                </div>
                <div class="mb-4">
                    <label for="cv" class="form-label">Curriculum Vitae</label>
                    <input type="file" name="cv" id="cv" class="form-control">
                </div>
                <div class="mb-3">
                    <button type="button" class="btn btn-primary btn-sm" style="width: 100px;" onclick="kirim()">KIRIM</button>
                    <button type="reset" class="btn btn-secondary btn-sm" style="width: 100px;" onclick="reset_fm()">RESET</button>
                    <button type="button" class="btn btn-danger btn-sm" style="width: 100px;" onclick="kembali()">KEMBALI</button>
                    <button type="submit" id="krm" hidden></button>
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
                        <h3>NewBiz</h3>
                        <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita
                            valies darta donna mare fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet
                            proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Terms of service</a></li>
                            <li><a href="#">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h4>Contact Us</h4>
                        <p>
                            A108 Adam Street <br>
                            New York, NY 535022<br>
                            United States <br>
                            <strong>Phone:</strong> +1 5589 55488 55<br>
                            <strong>Email:</strong> info@example.com<br>
                        </p>

                        <div class="social-links">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>

                    </div>

                    <div class="col-lg-3 col-md-6 footer-newsletter">
                        <h4>Our Newsletter</h4>
                        <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna veniam enim veniam illum
                            dolore legam minim quorum culpa amet magna export quem marada parida nodela caramase seza.</p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong>NewBiz</strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!--
                                                                    All the links in the footer should remain intact.
                                                                    You can delete the links only if you purchased the pro version.
                                                                    Licensing information: https://bootstrapmade.com/license/
                                                                    Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=NewBiz
                                                                  -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End Footer -->
@endsection
@section('css')
    {{-- profil admin --}}
    <style>
        .pas-foto{
            cursor: pointer;
            border-radius: 3%;
        }
        .profil-guru {
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
        function reset_fm(){
            document.getElementById("preview-pas-foto").src = "/gambar/preview.jpg"
        }
        function preview_pas_foto() {
            document.getElementById("preview-pas-foto").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("foto").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("preview-pas-foto").src = oFREvent.target.result;
            };
        };
        function chn_pas_foto(){
            document.getElementById('foto').click()
        }
        function kirim(){
            var nama = document.getElementById('nama').value
            var noanggota = document.getElementById('noanggota').value
            var tempatlahir = document.getElementById('tempatlahir').value
            var tgl = document.getElementById('tgl').value
            var umur = document.getElementById('umur').value
            var genre = document.getElementById('genre').value
            var keahlian = document.getElementById('keahlian').value
            var nohp = document.getElementById('nohp').value
            var email = document.getElementById('email').value
            var des = document.getElementById('des').value
            var namasekolah = document.getElementById('namasekolah').value
            var npsn = document.getElementById('npsn').value
            var foto = document.getElementById('foto').value
            var cv = document.getElementById('cv').value
            if (nama == "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Nama tidak boleh kosong!',
                })
            } else if (noanggota == ""){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No Anggota tidak boleh kosong!',
                })
            } else if (tempatlahir == ""){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Tempat Lahir tidak boleh kosong!',
                })
            } else if (tgl == ""){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Tanggal Lahir tidak boleh kosong!',
                })
            } else if (umur == ""){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Umur tidak boleh kosong!',
                })
            } else if (genre == ""){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Genre tidak boleh kosong!',
                })
            } else if (keahlian == ""){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Keahlian tidak boleh kosong!',
                })
            } else if (nohp == ""){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No HP tidak boleh kosong!',
                })
            } else if (email == ""){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Email tidak boleh kosong!',
                })
            } else if (des == ""){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Deskripsi Anda tidak boleh kosong!',
                })
            } else if (namasekolah == ""){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Nama Sekolah tidak boleh kosong!',
                })
            } else if (npsn == ""){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'NPSN tidak boleh kosong!',
                })
            } else if (foto == ""){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Pas Foto Anda tidak boleh kosong!',
                })
            } else if (cv == ""){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'CV Anda tidak boleh kosong!',
                })
            } else {
                Swal.fire({
                    title: 'Anda Yakin?',
                    text: "Pastikan data yang diisi benar!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: 'Kirim Data?',
                            text: "Setelah data terkirim tunggu konfirmasi selanjutnya, jika anda diterima status anda akan berubah menjadi 'DITERIMA'",
                            icon: 'question',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Yes'
                            }).then((result) => {
                            if (result.isConfirmed) {
                                document.getElementById('krm').click()
                                Swal.fire({
                                    title: 'Data terkirim',
                                    icon: 'success',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }
                        })
                    }
                })
            }
        }
    </script>
    {{-- end form --}}
@endsection
