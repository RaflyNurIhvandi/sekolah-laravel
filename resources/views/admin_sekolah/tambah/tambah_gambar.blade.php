@extends('admin_sekolah.layout.index')
@section('head_identitas')
    @foreach ($edit as $i)
        {{ $i->nama_sekolah }}
    @endforeach
@endsection
@section('konten')
    <h3>
        Tambah Fasilitas Sekolah
        <b>
            @foreach ($edit as $i)
                {{ $i->nama_sekolah }}
            @endforeach
        </b>
    </h3>

    {{-- edit gambar --}}
    @foreach ($editgm as $i)
        <div class="tambah-team" id="tambah-team-{{ $i->no_gambar }}">
            <div class="form-tambahteam">
                <span class="close" onclick="cll_edit(this)" data-id-close="tambah-team-{{ $i->no_gambar }}">&times;</span>
                <h3 class="mb-3">Edit Fasilitas</h3>
                <form action="/update/umum/{{ $i->no_gambar }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="text-center">
                        <div class="profil"><br class="br1" id="br1"><br class="br2" id="br2-{{ $i->no_gambar }}">
                            <center>
                                <span class="war-foto" id="war-foto-{{ $i->no_gambar }}">Masukan Kembali Gambar Untuk Mengganti Foto!</span>
                            </center>
                            <div class="text-center">
                                <center>
                                    <img src="/gambar/fasilitas/umum/{{ $i->gambar }}" class="gambar" id="preview_{{ $i->no_gambar }}" width="260" height="260" onclick="previewImg(this)" data-prev="gambar_{{ $i->no_gambar }}">
                                    <input type="file" name="gambar" id="gambar_{{ $i->no_gambar }}" onchange="gambarInput(this)" data-id-br="br2-{{ $i->no_gambar }}" data-id-wr="war-foto-{{ $i->no_gambar }}" data-id-prev="preview_{{ $i->no_gambar }}" data-id-gbr="gambar_{{ $i->no_gambar }}" hidden>
                                </center>
                            </div>
                        </div><br>
                    </div>
                    <center>
                        <button type="button" class="btn btn-primary btn-sm" onclick="sa(this)" data-id-sv="ve-{{ $i->no_gambar }}">Simpan</button>
                        <button type="submit" id="ve-{{ $i->no_gambar }}" hidden></button>
                        <button type="reset" class="btn btn-secondary btn-sm" onclick="resetNoHid(this)" data-id-prev="preview_{{ $i->no_gambar }}" data-id-br="br2-{{ $i->no_gambar }}" data-id-wr="war-foto-{{ $i->no_gambar }}">Reset</button>
                        <button type="button" class="btn btn-danger btn-sm" onclick="del_gam_fas(this)" data-id-delete="delete_gambar_{{ $i->no_gambar }}">Delete</button>
                        <a href="/delete/gambar/fasilitas/umum/{{ $i->no_gambar }}" hidden id="delete_gambar_{{ $i->no_gambar }}"></a>
                    </center>
                </form>
            </div>
        </div>
    @endforeach
    {{-- end edit gambar --}}

    {{-- gambar list --}}
    <div class="profile-admin">
        <div class="me-5">
            <button type="button" class="btn btn-secondary btn-sm" onclick="tambahUmum()" style="width: 150px;">Tambah Gambar</button>
        </div>
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach ($editgm as $i)
                <div class="col">
                    <div class="profil"><br class="br1" id="br1"><br class="br2" id="br2">
                        <img src="/gambar/fasilitas/umum/{{ $i->gambar }}" class="gambar" id="preview" width="260" height="260" onclick="tambahTeam(this)" data-id-update="tambah-team-{{ $i->no_gambar }}">
                    </div>
                </div>
             @endforeach
        </div>
    </div>
    {{-- end gambar list --}}

    {{-- tambah gambar --}}
    <div class="tambah-umum" id="tambah-umum">
        <div class="form-tambahumum">
            <span class="cls" id="cls">&times;</span>
            <h3 class="mb-3">Tambah Fasilitas</h3>
            <form action="/save/fasilitas/umum" method="POST" enctype="multipart/form-data">
                @csrf
                @foreach($addgm as $a)
                    <input type="hidden" name="no_fasilitas" id="no_fasilitas" value="{{ $a->no_fasilitas }}">
                @endforeach
                <div class="profil"><br class="b1" id="b1"><br class="b2" id="b2">
                    <center>
                        <span class="war" id="war">Masukan foto profile!</span>
                    </center>
                    <center>
                        <img src="/gambar/preview.jpg" class="gmbr" id="previ" width="260" height="260"
                            onclick="previImg()">
                        <input type="file" name="gmbr" id="gmbr" class="form-control" onchange="gamInput()"
                            hidden>
                    </center>
                </div><br>
                <center>
                    <button type="button" class="btn btn-primary btn-sm" onclick="su()">Simpan</button>
                    <button type="submit" id="cl" hidden></button>
                    <button type="reset" class="btn btn-danger btn-sm" onclick="resNoHid()">Reset</button>
                    <button type="reset" id="reset-hid" onclick="resHid()" hidden></button>
                </center>
            </form>
        </div>
    </div>
    {{-- end tambah gambar --}}
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
            width: 30%;
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
    <style>
        .gmbr {
            border-radius: 5px;
            border: 3px solid #888;
        }

        .gmbr:hover {
            cursor: pointer;
        }

        .war {
            color: red;
        }

        .br2 {
            display: none;
        }

        .br1 {
            display: block;
        }

        .edit-umum {
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

        .form-editumum {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
            border-radius: 5px;
        }

        .tambah-umum {
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

        .form-tambahumum {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 30%;
            border-radius: 5px;
        }

        .cls {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .cls:hover,
        .cls:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
@endsection
@section('js')
    <script>
        function del_gam_fas(obj){
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Data yang dihapus tidak bisa dikembalikan lagi!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(obj.getAttribute('data-id-delete')).click()
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Data berhasil dihapus',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        }
        function tambahUmum() {
            document.getElementById('tambah-umum').style.display = 'block'
        }

        function previImg() {
            document.getElementById('gmbr').click()
        }

        function gamInput() {
            document.getElementById('war').style.display = 'none'
            document.getElementById('b2').style.display = 'block'
            document.getElementById("previ").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("gmbr").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("previ").src = oFREvent.target.result;
            };
        };

        window.onclick = function(event) {
            if (event.target == document.getElementById('tambah-umum')) {
                document.getElementById('tambah-umum').style.display = 'none'
            }
        }

        function resNoHid() {
            document.getElementById('war').style.display = 'block'
            document.getElementById('b2').style.display = 'none'
            document.getElementById("previ").src = '/gambar/preview.jpg'
        }

        function resHid() {
            document.getElementById('war').style.display = 'block'
            document.getElementById('b2').style.display = 'none'
            document.getElementById("previ").src = '/gambar/preview.jpg'
            document.getElementById('tambah-umum').style.display = 'none'

        }
        var close = document.getElementById('cls')
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
                    document.getElementById('tambah-umum').style.display = 'none'
                }
            })
        }

        function su() {
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
                    document.getElementById('cl').click()
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
    </script>
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
        function sa(obj) {
            Swal.fire({
                title: 'Anda yakin?',
                text: "Pastikan data yang diisi benar!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(obj.getAttribute('data-id-sv')).click()
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

        function previewImg(obj) {
            document.getElementById(obj.getAttribute('data-prev')).click()
        }

        function gambarInput(obj) {
            document.getElementById(obj.getAttribute('data-id-wr')).style.display = 'none'
            document.getElementById(obj.getAttribute('data-id-br')).style.display = 'block'
            document.getElementById(obj.getAttribute('data-id-prev')).style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById(obj.getAttribute('data-id-gbr')).files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById(obj.getAttribute('data-id-prev')).src = oFREvent.target.result;
            };
        };

        function tambahTeam(obj) {
            document.getElementById(obj.getAttribute('data-id-update')).style.display = 'block'
        }
        function cll_edit(obj){
            document.getElementById(obj.getAttribute('data-id-close')).style.display = 'none'
        }

        function resetNoHid(obj) {
            document.getElementById(obj.getAttribute('data-id-wr')).style.display = 'block'
            document.getElementById(obj.getAttribute('data-id-br')).style.display = 'none'
            document.getElementById(obj.getAttribute('data-id-prev')).src = '/gambar/preview.jpg'
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
