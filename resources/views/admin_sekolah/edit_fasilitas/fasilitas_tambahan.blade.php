@extends('admin_sekolah.layout.index')

@section('head_identitas')
    @foreach ($edit as $i)
        {{ $i->nama_sekolah }}
    @endforeach
@endsection
@section('konten')
    <h3>
        Edit Fasilitas tambahan
        <b>
            @foreach ($edit as $i)
                {{ $i->nama_sekolah }}
            @endforeach
        </b>
    </h3>
    @foreach ($tambahan as $a)
        <form action="/update/fasilitas/tambahan/{{ $a->no_fasilitas }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3" style="width :50%">
                <label for="nama" class="form-label">Nama Fasilitas</label>
                <input type="text" class="form-control" name="nama_fasilitas" id="nama_fasilitas"
                    value="{{ $a->nama_fasilitas }}">
            </div>
            <div class="mb-3" style="width :50%">
                <label for="nama" class="form-label">Jumlah</label>
                <input type="text" class="form-control" name="jumlah" id="jumlah" value="{{ $a->jumlah }}">
            </div>
            <div class="mb-3" style="width: 50%">
                <label for="nama" class="form--label">Keterangan</label>
                <textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="2">{{ $a->keterangan }}</textarea>
            </div>
            <div>
                <button type="button" class="btn btn-primary btn-sm" onclick="sa()">Simpan</button>
                <button type="submit" id="ve" hidden></button>
                <button type="reset" class="btn btn-secondary btn-sm" onclick="resetNoHid()">Reset</button>
                <button type="reset" id="reset-hid" onclick="resetHid()" hidden></button>
                <a href="/admin/fasilitas" class=" btn btn-danger btn-sm">Cencel</a>
            </div>
        </form>
    @endforeach
@endsection
@section('css')
    <style>
        .text {
            margin-left: 25px;
            width: 25%;
        }

        .sosial {
            width: 50%;
        }

        .bawah {
            display: flex;
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
        window.onclick = function(event) {
            if (event.target == document.getElementById('tambah-fasilitas')) {
                document.getElementById('tambah-fasilitas').style.display = 'none'
            }
        }
    </script>
@endsection
//
