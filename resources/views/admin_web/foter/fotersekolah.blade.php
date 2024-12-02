@extends('admin_web.layout.index')
@section('konten')
    <h2 class="mb-3">Foter Sekolah</h2>
    <div class="card mb-4" style="width: 100%;">
        <div class="card-header">
            <i class="fas fa-id-card me-1"></i>
            <b>Foter</b>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Deskripsi</th>
                        <th>Deskripsi1</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Deskripsi2</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($foter as $i)
                        <tr>
                            <td>{{ $i->deskripsi }}</td>
                            <td>{{ $i->des }}</td>
                            <td>{{ $i->contact }}</td>
                            <td>{{ $i->email }}</td>
                            <td>{{ $i->text }}</td>
                            <td>
                                <center>
                                    <a href="/edit/foter/{{ $i->id }}" class="btn btn-default btn-sm"
                                        style="color: rgb(7, 194, 7);"><i class="fa fa-pencil fa-lg"></i></a>
                                </center>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card mb-4" style="width: 50%;">
        <div class="card-header">
            <i class="fas fa-id-card me-1"></i>
            <b>Foter</b>
        </div>
        <div class="card-body">
            <table id="tbl">
                <thead>
                    <tr>
                        <th>Icon</th>
                        <th>Link</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($edit as $i)
                        <tr>
                            <td>{{ $i->icon }}</td>
                            <td>{{ $i->link }}</td>
                            <td>
                                <center>
                                    <a href="/edit/foter1/{{ $i->id }}" class="btn btn-default btn-sm"
                                        style="color: rgb(7, 194, 7);"><i class="fa fa-pencil fa-lg"></i></a>
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
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#tabeldes').DataTable();
        });
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
