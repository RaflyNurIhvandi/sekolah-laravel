@extends('admin_sekolah.layout.index')

@section('head_identitas')
    @foreach($data as $i)
        {{ $i->nama_sekolah }}
    @endforeach
@endsection
@section('konten')
    <h3>
        Profil Siswa
    </h3>
    <div class="d-flex">
        <div class="kotak-profile mt-4">
            @foreach($pensis as $i)
                <center>
                    <img src="/pendaftaran_siswa/pas_foto_siswa/{{ $i->gambar_siswa }}" alt="" class="foto-profile" width="127.5" height="165">
                    <h5 class="mt-3">{{ $i->nama_siswa }}</h5>
                    <p class="mt-3">{{ $i->tempat_lahir }}, {{ $i->tanggal_lahir }}</p>
                    <p class="mt-3 mb-3">
                        Alamat : <br>{{ $i->alamat_siswa }}
                    </p>
                    <button type="button" class="btn btn-primary btn-sm" style="width: 100px;" onclick="terima_siswa(this)" value="terima_{{ $i->no_siswa }}">Terima</button>
                    <button type="button" class="btn btn-outline-primary btn-sm" style="width: 100px;" onclick="tolak_siswa(this)" value="tolak_{{ $i->no_siswa }}">Tolak</button>
                    <a href="/terima/siswa/{{ $i->no_siswa }}/{{ $i->jurusan_siswa }}" id="terima_{{ $i->no_siswa }}" hidden></a>
                    <a href="/tolak/siswa/{{ $i->no_siswa }}" id="tolak_{{ $i->no_siswa }}" hidden></a>
                </center>
            @endforeach
        </div>
        @foreach($pensis as $i)
            <div class="kotak-bio mt-4">
                <div class="d-flex">
                    <div class="kiri">
                        <h5>Nama</h5>
                        <p></p>
                        <p class="gb"></p>
                        <h5>Tempat / Tanggal lahir</h5>
                        <p></p>
                        <p class="gb"></p>
                        <h5>Email</h5>
                        <p></p>
                        <p class="gb"></p>
                        <h5>No HP</h5>
                        <p></p>
                        <p class="gb"></p>
                        <h5>Alamat</h5>
                    </div>
                    <div class="kanan">
                        <h5>{{ $i->nama_siswa }}</h5>
                        <p></p>
                        <p class="gb"></p>
                        <h5>{{ $i->tempat_lahir }} / {{ $i->tanggal_lahir }}</h5>
                        <p></p>
                        <p class="gb"></p>
                        <h5>{{ $i->email_siswa }}</h5>
                        <p></p>
                        <p class="gb"></p>
                        <h5>{{ $i->no_hp_siswa }}</h5>
                        <p></p>
                        <p class="gb"></p>
                        <h5>{{ $i->alamat_siswa }}</h5>
                        <p></p>
                        <div class="d-flex">
                            <h5 style="width: 35%; margin-right: 4%;">Kota : <b>{{ $i->kota_siswa }}</b></h5>
                            <h5 style="width: 48%;">Provinsi : <b>{{ $i->provinsi_siswa }}</b></h5>
                        </div>
                        <div class="d-flex mt-2">
                            <h5 style="width: 35%; margin-right: 4%;">Kode POS : <b>{{ $i->kode_pos_siswa }}</b></h5>
                            <h5 style="width: 48%;">Negara : <b>{{ $i->negara_siswa }}</b></h5>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="kotak-berkas">
        @foreach($pensis as $i)
            <div class="d-flex">
                <div class="ktp">
                    <div class="text-center">
                        <h5>KTP Orang Tua</h5>
                    </div>
                    <div class="text-center" style="cursor: pointer;">
                        <i class="fa fa-file-pdf fa-lg"></i>
                        <p onclick="buka_ktp()">{{ $i->ktp_wali }}</p>
                        <a target="_blank" href="/pendaftaran_siswa/berkas_siswa/ktp_ortu/{{ $i->ktp_wali }}" id="use-ktp-ortu" hidden></a>
                    </div>
                </div>
                <div class="kk">
                    <div class="text-center">
                        <h5>Kartu Keluarga</h5>
                    </div>
                    <div class="text-center" style="cursor: pointer;">
                        <i class="fa fa-file-pdf fa-lg"></i>
                        <p onclick="buka_kk()">{{ $i->kartu_keluarga }}</p>
                        <a target="_blank" href="/pendaftaran_siswa/berkas_siswa/kartu_keluarga/{{ $i->kartu_keluarga }}" id="use-kk-ortu" hidden></a>
                    </div>
                </div>
                <div class="akta">
                    <div class="text-center">
                        <h5>Akta Kelahiran</h5>
                    </div>
                    <div class="text-center" style="cursor: pointer;">
                        <i class="fa fa-file-pdf fa-lg"></i>
                        <p onclick="buka_akta()">{{ $i->akta_kelahiran }}</p>
                        <a target="_blank" href="/pendaftaran_siswa/berkas_siswa/akta_kelahiran/{{ $i->akta_kelahiran }}" id="use-akta-ortu" hidden></a>
                    </div>
                </div>
                <div class="rapor">
                    <div class="text-center">
                        <h5>Nilai Rapor</h5>
                    </div>
                    <div class="text-center" style="cursor: pointer;">
                        <i class="fa fa-file-pdf fa-lg"></i>
                        <p onclick="buka_rapor()">{{ $i->nilai_rapor }}</p>
                        <a target="_blank" href="/pendaftaran_siswa/berkas_siswa/nilai_rapor/{{ $i->nilai_rapor }}" id="use-rapor-ortu" hidden></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@section('css')
    <style>
        .rapor{
            width: 23.5%;
            height: auto;
            background-color: #BFCCB5;
            padding: 2%;
        }
        .akta{
            width: 23.5%;
            height: auto;
            margin-right: 2%;
            background-color: #BFCCB5;
            padding: 2%;
        }
        .kk{
            width: 23.5%;
            height: auto;
            margin-right: 2%;
            background-color: #BFCCB5;
            padding: 2%;
        }
        .ktp{
            width: 23.5%;
            height: auto;
            margin-right: 2%;
            background-color: #BFCCB5;
            padding: 2%;
        }
        .kotak-berkas{
            width: 100%;
            height: auto;
            margin-top: 2%;
            background-color: #C4DFDF;
            border-radius: 7px;
            padding: 2%;
        }
        .gb{
            border-bottom: 1px solid black;
        }
        .kanan{
            width: 70%;
        }
        .kiri{
            width: 30%;
        }
        .kotak-bio{
            width: 71%;
            height: auto;
            padding: 2%;
            background-color: #C4DFDF;
            border-radius: 7px;
        }
        .foto-profile{
            border: 5px solid white;
        }
        .kotak-profile{
            background-color: #C4DFDF;
            width: 27%;
            height: auto;
            margin-right: 2%;
            border-radius: 7px;
            padding: 2%;
        }
    </style>
@endsection
@section('js')
    <script>
        function tolak_siswa(obj){
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Anda ingin menolak siswa ini!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(obj.getAttribute('value')).click()
                    Swal.fire({
                        icon: 'success',
                        title: 'Siswa ini telah ditolak',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        }
        function terima_siswa(obj){
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Anda ingin menerima siswa ini!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(obj.getAttribute('value')).click()
                    Swal.fire({
                        icon: 'success',
                        title: 'Siswa ini telah diterima',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        }
        function buka_rapor(){
            document.getElementById('use-rapor-ortu').click()
        }
        function buka_akta(){
            document.getElementById('use-akta-ortu').click()
        }
        function buka_kk(){
            document.getElementById('use-kk-ortu').click()
        }
        function buka_ktp(){
            document.getElementById('use-ktp-ortu').click()
        }
    </script>
@endsection
