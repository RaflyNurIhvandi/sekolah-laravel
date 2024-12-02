@extends('admin_sekolah.layout.index')

@section('head_identitas')
    @foreach ($data as $i)
        {{ $i->nama_sekolah }}
    @endforeach
@endsection
@section('konten')
    <h3>
        Profile Admin
        <b>
            @foreach ($data as $i)
                {{ $i->nama_sekolah }}
            @endforeach
        </b>
    </h3>
    <div class="pref text-center" id="pref">
        @foreach ($foto as $i)
            @if ($i->gambar == null)
                <img id="pref-pp" class="pref-pp" src="/gambar/preview.jpg" alt="" width="650" height="650"
                    onclick="pref_pp()">
            @else
                <img id="pref-pp" class="pref-pp" src="/gambar/profile_admin/{{ $i->gambar }}" alt=""
                    width="650" height="650" onclick="pref_pp()">
            @endif
        @endforeach
    </div>
    <div class="edit-pp text-center" id="edit-pp">
        <div class="dlog">
            <div class="header-dialog">
                <span class="close" onclick="clo()" id="clos">&times;</span>
                <h3 class="float-start">Edit Foto Profile</h3>
            </div>
            <div class="text-center mb-3" style="padding-top: 15%;">
                <center>
                    @foreach ($foto as $i)
                        @if ($i->gambar == null)
                            <img class="img-edit" id="img-edit" src="/gambar/preview.jpg" alt="" width="350"
                                height="350" onclick="ambil()">
                        @else
                            <img class="img-edit" id="img-edit" src="/gambar/profile_admin/{{ $i->gambar }}"
                                alt="" width="350" height="350" onclick="ambil()">
                        @endif
                    @endforeach
                </center>
                <div class="text-center mt-3">
                    <button type="button" class="btn btn-success btn-sm" style="width:75px;"
                        onclick="sv_pp()">Simpan</button>
                </div>
                <div class="form-pp">
                    @foreach ($foto as $i)
                        <form action="/update/foto/profile/{{ $i->no_anggota }}" enctype="multipart/form-data"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <input type="file" name="pp" id="pp" onchange="ppp()">
                            <button type="submit" id="save-edit-pp"></button>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="profile-admin d-flex">
        <div class="me-5">
            @foreach ($foto as $i)
                @if ($i->gambar == null)
                    <img class="mt-4 pp" src="/gambar/preview.jpg" alt="" width="260" height="260"
                        onclick="pp()">
                @else
                    <img class="mt-4 pp" src="/gambar/profile_admin/{{ $i->gambar }}" alt="" width="260"
                        height="260" onclick="pp()">
                @endif
            @endforeach
            <div class="text-center">
                <button type="button" class="btn btn-secondary btn-sm mt-4" onclick="edit_photo_profile()">Edit Foto
                    Profile</button>
            </div>
        </div>
        <div class="mt-4">
            @foreach ($data as $i)
                <div class="bio d-flex">
                    <h5>Nama :&nbsp;</h5>
                    <p>{{ $i->nama }}</p>
                </div>
                <div class="bio d-flex">
                    <h5>No Anggota :&nbsp;</h5>
                    <p>{{ $i->no_anggota }}</p>
                </div>
                <div class="bio d-flex">
                    <h5>Tempat / Tanggal Lahir :&nbsp;</h5>
                    <p>{{ $i->tempat_lahir }}, {{ $i->tanggal_lahir }}</p>
                </div>
                <div class="bio d-flex">
                    <h5>No HP :&nbsp;</h5>
                    <p>{{ $i->no_hp }}</p>
                </div>
                <div class="bio d-flex">
                    <h5>User :&nbsp;</h5>
                    <p>{{ $i->user }}</p>
                </div>
                <div class="bio d-flex">
                    <h5>Email :&nbsp;</h5>
                    <p>{{ $i->email }}</p>
                </div>
                <div class="bio d-flex">
                    <h5>Alamat :&nbsp;</h5>
                    <p>{{ $i->alamat }}</p>
                </div>
            @endforeach
            <button type="button" class="btn btn-secondary btn-sm mt-1" style="width: 100px" onclick="edit_bio()">Edit
                Bio</button>
        </div>
    </div>
    <div class="form-bio" id="form-bio">
        <div class="isi-form">
            <span class="ce" id="clfm" onclick="cl_form()">&times;</span>
            <h4 class="mt-2">Edit Bio</h4>
            <div class="p-3">
                @foreach ($data as $i)
                    <form action="/update/bio/{{ $i->no_anggota }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama"
                                value="{{ $i->nama }}">
                        </div>
                        <div class="mb-3">
                            <label for="tempattanggallahir" class="form-label">Tempat / Tangggal Lahir</label>
                            <div class="d-flex">
                                <input type="text" class="form-control" name="tempat" id="tempat"
                                    style="width: 45%; margin-right:5%;" value="{{ $i->tempat_lahir }}">
                                <input type="date" class="form-control" name="tgl" id="tgl"
                                    style="width: 50%;" value="{{ $i->tanggal_lahir }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nohp" class="form-label">No HP</label>
                            <input type="text" class="form-control" name="nohp" id="nohp"
                                value="{{ $i->no_hp }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                value="{{ $i->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" rows="3">{{ $i->alamat }}</textarea>
                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn btn-success btn-sm me-2" style="width:100px;"
                                onclick="simpan_bio()"><b>Simpan</b></button>
                            <button type="reset" class="btn btn-warning btn-sm me-2"
                                style="width:100px; color:white;" id="rest">Reset</button>
                            <button type="button" class="btn btn-danger btn-sm me-2" style="width:100px;"
                                onclick="cencel_bio()">Cencel</button>
                            <button type="submit" hidden id="save-bio"></button>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('css')
    {{-- form edit bio --}}
    <style>
        .ce:hover,
        .ce:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .ce {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .isi-form {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 40%;
            border-radius: 7px;
        }

        .form-bio {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }
    </style>
    {{-- end form edit bio --}}

    <style>
        .form-pp {
            display: none;
        }

        .img-edit {
            border-radius: 10px;
            cursor: pointer;
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

        .edit-pp {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }

        .dlog {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            border-radius: 10px;
            width: 30%;
            margin-top: 3%;
            margin-bottom: 3%;
        }

        .pref-pp {
            border-radius: 10px;
            margin-top: 1%;
            margin-bottom: 1%;
        }

        .pref {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }

        .pp {
            border-radius: 10px;
        }

        .pp:hover {
            cursor: pointer;
        }
    </style>
@endsection
@section('js')
    {{-- form edit bio --}}
    <script>
        function cencel_bio(){
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Semua perubahan akan kembali ke awal!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('clfm').click()
                    document.getElementById('rest').click()
                }
            })
        }
        function simpan_bio() {
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
                    document.getElementById('save-bio').click()
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

        function cl_form() {
            document.getElementById('form-bio').style.display = 'none'
        }

        function edit_bio() {
            document.getElementById('form-bio').style.display = 'block'
        }
    </script>
    {{-- end form edit bio --}}

    <script>
        function ppp() {
            document.getElementById("img-edit").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("pp").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("img-edit").src = oFREvent.target.result;
            };
        };

        function ambil() {
            document.getElementById('pp').click()
        }

        function sv_pp() {
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Pastikan foto sudah sesuai!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('save-edit-pp').click()
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Berhasil memperbarui profile',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        }

        function clo() {
            document.getElementById('edit-pp').style.display = 'none'
        }

        function edit_photo_profile() {
            document.getElementById('edit-pp').style.display = 'block'
        }

        function pp() {
            document.getElementById('pref').style.display = 'block'
        }
        window.onclick = function(event) {
            if (event.target == document.getElementById('pref')) {
                document.getElementById('pref').style.display = 'none'
            }
        }

        function pref_pp() {
            document.getElementById('pref').style.display = 'none'
        }
    </script>
@endsection
