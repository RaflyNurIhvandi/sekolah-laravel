@extends('layouts.app')

@section('content')
    <div class="container mb-5">
        <div class="text-center">
            @foreach($gbr as $g)
                <img class="icn icon" src="/gambar/profile_sekolah/{{ $g->gambar_profile }}" alt="icon_sekolah">
            @endforeach
        </div>
        <div class="kotak mt-3">
            <div class="kotak-dalam kotak-atas">
                <div class="text-center">
                    <h3 class="top tp">FORM PENDAFTARAN SISWA BARU</h3>
                    @foreach ($psl as $i)
                        <h4 class="sl sklh">{{ $i->nama_sekolah }}</h4>
                    @endforeach
                    <p class="thn th">Tahun Pelajaran 2023/2024</p>
                </div>
            </div>
            <div class="garis-top"></div>
            <div class="kotak-dalam-bawah">
                <form action="/daftar/sekolah/siswa" enctype="multipart/form-data" method="POST">
                    @csrf
                    @foreach($no_anggota as $n)
                        <input type="hidden" name="no_ang" id="no_ang" value="{{ $n->no_anggota }}">
                    @endforeach
                    <input type="hidden" name="user" id="user" value="{{ Auth::user()->name }}">
                    <h4 class="keterangan ktr">A. KETERANGAN PESERTA DIDIK BARU</h4>
                    <div class="form fm">
                        <div class="lbl">
                            <h5 class="lb labl">Nama<span style="color: red;">*</span></h5>
                        </div>
                        <div class="inp">
                            <input type="text" class="form-control" name="nama" id="nama" required placeholder="Nama Lengkap">
                        </div>
                    </div>
                    <div class="form fm">
                        <div class="lbl">
                            <h5 class="lb labl">NISN</h5>
                        </div>
                        <div class="inp">
                            <input type="text" class="form-control" name="nisn" id="nisn" placeholder="Masukan NISN Jika Ada">
                        </div>
                    </div>
                    <div class="form fm">
                        <div class="lbl">
                            <h5 class="lb labl">Jenis Kelamin<span style="color: red;">*</span></h5>
                        </div>
                        <div class="inp">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jeniskelamin" id="laki-laki" value="Laki-Laki" required>
                                <label class="form-check-label" for="perempuan">
                                    Laki - Laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jeniskelamin" id="perempuan" value="Perempuan" required>
                                <label class="form-check-label" for="perempuan">
                                    Perempuan
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form fm">
                        <div class="lbl">
                            <h5 class="lb llb">Tempat, Tanggal Lahir<span style="color: red;">*</span></h5>
                        </div>
                        <div class="inp">
                            <div class="d-flex">
                                <input type="text" class="form-control" style="width: 48%; margin-right:4%;" name="tempatlahir" id="tempatlahir" required placeholder="Tempat Lahir">
                                <input type="date" class="form-control" style="width: 48%;" name="tgllahir" id="tgllahir" required placeholder="Tanggal Lahir">
                            </div>
                        </div>
                    </div>
                    <div class="form fm">
                        <div class="lbl">
                            <h5 class="lb labl">Agama</h5>
                        </div>
                        <div class="inp">
                            <input type="text" class="form-control" name="agama" id="agama">
                        </div>
                    </div>
                    <div class="form fm">
                        <div class="lbl">
                            <h5 class="lb wn">Kewarganegaraan</h5>
                        </div>
                        <div class="inp">
                            <input type="text" class="form-control" name="wn" id="wn">
                        </div>
                    </div>
                    <div class="form fm">
                        <div class="lbl">
                            <h5 class="lb labl">Anak Ke-</h5>
                        </div>
                        <div class="inp">
                            <input type="text" class="form-control" name="anakke" id="anakke">
                        </div>
                    </div>
                    <div class="form fm">
                        <div class="lbl">
                            <h5 class="lb labl">Sekolah Asal</h5>
                        </div>
                        <div class="inp">
                            <input type="text" class="form-control" name="sekolahasal" id="sekolahasal">
                        </div>
                    </div>
                    <div class="form fm">
                        <div class="lbl">
                            <h5 class="lb labl">Alamat Lengkap<span style="color: red;">*</span></h5>
                        </div>
                        <div class="inp">
                            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Rt, Rw, Desa, Kecamatan, Kabupaten" required>
                            <div class="d-flex">
                                <input type="text" name="kota" id="kota" placeholder="Kota" class="form-control mt-3" style="width: 48%; margin-right:4%;" required>
                                <input type="text" name="provinsi" id="provinsi" placeholder="Provinsi" class="form-control mt-3"style="width: 48%;" required>
                            </div>
                            <div class="d-flex">
                                <input type="text" name="kodepos" id="kodepos" placeholder="Kode POS" class="form-control mt-3" style="width: 48%; margin-right:4%;" required>
                                <input type="text" name="negara" id="negara" placeholder="Negara" class="form-control mt-3"style="width: 48%;" required>
                            </div>
                        </div>
                    </div>
                    <div class="form fm">
                        <div class="lbl">
                            <h5 class="lb labl">No HP<span style="color: red;">*</span></h5>
                        </div>
                        <div class="inp">
                            <input type="text" class="form-control" name="nohp" id="nohp" required placeholder="ex: 0822 xxxx xxxx">
                        </div>
                    </div>
                    <div class="form fm">
                        <div class="lbl">
                            <h5 class="lb labl">Alamat Email<span style="color: red;">*</span></h5>
                        </div>
                        <div class="inp">
                            <input type="text" class="form-control" name="email" id="email" required placeholder="ex: myname@gmail.com">
                        </div>
                    </div>
                    <div class="form fm">
                        <div class="lbl">
                            <h5 class="lb wn">Sekolah yang Dituju</h5>
                        </div>
                        <div class="inp">
                            @foreach($gbr as $n)
                                <input type="text" class="form-control" name="sekolahygdituju" id="sekolahygdituju" value="{{ $n->nama_sekolah }}">
                                <input type="hidden" name="npsn" id="npsn" value="{{ $n->npsn }}">
                            @endforeach
                        </div>
                    </div>
                    <div class="form fm">
                        <div class="lbl">
                            <h5 class="lb wn">Jurusan yang Dipilih</h5>
                        </div>
                        <div class="inp">
                            <select name="jurusan" id="jurusan" class="form-select">
                                <option selected disabled>Pilih Jurusan</option>
                                @foreach($jurusan as $j)
                                    <option value="{{ $j->no_jurusan }}">{{ $j->nama_jurusan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form fm">
                        <div class="lbl">
                            <h5 class="lb labl">Pas Foto<span style="color: red;">*</span></h5>
                        </div>
                        <div class="inp">
                            <input type="file" name="pasfoto" id="pasfoto" hidden required onchange="prv_pas_fot()">
                            <img class="pasfoto" id="prv-pas" src="/gambar/preview.jpg" class="pas-foto mb-3" width="127.5" height="165" onclick="upload_pas()">
                            <span style="color: red;">3x4 (max size 3mb)</span>
                        </div>
                    </div>
                    <h4 class="keterangan ktr mt-5">B. KETERANGAN TENTANG ORANG TUA/WALI</h4>
                    <div class="form fm">
                        <div class="lbl">
                            <h5 class="lb llb">Nama Orang Tua / Wali<span style="color: red;">*</span></h5>
                        </div>
                        <div class="inp">
                            <input type="text" class="form-control" name="nama_orangtua" id="nama_orangtua" required placeholder="Nama Lengkap">
                        </div>
                    </div>
                    <div class="form fm">
                        <div class="lbl">
                            <h5 class="lb labl">Jenis Kelamin<span style="color: red;">*</span></h5>
                        </div>
                        <div class="inp">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jeniskelaminortu" id="laki-laki" value="Laki-Laki" required>
                                <label class="form-check-label" for="perempuan">
                                    Laki - Laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jeniskelaminortu" id="perempuan" value="Perempuan" required>
                                <label class="form-check-label" for="perempuan">
                                    Perempuan
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form fm">
                        <div class="lbl">
                            <h5 class="lb llb">Tempat, Tanggal Lahir<span style="color: red;">*</span></h5>
                        </div>
                        <div class="inp">
                            <div class="d-flex">
                                <input type="text" class="form-control" style="width: 48%; margin-right:4%;" name="tempatlahirortu" id="tempatlahirortu" required placeholder="Tempat Lahir">
                                <input type="date" class="form-control" style="width: 48%;" name="tgllahirortu" id="tgllahirortu" required placeholder="Tanggal Lahir">
                            </div>
                        </div>
                    </div>
                    <div class="form fm">
                        <div class="lbl">
                            <h5 class="lb labl">Alamat Lengkap<span style="color: red;">*</span></h5>
                        </div>
                        <div class="inp">
                            <input type="text" class="form-control" name="alamatortu" id="alamatortu" placeholder="Rt, Rw, Desa, Kecamatan, Kabupaten" required>
                            <div class="d-flex">
                                <input type="text" name="kotaortu" id="kotaortu" placeholder="Kota" class="form-control mt-3" style="width: 48%; margin-right:4%;" required>
                                <input type="text" name="provinsiortu" id="provinsiortu" placeholder="Provinsi" class="form-control mt-3"style="width: 48%;" required>
                            </div>
                            <div class="d-flex">
                                <input type="text" name="kodeposortu" id="kodeposortu" placeholder="Kode POS" class="form-control mt-3" style="width: 48%; margin-right:4%;" required>
                                <input type="text" name="negaraortu" id="negaraortu" placeholder="Negara" class="form-control mt-3"style="width: 48%;" required>
                            </div>
                        </div>
                    </div>
                    <div class="form fm">
                        <div class="lbl">
                            <h5 class="lb llb">Hubungan Keluarga</h5>
                        </div>
                        <div class="inp">
                            <input type="text" class="form-control" name="hubungan_keluarga" id="hubungan_keluarga">
                        </div>
                    </div>
                    <div class="form fm">
                        <div class="lbl">
                            <h5 class="lb wn">Kewarganegaraan</h5>
                        </div>
                        <div class="inp">
                            <input type="text" class="form-control" name="wnortu" id="wnortu">
                        </div>
                    </div>
                    <div class="form fm">
                        <div class="lbl">
                            <h5 class="lb labl">Agama</h5>
                        </div>
                        <div class="inp">
                            <input type="text" class="form-control" name="agamaortu" id="agamaortu">
                        </div>
                    </div>
                    <div class="form fm">
                        <div class="lbl">
                            <h5 class="lb labl">Pekerjaan</h5>
                        </div>
                        <div class="inp">
                            <input type="text" class="form-control" name="pekerjaan" id="pekerjaan">
                        </div>
                    </div>
                    <div class="form fm">
                        <div class="lbl">
                            <h5 class="lb labl">No HP<span style="color: red;">*</span></h5>
                        </div>
                        <div class="inp">
                            <input type="text" class="form-control" name="nohportu" id="nohportu" required>
                        </div>
                    </div>
                    <h4 class="keterangan ktr mt-5">C. UPLOAD BERKAS PENDAFTARAN</h4>
                    <div class="berkas bks">
                        <div class="card card-berkas cd-br">
                            <div class="card-header">
                                <h5 class="lb llb">Scan KTP Orang Tua / Wali<span style="color: red;">* (.pdf)</span></h5>
                            </div>
                            <div class="card-body">
                                <i class="fa fa-upload fa-xl upl" onclick="upload_ktp_ortu()" id="i-ktp"></i>
                                <input type="file" name="ktportu" id="ktportu" hidden required onchange="prev_ktp(event)">
                                <iframe id="nama-ktp" class="nama-ktp" frameborder="0" width="100%" scrolling="auto"></iframe>
                                <p class="clear-ktp" onclick="clear_ktp()" id="cl-ktp">Clear Choose</p>
                            </div>
                        </div>
                        <div class="card card-berkas cd-br">
                            <div class="card-header">
                                <h5 class="lb labl">Scan KK<span style="color: red;">* (.pdf)</span></h5>
                            </div>
                            <div class="card-body">
                                <i class="fa fa-upload fa-xl upl" onclick="upload_kk()" id="i-kk"></i>
                                <input type="file" name="kk" id="kk" hidden required onchange="prev_kk(event)">
                                <iframe id="nama-kk" class="nama-kk" frameborder="0" width="100%" scrolling="auto"></iframe>
                                <p class="clear-kk" onclick="clear_kk()" id="cl-kk">Clear Choose</p>
                            </div>
                        </div>
                        <div class="card card-berkas cd-br">
                            <div class="card-header">
                                <h5 class="lb wn">Scan Akta Kelahiran<span style="color: red;">* (.pdf)</span></h5>
                            </div>
                            <div class="card-body">
                                <i class="fa fa-upload fa-xl upl" onclick="upload_akta()" id="i-akta"></i>
                                <input type="file" name="akta" id="akta" hidden required onchange="prev_akta(event)">
                                <iframe id="nama-akta" class="nama-akta" frameborder="0" width="100%" scrolling="auto"></iframe>
                                <p class="clear-akta" onclick="clear_akta()" id="cl-akta">Clear Choose</p>
                            </div>
                        </div>
                        <div class="card card-berkas cd-br">
                            <div class="card-header">
                                <h5 class="lb llb">Scan Nilai Rapor Terakhir<span style="color: red;">* (.pdf)</span></h5>
                            </div>
                            <div class="card-body">
                                <i class="fa fa-upload fa-xl upl" onclick="upload_nilairapor()" id="i-nilairapor"></i>
                                <input type="file" name="nilairapor" id="nilairapor" hidden required onchange="prev_nilairapor(event)">
                                <iframe id="nama-nilairapor" class="nama-nilairapor" frameborder="0" width="100%" scrolling="auto"></iframe>
                                <p class="clear-nilairapor" onclick="clear_nilairapor()" id="cl-nilairapor">Clear Choose</p>
                            </div>
                        </div>
                    </div>
                    <div class="form fm">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="verifikasi input data" name="verifinput" id="verifinput" required>
                            <label class="form-check-label" for="verif-input">
                                Saya menyatakan dengan sebenarnya, bahwa data yang diisikan dalam Formulir ini adalah benar. Apabila ternyata data tersebut palsu/tidak benar, maka saya bersedia menerima sanksi yang berlaku.<span style="color: red;">*</span>
                            </label>
                          </div>
                    </div>
                    <div class="form fm">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="verifikasi patuh" name="verifpatuh" id="verifpatuh" required>
                            <label class="form-check-label" for="verif-patuh">
                                Dengan mengisi data di atas, Saya akan mematuhi segala Peraturan yang Berlaku.<span style="color: red;">*</span>
                            </label>
                          </div>
                    </div>
                    <div class="text-center mb-5">
                        <button type="submit" class="btn btn-success mt-4" style="width:150px;">KIRIM</button>
                    </div>
                </form>
            </div>
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
    <style>
        .cd-br{
            margin-bottom: 20px;
        }
        .clear-nilairapor{
            cursor: pointer;
            color: #0079FF;
            margin-bottom: 0px;
            margin-top: 15px;
            display: none;
        }
        .clear-akta{
            cursor: pointer;
            color: #0079FF;
            margin-bottom: 0px;
            margin-top: 15px;
            display: none;
        }
        .clear-kk{
            cursor: pointer;
            color: #0079FF;
            margin-bottom: 0px;
            margin-top: 15px;
            display: none;
        }
        .clear-ktp{
            cursor: pointer;
            color: #0079FF;
            margin-bottom: 0px;
            margin-top: 15px;
            display: none;
        }
        .nama-nilairapor{
            display: none;
        }
        .nama-akta{
            display: none;
        }
        .nama-kk{
            display: none;
        }
        .nama-ktp{
            display: none;
        }
        .berkas{
            display: inline;
            text-align: center;
        }
        .upl:hover{
            color: #4942E4;
        }
        .upl{
            color: #0079FF;
            cursor: pointer;
        }
        .pasfoto{
            border: 5px solid white;
            cursor: pointer;
        }
        .keterangan {
            font-size: 13px;
            margin-top: 10px;
        }

        .lb {
            font-size: 14px;
            margin-top: 20px;
        }

        .form {
            display: inline;
            margin-bottom: 30px;
        }

        .thn {
            font-size: 10px;
        }

        .sklh {
            font-size: 13px;
            font-weight: bold;
        }

        .tp {
            font-size: 13px;
        }

        .kotak-dalam-bawah {
            padding-top: 2%;
            padding-left: 13%;
            padding-right: 13%;
            padding-bottom: 0px;
        }

        .kotak-dalam {
            padding: 2%;
            padding-bottom: 0px;
        }

        .garis-top {
            border-top: 1px solid #8696FE;
        }

        .kotak {
            border: 1px solid #8696FE;
            background-color: #F6F6F6;
        }

        .icon {
            width: 70px;
        }

        @media screen and (min-width: 550px) {
            .card-berkas{
                width: 24%;
                margin-right: 1%;
            }
            .bks{
                display: flex;
            }
            .wn{
                font-size: 17px;
                margin-top: 7px;
            }
            .llb{
                font-size: 15px;
                margin-top: 8px;
            }
            .ktr {
                font-size: 19px;
                margin-bottom: 30px;
            }

            .labl {
                font-size: 20px;
                margin-top: 5px;
            }

            .inp {
                width: 80%;
            }

            .lbl {
                width: 20%;
            }

            .fm {
                display: flex;
            }

            .th {
                font-size: 15px;
            }

            .sl {
                font-size: 25px;
                font-weight: bold;
            }

            .top {
                font-size: 25px;
            }

            .icn {
                width: 150px;
            }
        }
    </style>
    <script src="/admin_guru/js/fontawesome.all.js" crossorigin="anonymous"></script>
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
        function clear_nilairapor(){
            document.getElementById('nama-nilairapor').style.display = 'none'
            document.getElementById('cl-nilairapor').style.display = 'none'
            document.getElementById('i-nilairapor').style.display = 'inline'
            document.getElementById("nilairapor").value = ''
        }
        function prev_nilairapor(event){
            document.getElementById('i-nilairapor').style.display = 'none'
            document.getElementById('nama-nilairapor').style.display = 'block'
            document.getElementById('cl-nilairapor').style.display = 'block'
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("nilairapor").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("nama-nilairapor").src = oFREvent.target.result;
            };
        }
        function upload_nilairapor(){
            document.getElementById('nilairapor').click()
        }
        function clear_akta(){
            document.getElementById('nama-akta').style.display = 'none'
            document.getElementById('cl-akta').style.display = 'none'
            document.getElementById('i-akta').style.display = 'inline'
            document.getElementById("akta").value = ''
        }
        function prev_akta(event){
            document.getElementById('i-akta').style.display = 'none'
            document.getElementById('nama-akta').style.display = 'block'
            document.getElementById('cl-akta').style.display = 'block'
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("akta").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("nama-akta").src = oFREvent.target.result;
            };
        }
        function upload_akta(){
            document.getElementById('akta').click()
        }
        function clear_kk(){
            document.getElementById('nama-kk').style.display = 'none'
            document.getElementById('cl-kk').style.display = 'none'
            document.getElementById('i-kk').style.display = 'inline'
            document.getElementById("kk").value = ''
        }
        function prev_kk(event){
            document.getElementById('i-kk').style.display = 'none'
            document.getElementById('nama-kk').style.display = 'block'
            document.getElementById('cl-kk').style.display = 'block'
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("kk").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("nama-kk").src = oFREvent.target.result;
            };
        }
        function upload_kk(){
            document.getElementById('kk').click()
        }
        function clear_ktp(){
            document.getElementById('nama-ktp').style.display = 'none'
            document.getElementById('cl-ktp').style.display = 'none'
            document.getElementById('i-ktp').style.display = 'inline'
            document.getElementById("ktportu").value = ''
        }
        function prev_ktp(event){
            document.getElementById('i-ktp').style.display = 'none'
            document.getElementById('nama-ktp').style.display = 'block'
            document.getElementById('cl-ktp').style.display = 'block'
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("ktportu").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("nama-ktp").src = oFREvent.target.result;
            };
        }
        function upload_ktp_ortu(){
            document.getElementById('ktportu').click()
        }
        function prv_pas_fot(){
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("pasfoto").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("prv-pas").src = oFREvent.target.result;
            };
        }
        function upload_pas(){
            document.getElementById('pasfoto').click()
        }
    </script>
@endsection
