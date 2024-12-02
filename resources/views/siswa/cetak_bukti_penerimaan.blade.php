<div class="head">
    <div class="head_kiri">
        <center>
            @foreach($icn as $ic)
                <img src="/gambar/profile_sekolah/{{ $ic->gambar_profile }}" alt="" width="118">
            @endforeach
        </center>
    </div>
    <div class="head_kanan">
        <center>
            <h4 class="h4_head">PEMERINTAH PROVINSI JAWA TIMUR</h4>
            <h2 class="h1_head">DINAS PENDIDIKAN</h2>
            <p class="p_head" style="margin-top: 25px;">Jl. Gentengkali No. 33 Telp. (031) 5342706, 5342707, 5342708</p>
            <p class="p_head" style="margin-top: 18px;">Fax. (031) 5465413, 5346707, Kode Pos 60275</p>
            <h5 class="h5_head">S U R A B A Y A</h5>
        </center>
    </div>
</div>
<div class="garis"></div>
<div class="bukti">
    <h4 class="h4_bukti">BUKTI PENERIMAAN</h4>
    <p class="p_bukti">Tahun 2023</p>
</div>
<div class="data">
    <div class="data_siswa">
        <div class="head_siswa">
            <p class="p_siswa"><b>DATA CALON PESERTA DIDIK BARU</b></p>
        </div>
        <div class="nisn">
            <p class="ktr_nisn">Nomor Induk Siswa Nasional</p>
            @foreach($sis as $s)
                <p class="no">{{ $s->nisn }}</p>
            @endforeach
        </div>
        <div class="body">
            <div class="body_kiri">
                <p class="ktr_sis">Nama</p>
                @foreach($sis as $s)
                    <p class="ktn_sis"><b>{{ $s->nama_siswa }}</b></p>
                @endforeach
                <p class="ktr_sis" style="margin-top: 20px;">Asal Sekolah</p>
                @foreach($sis as $s)
                    <p class="ktn_sis"><b>{{ $s->sekolah_asal_siswa }}</b></p>
                @endforeach
                <p class="ktr_sis" style="margin-top: 20px;">Kewarganegaraan</p>
                @foreach($sis as $s)
                    <p class="ktn_sis"><b>{{ $s->kewarganegaraan_siswa }}</b></p>
                @endforeach
            </div>
            <div class="body_kanan">
                <p class="ktr_sis">Provinsi sesuai KK/SKD</p>
                @foreach($sis as $s)
                    <p class="ktn_sis"><b>{{ $s->provinsi_siswa }}</b></p>
                @endforeach
                <p class="ktr_sis" style="margin-top: 20px;">Kota/Kabupaten sesuai KK/SKD</p>
                @foreach($sis as $s)
                    <p class="ktn_sis"><b>{{ $s->kota_siswa }}</b></p>
                @endforeach
                <p class="ktr_sis" style="margin-top: 20px;">Pendaftaran</p>
                @foreach($sis as $s)
                    <p class="ktn_sis"><b>GO SCHOOL {{ $s->nama_sekolah }}</b></p>
                @endforeach
            </div>
        </div>
    </div>
    <div class="data_sekolah">
        <div class="head_sekolah">
            <p class="p_head_sekolah"><b>TELAH DITERIMA DI SEKOLAH</b></p>
        </div>
        <div class="body_sekolah">
            <p class="ktr_sekolah">Nama Sekolah</p>
            @foreach($sis as $s)
                <p class="ktn_sekolah">{{ $s->nama_sekolah }}</p>
            @endforeach
            <p class="ktr_sekolah">Program Studi</p>
            @foreach($sis as $s)
                <p class="ktn_sekolah">{{ $s->nama_jurusan }}</p>
            @endforeach
            <p class="ktr_sekolah">Alamat Sekolah</p>
            @foreach($sis as $s)
                <p class="ktn_sekolah">{{ $s->alamat_sekolah }}</p>
            @endforeach
        </div>
    </div>
</div>
<div class="ketentuan">
    <h3 class="h4_ketentuan">Ketentuan</h3>
    <li class="li_ktn">Simpanlah bukti penerimaan ini dengan baik</li>
    <li class="li_ktn">Jika data yang telah digunakan tidak benar maka status penerimaan akan dibatalkan</li>
    <li class="li_ktn">Bukti penerimaan yang sah/diakui adalah yang dicetak sesuai dengan jadwal yang telah ditentukan</li>
</div>
<style>
    .li_ktn{
        font-family: Arial;
        font-size: 14px;
        line-height: 10px;
        margin-bottom: 16px;
    }
    .ketentuan{
        margin-top: 70px;
    }
    .h4_ketentuan{
        font-family: Arial;
        line-height: 1px;
    }
    .ktn_sekolah{
        font-family: Arial;
        font-size: 12px;
        line-height: 5px;
        margin-bottom: 16px;
    }
    .body_sekolah{
        text-align: center;
    }
    .ktr_sekolah{
        font-family: Arial;
        margin-top: 16px;
        font-size: 10.5px;
        line-height: 1px;
        color: rgb(180, 180, 180);
    }
    .head_sekolah{
        text-align: center;
        border-bottom: 1px solid black;
    }
    .p_head_sekolah{
        font-family: Arial;
        line-height: 1px;
        font-size: 13px;
        margin-bottom: 10px;
    }
    .data_sekolah{
        border: 1px solid black;
        margin-top: 35px;
    }
    .ktn_sis{
        font-family: Arial;
        font-size: 12px;
        line-height: 5px;
        margin-bottom: 16px;
    }
    .ktr_sis{
        font-family: Arial;
        margin-top: 16px;
        font-size: 10.5px;
        line-height: 1px;
        color: rgb(180, 180, 180);
    }
    .body_kanan{
        width: 50%;
        text-align: center;
    }
    .body_kiri{
        width: 50%;
        text-align: center;
        border-right: 1px solid black;
    }
    .body{
        display: flex;
    }
    .no{
        font-family: Arial;
        font-size: 12px;
        line-height: 5px;
        margin-bottom: 8px;
    }
    .nisn{
        text-align: center;
        border-bottom: 1px solid black;
    }
    .ktr_nisn{
        font-family: Arial;
        font-size: 10.5px;
        line-height: 1px;
        color: rgb(180, 180, 180);
    }
    .head_siswa{
        text-align: center;
        border-bottom: 1px solid black;
        padding-top: 0;
        padding-left: 0;
    }
    .p_siswa{
        font-family: Arial;
        line-height: 1px;
        font-size: 13px;
        margin-bottom: 10px;
    }
    .data_siswa{
        border: 1px solid black;
    }
    .data{
        margin: 35px;
    }
    .p_bukti{
        font-family: Arial;
        line-height: 1px;
    }
    .h4_bukti{
        font-family: Arial;
        line-height: 1px;
        margin-top: 35px;
        margin-bottom: 16px;
    }
    .bukti{
        text-align: center;
    }
    .garis{
        border-bottom: 3px solid black;
    }
    .h5_head{
        font-family: Arial;
        line-height: 1px;
        margin-top: 0;
        font-size: 16px;
    }
    .p_head{
        font-family: Arial;
        line-height: 1px;
    }
    .h1_head{
        font-family: Arial;
        line-height: 1px;
    }
    .h4_head{
        font-family: Arial;
        line-height: 1px;
    }
    .head_kanan{
        width: 85%;
    }
    .head_kiri{
        width: 15%;
    }
    .head{
        margin-top: 50px;
        display: flex;
    }
</style>
<script>
    window.print()
</script>
