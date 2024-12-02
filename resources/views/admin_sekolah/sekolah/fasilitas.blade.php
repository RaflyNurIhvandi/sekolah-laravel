@extends('admin_sekolah.layout.index')

@section('head_identitas')
    @foreach ($data as $i)
        {{ $i->nama_sekolah }}
    @endforeach
@endsection
@section('konten')
    <h3>
        Fasilitas Sekolah
        <b>
            @foreach ($data as $i)
                {{ $i->nama_sekolah }}
            @endforeach
        </b>
    </h3>
    <button type="button" class="btn btn-secondary mb-3" onclick="tambahFasilitas()">Fasilitas Umum</button>

    {{-- tambah fasilitas umum --}}
    <div class="tambah-fasilitas" id="tambah-fasilitas">
        <div class="form-tambahfasilitas">
            <span class="close" id="close">&times;</span>
            <h3 class="mb-3">Tambah Fasilitas Umum</h3>
            <form action="/save/fasilitas" method="POST" enctype="multipart/form-data">
                @csrf
                @foreach ($data as $i)
                    <input type="hidden" name="npsn" id="npsn" value="{{ $i->npsn }}">
                @endforeach
                <div class="mb-3">
                    <label for="nama_fasilitas" class="form-label">Nama Fasilitas</label>
                    <input type="text" class="form-control" name="nama_fasilitas" id="nama_fasilitas">
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="text" class="form-control" name="jumlah" id="jumlah">
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea type="text" class="form-control" name="keterangan" id="keterangan" cols="30" rows="1"></textarea><br>
                </div>
                <button type="button" class="btn btn-primary btn-sm" onclick="sa()">Simpan</button>
                <button type="submit" id="ve" hidden></button>
                <button type="reset" class="btn btn-danger btn-sm" onclick="resetNoHid()">Reset</button>
                <button type="reset" id="reset-hid" onclick="resetHid()" hidden></button>
            </form>
        </div>
    </div>
    {{-- end tambah fasilitas umum --}}

    {{-- fasilitas umum --}}
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-id-card me-1"></i>
            Fasilitas Umum
            <b>
                @foreach ($data as $i)
                    {{ $i->nama_sekolah }}
                @endforeach
            </b>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Nama_Fasilitas</th>
                        <th>No_Fasilitas</th>
                        <th>Jumlah</th>
                        <th> Keterangan</th>
                        <th>Gambar</th>
                        <th>Tools</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($edit as $a)
                        <tr>
                            <td>{{ $a->nama_fasilitas }}</td>
                            <td>{{ $a->no_fasilitas }}</td>
                            <td>{{ $a->jumlah }}</td>
                            <td>{{ $a->keterangan }}</td>
                            <td><a href="/tambah/gambar/{{ $a->no_fasilitas }}"><img src="/gambar/preview.jpg"
                                        alt="" width="100" height="100"></td></a>
                            <td>
                                <center>
                                    <a href="/edit/fasilitas/{{ $a->no_fasilitas }}" class="btn btn-default btn-sm"
                                        style="color: rgb(7, 194, 7);"><i class="fa fa-pencil fa-lg"></i></a>
                                    <button type="button" class="btn btn-default btn-sm" onclick="delete_data_fasilitas(this)" data-del="del_{{ $a->no_fasilitas }}"><i class="fa fa-trash fa-lg" style="color: rgb(255, 0, 0);"></i></button>
                                    <a href="/delete/fasilitas/{{ $a->no_fasilitas }}" id="del_{{ $a->no_fasilitas }}" hidden></a>
                                </center>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- end fasilitas umum --}}

    <button type="button" class="btn btn-secondary mb-3" onclick="tambahFas()">Fasilitas Tambahan</button>

    {{-- tambah fasilitas tambahan --}}
    <div class="tambah-fas" id="tambah-fas">
        <div class="form-tambahfas">
            <span class="cls" id="cls">&times;</span>
            <h3 class="mb-3">Tambah Fasilitas Tambahan</h3>
            <form action="/save/tambahan" method="POST" enctype="multipart/form-data">
                @csrf
                @foreach ($data as $i)
                    <input type="hidden" name="npsn" id="npsn" value="{{ $i->npsn }}">
                @endforeach
                <div class="mb-3">
                    <label for="nama_fasilitas" class="form-label">Nama Fasilitas</label>
                    <input type="text" class="form-control" name="nama_fasilitas" id="nama_fasilitas">
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="text" class="form-control" name="jumlah" id="jumlah">
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea type="text" class="form-control" name="keterangan" id="keterangan" cols="30" rows="1"></textarea>
                </div>
                <button type="button" class="btn btn-primary btn-sm" onclick="ft()">Simpan</button>
                <button type="submit" id="tm" hidden></button>
                <button type="reset" class="btn btn-danger btn-sm" onclick="resetNoHid()">Reset</button>
                <button type="reset" id="res-hid" onclick="resetHid()" hidden></button>
            </form>
        </div>
    </div>
    {{-- end tambah fasilitas tambahan --}}

    {{-- fasilitas tambahan --}}
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-id-card me-1"></i>
            Fasilitas Tambahan
            <b>
                @foreach ($data as $i)
                    {{ $i->nama_sekolah }}
                @endforeach
            </b>
        </div>
        <div class="card-body">
            <table id="datatab">
                <thead>
                    <tr>
                        <th>Nama_Fasilitas</th>
                        <th>No_Fasilitas</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        <th>Gambar</th>
                        <th>Tools</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tambahan as $i)
                        <tr>
                            <td>{{ $i->nama_fasilitas }}</td>
                            <td>{{ $i->no_fasilitas }}</td>
                            <td>{{ $i->jumlah }}</td>
                            <td>{{ $i->keterangan }}</td>
                            <td><a href="/tambah/tambahan/{{ $i->no_fasilitas }}"><img src="/gambar/preview.jpg" alt="" width="100" height="100"></a></td>
                            <td>
                                <center>
                                    <a href="/edit/tambahan/{{ $i->no_fasilitas }}" class="btn btn-default btn-sm"
                                        style="color: rgb(7, 194, 7);"><i class="fa fa-pencil fa-lg"></i></a>
                                    <button type="button" class="btn btn-default btn-sm" onclick="del_fas_tam(this)" data-del="del_tam_{{ $i->no_fasilitas }}"><i class="fa fa-trash fa-lg" style="color: rgb(255, 0, 0);"></i></button>
                                    <a href="/delete/tambahan/{{ $i->no_fasilitas }}" hidden id="del_tam_{{ $i->no_fasilitas }}"></a>
                                </center>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- end fasilitas tambahan --}}
