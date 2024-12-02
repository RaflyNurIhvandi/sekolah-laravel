@extends('admin_web.layout.index')
@section('konten')
    <h2 class="mb-3">foter Sekolah</h2>
    @foreach ($edit as $a)
        <form action="/update/foter1/{{ $a->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3" style="width :50%">
                <label for="nama" class="form-label">Icon</label>
                <input type="text" class="form-control" name="icon" id="icon" value="{{ $a->icon }}">
            </div>
            <div class="mb-3" style="width :50%">
                <label for="nama" class="form-label">Link</label>
                <input type="text" class="form-control" name="link" id="link" value="{{ $a->link }}">
            </div>
            <div>
                <button type="button" class="btn btn-primary btn-sm" onclick="sa()">Simpan</button>
                <button type="submit" id="ve" hidden></button>
                <button type="reset" class="btn btn-secondary btn-sm" onclick="resetNoHid()">Reset</button>
                <button type="reset" id="reset-hid" onclick="resetHid()" hidden></button>
                <a href="/foter/sekolah" class=" btn btn-danger btn-sm">Cencel</a>
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
        window.onclick = function(event) {
            if (event.target == document.getElementById('tambah-team')) {
                document.getElementById('tambah-team').style.display = 'none'
            }
        }
    </script>
@endsection
