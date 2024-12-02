@extends('admin_sekolah.layout.index')

@section('head_identitas')
    @foreach($data as $i)
        {{ $i->nama_sekolah }}
    @endforeach
@endsection
@section('konten')
    <h3>
        Data Siswa
        <b>
            @foreach($data as $i)
                {{ $i->nama_sekolah }}
            @endforeach
        </b>
    </h3>
    <center>
        <div class="kotak-profile mt-4">
            @foreach($dtsiswa as $i)
                <img src="/pendaftaran_siswa/pas_foto_siswa/{{ $i->gambar_siswa }}" alt="" class="foto-siswa" width="127.5" height="165">
                <h5 class="mt-3">{{ $i->nama_siswa }}</h5>
                <p class="mt-2">{{ $i->tempat_lahir_siswa }}, {{ $i->tanggal_lahir_siswa }}</p>
                <p class="mb-3">
                    Alamat : <br>
                    {{ $i->alamat_siswa }}
                </p>
                <button type="button" class="btn btn-primary btn-sm" style="width: 150px;" data-id="keluar_{{ $i->no_siswa }}" onclick="keluarkan(this)">KELUARKAN DARI SEKOLAH</button>
                <a href="/keluarkan/siswa/{{ $i->no_siswa }}" id="keluar_{{ $i->no_siswa }}" hidden></a>
            @endforeach
        </div>
    </center>
    <div class="kotak-bio-siswa">
        <h3 class="text-center mb-4">Bio Data Siswa</h3>
        @foreach($dtsiswa as $i)
            <div class="d-flex">
                <div class="kiri">
                    <h5>ID Siswa</h5>
                    <p></p>
                    <p class="gb"></p>
                    <h5>Nama Siswa</h5>
                    <p></p>
                    <p class="gb"></p>
                    <h5>NISN</h5>
                    <p></p>
                    <p class="gb"></p>
                    <h5>Jenis Kelamin</h5>
                    <p></p>
                    <p class="gb"></p>
                    <h5>Tempat / Tanggal Lahir</h5>
                    <p></p>
                    <p class="gb"></p>
                    <h5>Agama</h5>
                    <p></p>
                    <p class="gb"></p>
                    <h5>Kewarganegaraan</h5>
                    <p></p>
                    <p class="gb"></p>
                    <h5>Anak Ke-</h5>
                    <p></p>
                    <p class="gb"></p>
                    <h5>No HP</h5>
                    <p></p>
                    <p class="gb"></p>
                    <h5>Email</h5>
                    <p></p>
                    <p class="gb"></p>
                    <h5>Alamat</h5>
                </div>
                <div class="kanan">
                    <h5>{{ $i->no_siswa }}</h5>
                    <p></p>
                    <p class="gb"></p>
                    <h5>{{ $i->nama_siswa }}</h5>
                    <p></p>
                    <p class="gb"></p>
                    <h5>{{ $i->nisn }}</h5>
                    <p></p>
                    <p class="gb"></p>
                    <h5>{{ $i->jenis_kelamin_siswa }}</h5>
                    <p></p>
                    <p class="gb"></p>
                    <h5>{{ $i->tempat_lahir_siswa }}, {{ $i->tanggal_lahir_siswa }}</h5>
                    <p></p>
                    <p class="gb"></p>
                    <h5>{{ $i->agama_siswa }}</h5>
                    <p></p>
                    <p class="gb"></p>
                    <h5>{{ $i->kewarganegaraan_siswa }}</h5>
                    <p></p>
                    <p class="gb"></p>
                    <h5>{{ $i->anak_ke }}</h5>
                    <p></p>
                    <p class="gb"></p>
                    <h5>{{ $i->no_hp_siswa }}</h5>
                    <p></p>
                    <p class="gb"></p>
                    <h5>{{ $i->email_siswa }}</h5>
                    <p></p>
                    <p class="gb"></p>
                    <h5 style="line-height: 30px;">{{ $i->alamat_siswa }}, {{ $i->kota_siswa }}, {{ $i->provinsi_siswa }}, {{ $i->kode_pos_siswa }}, {{ $i->negara_siswa }}</h5>
                </div>
            </div>
        @endforeach
    </div>
    <div class="kotak-bio-wali">
        <h3 class="text-center mb-4">Bio Data Orang Tua / Wali</h3>
        @foreach($dtsiswa as $i)
            <div class="d-flex">
                <div class="kiri">
                    <h5>ID Orang Tua / Wali</h5>
                    <p></p>
                    <p class="gb"></p>
                    <h5>Nama Orang Tua / Wali</h5>
                    <p></p>
                    <p class="gb"></p>
                    <h5>Jenis Kelamin</h5>
                    <p></p>
                    <p class="gb"></p>
                    <h5>Tempat / Tanggal Lahir</h5>
                    <p></p>
                    <p class="gb"></p>
                    <h5>Kewarganegaraan</h5>
                    <p></p>
                    <p class="gb"></p>
                    <h5>Hubungan Keluarga</h5>
                    <p></p>
                    <p class="gb"></p>
                    <h5>Agama</h5>
                    <p></p>
                    <p class="gb"></p>
                    <h5>Pekerjaan</h5>
                    <p></p>
                    <p class="gb"></p>
                    <h5>No HP</h5>
                    <p></p>
                    <p class="gb"></p>
                    <h5>Alamat</h5>
                </div>
                <div class="kanan">
                    <h5>{{ $i->no_wali }}</h5>
                    <p></p>
                    <p class="gb"></p>
                    <h5>{{ $i->nama_wali }}</h5>
                    <p></p>
                    <p class="gb"></p>
                    <h5>{{ $i->jenis_kelamin_wali }}</h5>
                    <p></p>
                    <p class="gb"></p>
                    <h5>{{ $i->tempat_lahir_wali }}, {{ $i->tanggal_lahir_wali }}</h5>
                    <p></p>
                    <p class="gb"></p>
                    <h5>{{ $i->kewarganegaraan_wali }}</h5>
                    <p></p>
                    <p class="gb"></p>
                    <h5>{{ $i->hubungan_keluarga }}</h5>
                    <p></p>
                    <p class="gb"></p>
                    <h5>{{ $i->agama_wali }}</h5>
                    <p></p>
                    <p class="gb"></p>
                    <h5>{{ $i->pekerjaan_wali }}</h5>
                    <p></p>
                    <p class="gb"></p>
                    <h5>{{ $i->no_hp_wali }}</h5>
                    <p></p>
                    <p class="gb"></p>
                    <h5 style="line-height: 30px;">{{ $i->alamat_wali }}, {{ $i->kota_wali }}, {{ $i->provinsi_wali }}, {{ $i->kode_pos_wali }}, {{ $i->negara_wali }}</h5>
                </div>
            </div>
        @endforeach
    </div>
    <div class="kotak-berkas-siswa">
        <h3 class="text-center mb-4">Berkas Siswa</h3>
        @foreach($dtsiswa as $i)
            <div class="d-flex">
                <div class="kotak-berkas" style="width: 24.25%; margin-right: 1%;">
                    <center>
                        KTP Orang Tua / Wali<br>
                        <a href="/pendaftaran_siswa/berkas_siswa/ktp_ortu/{{ $i->ktp_wali }}" target="_blank" style="text-decoration: none;"><h5 style="margin-top: 15px;">{{ $i->ktp_wali }}</h5></a>
                    </center>
                </div>
                <div class="kotak-berkas" style="width: 24.25%; margin-right: 1%;">
                    <center>
                        Kartu Keluarga<br>
                        <a href="/pendaftaran_siswa/berkas_siswa/kartu_keluarga/{{ $i->kartu_keluarga }}" target="_blank" style="text-decoration: none;"><h5 style="margin-top: 15px;">{{ $i->kartu_keluarga }}</h5></a>
                    </center>
                </div>
                <div class="kotak-berkas" style="width: 24.25%; margin-right: 1%;">
                    <center>
                        Akta Kelahiran<br>
                        <a href="/pendaftaran_siswa/berkas_siswa/akta_kelahiran/{{ $i->akta_kelahiran }}" target="_blank" style="text-decoration: none;"><h5 style="margin-top: 15px;">{{ $i->akta_kelahiran }}</h5></a>
                    </center>
                </div>
                <div class="kotak-berkas" style="width: 24.25%;">
                    <center>
                        Rapor<br>
                        <a href="/pendaftaran_siswa/berkas_siswa/nilai_rapor/{{ $i->nilai_rapor }}" target="_blank" style="text-decoration: none;"><h5 style="margin-top: 15px;">{{ $i->nilai_rapor }}</h5></a>
                    </center>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@section('css')
    <style>
        .kotak-berkas{
            background-color: #F5EFE7;
            padding: 2%;
            border-radius: 5px;
        }
        .kotak-berkas-siswa{
            width: 100%;
            height: auto;
            background-color: #C4DFDF;
            border-radius: 7px;
            margin-top: 2%;
            padding: 2%;
        }
        .kotak-bio-wali{
            width: 100%;
            height: auto;
            background-color: #C4DFDF;
            border-radius: 7px;
            margin-top: 2%;
            padding: 2%;
        }
        .kanan{
            width: 75%;
        }
        .kiri{
            width: 25%;
        }
        .gb{
            border-bottom: 1px solid black;
            opacity: 30%;
        }
        .kotak-bio-siswa{
            width: 100%;
            height: auto;
            background-color: #C4DFDF;
            border-radius: 7px;
            margin-top: 2%;
            padding: 2%;
        }
        .foto-siswa{
            border: 5px solid white;
        }
        .kotak-profile{
            width: 25%;
            height: auto;
            margin-right: 2%;
            background-color: #C4DFDF;
            border-radius: 7px;
            padding: 2%;
        }
    </style>
@endsection
@section('js')
    <script>
        function keluarkan(obj){
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Anda ingin mengeluarkan siswa ini dari sekolah!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(obj.getAttribute('data-id')).click()
                    Swal.fire({
                        icon: 'success',
                        title: 'Siswa Dikeluarkan',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        }
    </script>
@endsection
