@extends('admin_guru.layout.belum_diterima')

@section('head_identitas')
    @foreach($profile as $i)
        {{ $i->nama }}
    @endforeach
@endsection
@section('konten')
    <h3>
        Profile :
        <b>
            @foreach($profile as $i)
            {{ $i->nama }}
            @endforeach
        </b>
    </h3>
    <div class="d-flex">
        <div class="kotak-profil mt-3">
            @foreach($profile as $i)
                <div class="text-center">
                    <img src="/gambar/pas_foto_guru/{{ $i->gambar }}" class="pas-foto mb-3" width="127.5" height="165">
                    <h5 class="mb-3"><b>{{ $i->nama }}</b></h5>
                    <p class="mb-3">Keahlian saya adalah {{ $i->keahlian }}</p>
                    <p>Motivasi saya adalah {{ $i->deskripsi }}</p>
                    <button type="button" class="btn btn-primary btn-sm me-2" style="width: 100px;">Disabled</button>
                    <button type="button" class="btn btn-outline-primary btn-sm" style="width: 100px; color:black;" onclick="btn_out()">Out</button>
                </div>
            @endforeach
        </div>
        @foreach($profile as $i)
            <div class="kotak-bio mt-3">
                <div class="d-flex">
                    <div class="kiri">
                        <h5><b>Full Name</b></h5>
                        <p></p>
                        <p class="bio"></p>
                        <h5><b>Tempat / Tanggal Lahir</b></h5>
                        <p></p>
                        <p class="bio"></p>
                        <h5><b>Gen</b></h5>
                        <p></p>
                        <p class="bio"></p>
                        <h5><b>Email</b></h5>
                        <p></p>
                        <p class="bio"></p>
                        <h5><b>No HP</b></h5>
                        <p></p>
                        <p class="bio"></p>
                        <h5><b>Alamat</b></h5>
                    </div>
                    <div class="kanan">
                        <h5>{{ $i->nama }}</h5>
                        <p></p>
                        <p class="bio"></p>
                        <h5>{{ $i->tempat_lahir }} / {{ $i->tanggal_lahir }}</h5>
                        <p></p>
                        <p class="bio"></p>
                        <h5>{{ $i->genre }}</h5>
                        <p></p>
                        <p class="bio"></p>
                        <h5>{{ $i->email }}</h5>
                        <p></p>
                        <p class="bio"></p>
                        <h5>{{ $i->no_hp }}</h5>
                        <p></p>
                        <p class="bio"></p>
                        <h5>{{ $i->alamat }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex">
        <div class="entertiment">
            @foreach($profile as $i)
                <div class="icn">
                    <img class="icn-cn" src="/icon/wa.png" width="35">
                    <div class="float-end ssmd"><h5>{{ $i->whatsapp }}</h5></div>
                </div>
                <p></p>
                <p class="bio"></p>
                <div class="icn">
                    <img class="icn-in" src="/icon/ig.png" width="35">
                    <div class="float-end ssmd-in"><h5>{{ $i->instagram }}</h5></div>
                </div>
                <p></p>
                <p class="bio"></p>
                <div class="icn">
                    <img class="icn-in" src="/icon/fb.png" width="35">
                    <div class="float-end ssmd-in"><h5>{{ $i->facebook }}</h5></div>
                </div>
                <p></p>
                <p class="bio"></p>
                <div class="icn">
                    <img class="icn-in" src="/icon/tt.png" width="35">
                    <div class="float-end ssmd-in"><h5>{{ $i->tiktok }}</h5></div>
                </div>
                <p></p>
                <p class="bio"></p>
                <div class="icn">
                    <img class="icn-in" src="/icon/yt.png" width="35">
                    <div class="float-end ssmd-in"><h5>{{ $i->youtube }}</h5></div>
                </div>
                <p class="mb-4"></p>
            @endforeach
        </div>
        <div class="cv">
            @foreach($profile as $i)
                <div class="d-flex">
                    <div class="l d-flex">
                        <i class="fa fa-file-pdf fa-2xl" style="color:red;"></i>
                        <h5 class="ms-4 mt-1">{{ $i->file }}</h5>
                    </div>
                    <div class="r">
                        <button type="button" class="btn btn-secondary btn-sm" onclick="buka_cv()">USE</button>
                        <a href="/use/cv/{{ $i->no_anggota }}" target="_blank" id="use-cv" hidden></a>
                    </div>
                </div>
                <p></p>
                <p class="bio"></p>
                <div class="konten-pdf">
                    <div class="d-flex mb-3 mt-4">
                        <i class="fa fa-location-arrow fa-lg mt-1 me-3" style="color:rgb(194, 21, 21)"></i><h5 class="pe-5">Keahlian saya adalah {{ $i->keahlian }}</h5>
                    </div>
                    <div class="d-flex">
                        <i class="fa fa-location-arrow fa-lg mt-2 me-3" style="color:rgb(194, 21, 21)"></i><h5 class="pe-5 desc">Saya sangat percaya diri untuk menjadi salah satu guru / karyawan di sekolah {{ $i->nama_sekolah }}. Saya mempunyai motivasi {{ $i->deskripsi }}. Dengan itu izinkan saya untuk bergabung di {{ $i->nama_sekolah }}.</h5>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div hidden>
        @foreach($stt as $i)
            <form action="/out/pendaftaran/{{ $i->no_status }}" method="POST">
                @csrf
                @method('PUT')
                <input type="text" id="alasan" name="alasan">
                <input type="text" name="noanggota" id="noanggota" value="{{ $i->no_anggota }}">
                <button type="submit" id="kirim-alasan"></button>
            </form>
        @endforeach
    </div>
@endsection
@section('css')
    {{-- kotak profil --}}
    <style>
        .desc{
            line-height: 35px;
        }
        .konten-pdf{
            margin-left: 40px;
        }
        .r{
            width: 10%;
            margin-top: 25px;
        }
        .l{
            width: 90%;
            margin-left: 40px;
            margin-top: 25px;
        }
        .cv{
            width: 62%;
            height: auto;
            background-color: #C1D0B5;
            border-radius: 10px;
            margin-top: 2%;
        }
        .ssmd-in{
            margin-right: 25px;
            margin-top: 6px;
        }
        .icn-in{
            margin-left: 25px;
        }
        .ssmd{
            margin-right: 25px;
            margin-top: 30px;
        }
        .icn-cn{
            margin-left: 25px;
            margin-top: 25px;
        }
        .entertiment{
            width: 35%;
            height: auto;
            background-color: #C1D0B5;
            border-radius: 10px;
            margin-right: 3%;
            margin-top: 2%;
        }
        .kanan{
            width: 70%;
        }
        .kiri{
            width: 30%;
        }
        .bio{
            border-bottom: 2px solid black;
        }
        .kotak-bio{
            width: 72%;
            height: auto;
            padding: 2%;
            background-color: #C1D0B5;
            border-radius: 10px;
        }
        .pas-foto{
            border-radius: 2px;
            border: 5px solid white;
        }
        .kotak-profil{
            width: 25%;
            height: auto;
            padding: 2%;
            background-color: #C1D0B5;
            border-radius: 10px;
            margin-right: 3%;
        }
    </style>
    {{-- end kotak profil --}}
@endsection
@section('js')
    <script>
        function btn_out(){
            Swal.fire({
                title: 'Anda yakin?',
                text: "Anda membatalkan pendaftaran anda untuk menjadi karyawan disini!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Alasan membatalkan pendaftaran!',
                        text: "Alasan Anda?",
                        html:
                            '<input id="swal-input1" class="swal2-input" style="width:80%;">',
                        focusConfirm: false,
                        confirmButtonText: 'Kirim',
                        preConfirm: () => {
                            var inpout = document.getElementById('swal-input1').value
                            if (inpout == "") {
                                Swal.showValidationMessage(`Alasan pembatalan harus diisi!`)
                            }
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var inp = document.getElementById('swal-input1').value
                            document.getElementById('alasan').value = inp
                            Swal.fire({
                                title: 'Anda Yakin?',
                                text: "Semua data anda akan dihapus!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes'
                                }).then((result) => {
                                if (result.isConfirmed) {
                                    document.getElementById('kirim-alasan').click()
                                }
                            })
                        }
                    })
                }
            })
        }
        function buka_cv(){
            document.getElementById('use-cv').click()
        }
    </script>
@endsection
