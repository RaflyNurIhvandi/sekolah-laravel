@extends('admin_web.layout.index')
@section('konten')
    <h2 class="mb-3">Daftar Team</h2>
    <button type="button" class="btn btn-secondary mb-3" onclick="tambahTeam()">Tambah Team</button>
    <div class="tambah-team" id="tambah-team">
        <div class="form-tambahteam">
            <span class="close" id="close">&times;</span>
            <h3 class="mb-3">Tambah Team Baru</h3>
            <form action="/save/team" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama">
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="3"></textarea>
                </div>
                <div class="bawah">
                    <div class="sosial">
                        <div class="mb-3">
                            <label for="wa" class="form-label">Whats App</label>
                            <input type="text" class="form-control" name="wa" id="wa">
                        </div>
                        <div class="mb-3">
                            <label for="ig" class="form-label">Instagram</label>
                            <input type="text" class="form-control" name="ig" id="ig">
                        </div>
                        <div class="mb-3">
                            <label for="fb" class="form-label">Facebook</label>
                            <input type="text" class="form-control" name="fb" id="fb">
                        </div>
                        <div class="mb-3">
                            <label for="tw" class="form-label">Twitter</label>
                            <input type="text" class="form-control" name="tw" id="tw">
                        </div>
                    </div>
                    <div class="profil"><br class="br1" id="br1"><br class="br2" id="br2">
                        <center>
                            <span class="war-foto" id="war-foto">Masukan foto profile!</span>
                        </center>
                        <img src="/gambar/preview.jpg" class="gambar" id="preview" width="260" height="260"
                            onclick="previewImg()">
                        <input type="file" name="gambar" id="gambar" onchange="gambarInput()" hidden>
                    </div>
                </div>
                <button type="button" class="btn btn-primary btn-sm" onclick="sa()">Simpan</button>
                <button type="submit" id="ve" hidden></button>
                <button type="reset" class="btn btn-danger btn-sm" onclick="resetNoHid()">Reset</button>
                <button type="reset" id="reset-hid" onclick="resetHid()" hidden></button>
            </form>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-id-card me-1"></i>
            <b>Data Team</b>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Kode Team</th>
                        <th>Deskripsi</th>
                        <th>Whats App</th>
                        <th>Instagram</th>
                        <th>Facebook</th>
                        <th>Twitter</th>
                        <th>Gambar</th>
                        <th>Tools</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($team as $i)
                        <tr>
                            <td>{{ $i->nama }}</td>
                            <td>{{ $i->kode_team }}</td>
                            <td>{{ $i->deskripsi }}</td>
                            <td>{{ $i->whatsapp }}</td>
                            <td>{{ $i->instagram }}</td>
                            <td>{{ $i->facebook }}</td>
                            <td>{{ $i->twitter }}</td>
                            <td><img src="/gambar_insert/team/{{ $i->gambar }}" alt="" width="150"
                                    height="150"></td>
                            <td>
                                <center>
                                    <a href="/edit/{{ $i->kode_team }}" class="btn btn-default btn-sm"
                                        style="color: rgb(7, 194, 7);"><i class="fa fa-pencil fa-lg"></i></a>
                                    <a href="/delete/{{ $i->kode_team }}" class="btn btn-default btn-sm" onclick="del()"
                                        style="color: rgb(255, 0, 0);"><i class="fa fa-trash fa-lg"></i></a>
                                </center>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('css')
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
@endsection
@section('js')
    {{-- edit --}}
    <script>
        function closeEdit() {
            document.getElementById('edit-team').style.display = 'none'
        }

        function edit(kode_team) {
            document.getElementById('edit-team').style.display = 'block'
            let uri = '/edit/team/' + kode_team
            uri.open({
                type: "GET",

            })
        }
    </script>
    {{-- tambah --}}
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
                text: "Data yang sudah diisi akan dihapus!",
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