@endsection
@section('css')
    <style>
        .tambah-fasilitas {
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

        .tambah-fas {
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

        .form-tambahfasilitas {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 40%;
            border-radius: 5px;
            margin-top: 5%
        }

        .form-tambahfas {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
            border-radius: 5px;
            margin-top: 5%
        }

        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .cls {
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
        function del_fas_tam(obj){
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Data yang sudah dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(obj.getAttribute('data-del')).click()
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Your work has been saved',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        }
        function delete_data_fasilitas(obj){
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Data yang sudah dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(obj.getAttribute('data-del')).click()
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Your work has been saved',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        }
        function sa() {
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Pastikan Data Yang Di Isi Benar!",
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

        function ft() {
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
                    document.getElementById('tm').click()
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

        function tambahFasilitas() {
            document.getElementById('tambah-fasilitas').style.display = 'block'
        }

        function tambahFas() {
            document.getElementById('tambah-fas').style.display = 'block'
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
                    document.getElementById('tambah-fasilitas').style.display = 'none'
                    document.getElementById('tambah-fas').style.display = 'none'
                }
            })
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
                    document.getElementById('res-hid').click()
                    document.getElementById('tambah-fas').style.display = 'none'

                }
            })
        }

        function resetHid() {
            document.getElementById('war-foto').style.display = 'block'
            document.getElementById('br2').style.display = 'none'
            document.getElementById('tambah-fasilitas').style.display = 'none'
            document.getElementById('tambah-fas').style.display = 'none'
        }
        window.onclick = function(event) {
            if (event.target == document.getElementById('tambah-fasilitas')) {
                document.getElementById('tambah-fasilitas').style.display = 'none'
            }
        }
        window.onclick = function(event) {
            if (event.target == document.getElementById('tambah-fas')) {
                document.getElementById('tambah-fas').style.display = 'none'
            }
        }
    </script>
@endsection
//
