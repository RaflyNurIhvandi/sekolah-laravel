@extends('admin_sekolah.layout.index')

@section('head_identitas')
    @foreach($data as $i)
        {{ $i->nama_sekolah }}
    @endforeach
@endsection
@section('konten')
    <h3>
        Pengelolaan Akreditasi
        <b>
            @foreach($data as $i)
                {{ $i->nama_sekolah }}
            @endforeach
        </b>
    </h3>
    <button type="button" class="btn btn-secondary btn-sm mt-3" style="width: 150px;" onclick="tambah_akreditasi()">Tambah Akreditasi</button>
    <div class="add_akreditasi" id="add-akreditasi">
        <div class="content_akreditasi">
            <span class="close" onclick="close_add()">&times;</span>
            <h4 class="mt-2">Tambah Akreditasi Sekolah</h4>
            <p class="text-center mt-4" style="margin-left: 20%; margin-right: 20%; color: rgb(39, 74, 172);"><b>Secara umum kami menyediakan 4 tingkat untuk setiap jenis Akreditasi yang ditambahkan</b></p>
            <form action="/tambah/akreditasi/nilai_sekolah" class="mt-4" method="POST">
                @csrf
                @foreach($data as $i)
                    <input type="hidden" name="npsn" id="npsn" value="{{ $i->npsn }}">
                @endforeach
                <div class="mb-3">
                    <label for="namaakreditasi" class="form-label">Nama Akreditasi</label>
                    <input type="text" name="namaakreditasi" id="namaakreditasi" class="form-control" placeholder="Akreditasi A" onkeypress="nama_akreditasi()">
                </div>
                <div style="font-size: 18px;" class="mt-4"><i class="fa fa-star fa-sm"></i>&nbsp;Peringkat Tertinggi : A</div>
                <div class="mb-3 mt-2">
                    <div class="d-flex">
                        <div class="kiri">
                            <label for="nilai-terandah-a" class="form-label">Min -</label>
                            <input type="text" name="nilai_terendah_a" id="nilai_terendah_a" class="form-control" placeholder="0" onkeypress="min_a()">
                        </div>
                        <div class="kanan">
                            <label for="nilai-tertinggi-a" class="form-label">Max -</label>
                            <input type="text" name="nilai_tertinggi_a" id="nilai_tertinggi_a" class="form-control" placeholder="0" onkeypress="max_a()">
                        </div>
                    </div>
                </div>
                <div style="font-size: 18px;" class="mt-4"><i class="fa fa-star fa-sm"></i>&nbsp;Peringkat Kedua : B</div>
                <div class="mb-3 mt-2">
                    <div class="d-flex">
                        <div class="kiri">
                            <label for="nilai-terandah-b" class="form-label">Min -</label>
                            <input type="text" name="nilai_terendah_b" id="nilai_terendah_b" class="form-control" placeholder="0" onkeypress="min_b()">
                        </div>
                        <div class="kanan">
                            <label for="nilai-tertinggi-b" class="form-label">Max -</label>
                            <input type="text" name="nilai_tertinggi_b" id="nilai_tertinggi_b" class="form-control" placeholder="0" onkeypress="max_b()">
                        </div>
                    </div>
                </div>
                <div style="font-size: 18px;" class="mt-4"><i class="fa fa-star fa-sm"></i>&nbsp;Peringkat Ketiga : C</div>
                <div class="mb-3 mt-2">
                    <div class="d-flex">
                        <div class="kiri">
                            <label for="nilai-terandah-c" class="form-label">Min -</label>
                            <input type="text" name="nilai_terendah_c" id="nilai_terendah_c" class="form-control" placeholder="0" onkeypress="min_c()">
                        </div>
                        <div class="kanan">
                            <label for="nilai-tertinggi-c" class="form-label">Max -</label>
                            <input type="text" name="nilai_tertinggi_c" id="nilai_tertinggi_c" class="form-control" placeholder="0" onkeypress="max_c()">
                        </div>
                    </div>
                </div>
                <div style="font-size: 18px;" class="mt-4"><i class="fa fa-star fa-sm"></i>&nbsp;Peringkat Terakhir : D</div>
                <div class="mb-3 mt-2">
                    <div class="d-flex">
                        <div class="kiri">
                            <label for="nilai-terandah-d" class="form-label">Min -</label>
                            <input type="text" name="nilai_terendah_d" id="nilai_terendah_d" class="form-control" placeholder="0" onkeypress="min_d()">
                        </div>
                        <div class="kanan">
                            <label for="nilai-tertinggi-d" class="form-label">Max -</label>
                            <input type="text" name="nilai_tertinggi_d" id="nilai_tertinggi_d" class="form-control" placeholder="0">
                        </div>
                    </div>
                </div>
                <div class="mb-2 mt-4">
                    <button type="button" class="btn btn-secondary btn-sm" style="width: 100px;" onclick="simpan_add()">SIMPAN</button>
                    <button type="reset" class="btn btn-secondary btn-sm" style="width: 100px;" id="res-add">RESET</button>
                    <button type="button" class="btn btn-secondary btn-sm" style="width: 100px;" onclick="ccl_add()">CENCEL</button>
                    <div style="display: none;" id="submit-hiden">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-header">
            @foreach($data as $i)
                <i class="fa fa-calendar me-2"></i>Daftar Akreditasi <b>{{ $i->nama_sekolah }}</b>
            @endforeach
        </div>
        <div class="card-body">
            <table id="tableAkreditasi" class="table-striped">
                <thead>
                    <tr>
                        <th>No Akreditasi</th>
                        <th>Nama Akreditasi</th>
                        <th>Peringkat Tertinggi : A</th>
                        <th>Peringkat Ke-Dua : B</th>
                        <th>Peringkat Ke-Tiga : C</th>
                        <th>Peringkat Terakhir : D</th>
                        <th>Tools</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($akreditasi as $a)
                        <tr>
                            <td>{{ $a->no_akreditasi }}</td>
                            <td>{{ $a->nama_akreditasi }}</td>
                            <td>{{ $a->min_a }} - {{ $a->max_a }}</td>
                            <td>{{ $a->min_b }} - {{ $a->max_b }}</td>
                            <td>{{ $a->min_c }} - {{ $a->max_c }}</td>
                            <td>{{ $a->min_d }} - {{ $a->max_d }}</td>
                            <td>
                                <center>
                                    <button class="btn btn-sm" onclick="tambah_mapel(this); add_mapel_akreditasi(this)" data-id-body="body_{{ $a->no_akreditasi }}" data-no-akreditasi="{{ $a->no_akreditasi }}" data-id-add="add_{{ $a->no_akreditasi }}"><i class="fa fa-plus fa-xl"></i></button>
                                    <button class="btn btn-sm" onclick="edit_akreditasi(this)" data-id-form="edit_akreditasi_{{ $a->no_akreditasi }}"><i class="fa fa-pencil fa-lg" style="color: rgb(0, 255, 0);"></i></button>
                                    <button class="btn btn-sm" onclick="hapus_akreditasi(this)" data-id-hapus="hapus_akreditasi_{{ $a->no_akreditasi }}"><i class="fa fa-trash fa-lg" style="color: rgb(255, 0, 0);"></i></button>
                                    <a href="/hapus/akreditasi/sekolah/{{ $a->no_akreditasi }}" id="hapus_akreditasi_{{ $a->no_akreditasi }}" hidden></a>
                                </center>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- tambah akreditasi --}}
    @foreach($akreditasi as $a)
        <div class="add-mapel" id="add_{{ $a->no_akreditasi }}">
            <div class="content-add-mapel">
                <span class="close-add-mapel" onclick="close_add_mapel(this)" data-id-close="add_{{ $a->no_akreditasi }}">&times;</span>
                <h4 class="mt-2">Tambahkan Akreditasi ke Mapel</h4>
                <button type="button" class="btn btn-secondary" onclick="tambah_mapel_akreditasi(this)" data-noakreditas="{{ $a->no_akreditasi }}"><i class="fa fa-plus fa-lg"></i></button>
                <div class="mt-3">
                    <table class="table table-bordered table-striped inc">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Mapel</th>
                                <th style="width: 10%;">Tools</th>
                            </tr>
                        </thead>
                        <tbody id="body_{{ $a->no_akreditasi }}">
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endforeach
    {{-- end tambah akreditasi --}}

    {{-- tambah mapel akreditasi --}}
    <div class="tambah-mapel" id="tambah-mapel-akreditasi">
        <div class="content-tambah-mapel">
            <span class="close-tambah-mapel" onclick="tutup_tambah_mapel()">&times;</span>
            <h4 class="mt-2">Tambahkan Mapel</h4>
            <div class="mt-3">
                <table class="table table-bordered table-striped inc">
                    <thead class="table-dark">
                        <tr>
                            <td>No</td>
                            <td>Nama Mapel</td>
                            <td style="width: 10%;">Tools</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mapel as $m)
                            <tr>
                                <td class="count"></td>
                                <td>{{ $m->nama_mapel }}</td>
                                <td>
                                    <center>
                                        <button class="btn btn-success" onclick="plus_akreditas(this)" data-nomapel="{{ $m->no_mapel }}"><i class="fa fa-plus fa-lg" style="color: white"></i></button>
                                    </center>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- end tambah mapel akreditasi --}}

    <div hidden>
        <form action="/tambah/mapel/akreditas/sekolah" method="POST">
            @csrf
            <input type="text" name="nomapel" id="nomapel">
            <input type="text" name="noakreditasi" id="noakreditasi">
            <button type="submit" id="submit-tambah-akreditas"></button>
        </form>
    </div>

    {{-- edit akreditasi --}}
    @foreach($akreditasi as $a)
        <div class="edit-akreditasi" id="edit_akreditasi_{{ $a->no_akreditasi }}">
            <div class="content-edit-akreditasi">
                <span class="close-edit-akreditasi" onclick="close_edit_akreditasi(this)" data-id-form-edit="edit_akreditasi_{{ $a->no_akreditasi }}">&times;</span>
                <h4 class="mt-2">Edit Akreditasi</h4>
                <form action="/edit/akreditasi/nilai_sekolah/{{ $a->no_akreditasi }}" class="mt-4" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="namaakreditasi" class="form-label">Nama Akreditasi</label>
                        <input type="text" name="namaakreditasi" id="namaakreditasi" class="form-control" value="{{ $a->nama_akreditasi }}">
                    </div>
                    <div style="font-size: 18px;" class="mt-4"><i class="fa fa-star fa-sm"></i>&nbsp;Peringkat Tertinggi : A</div>
                    <div class="mb-3 mt-2">
                        <div class="d-flex">
                            <div class="kiri">
                                <label for="nilai-terandah-a" class="form-label">Min -</label>
                                <input type="text" name="nilai_terendah_a" id="nilai_terendah_a" class="form-control" value="{{ $a->min_a }}">
                            </div>
                            <div class="kanan">
                                <label for="nilai-tertinggi-a" class="form-label">Max -</label>
                                <input type="text" name="nilai_tertinggi_a" id="nilai_tertinggi_a" class="form-control" value="{{ $a->max_a }}">
                            </div>
                        </div>
                    </div>
                    <div style="font-size: 18px;" class="mt-4"><i class="fa fa-star fa-sm"></i>&nbsp;Peringkat Kedua : B</div>
                    <div class="mb-3 mt-2">
                        <div class="d-flex">
                            <div class="kiri">
                                <label for="nilai-terandah-b" class="form-label">Min -</label>
                                <input type="text" name="nilai_terendah_b" id="nilai_terendah_b" class="form-control" value="{{ $a->min_b }}">
                            </div>
                            <div class="kanan">
                                <label for="nilai-tertinggi-b" class="form-label">Max -</label>
                                <input type="text" name="nilai_tertinggi_b" id="nilai_tertinggi_b" class="form-control" value="{{ $a->max_b }}">
                            </div>
                        </div>
                    </div>
                    <div style="font-size: 18px;" class="mt-4"><i class="fa fa-star fa-sm"></i>&nbsp;Peringkat Ketiga : C</div>
                    <div class="mb-3 mt-2">
                        <div class="d-flex">
                            <div class="kiri">
                                <label for="nilai-terandah-c" class="form-label">Min -</label>
                                <input type="text" name="nilai_terendah_c" id="nilai_terendah_c" class="form-control" value="{{ $a->min_c }}">
                            </div>
                            <div class="kanan">
                                <label for="nilai-tertinggi-c" class="form-label">Max -</label>
                                <input type="text" name="nilai_tertinggi_c" id="nilai_tertinggi_c" class="form-control" value="{{ $a->max_c }}">
                            </div>
                        </div>
                    </div>
                    <div style="font-size: 18px;" class="mt-4"><i class="fa fa-star fa-sm"></i>&nbsp;Peringkat Terakhir : D</div>
                    <div class="mb-3 mt-2">
                        <div class="d-flex">
                            <div class="kiri">
                                <label for="nilai-terandah-d" class="form-label">Min -</label>
                                <input type="text" name="nilai_terendah_d" id="nilai_terendah_d" class="form-control" value="{{ $a->min_d }}">
                            </div>
                            <div class="kanan">
                                <label for="nilai-tertinggi-d" class="form-label">Max -</label>
                                <input type="text" name="nilai_tertinggi_d" id="nilai_tertinggi_d" class="form-control" value="{{ $a->max_d }}">
                            </div>
                        </div>
                    </div>
                    <div class="mb-2 mt-4">
                        <button type="button" class="btn btn-secondary btn-sm" style="width: 100px;" onclick="simpan_edit_akreditasi(this)" data-id-save="simpan_edit_akreditasi_{{ $a->no_akreditasi }}">SIMPAN</button>
                        <button type="reset" class="btn btn-secondary btn-sm" style="width: 100px;" id="res_edit_akreditasi_{{ $a->no_akreditasi }}">RESET</button>
                        <button type="button" class="btn btn-secondary btn-sm" style="width: 100px;" onclick="cll_edit_akreditasi(this)" data-id-ccl-edit-akreditasi="edit_akreditasi_{{ $a->no_akreditasi }}" data-id-res="res_edit_akreditasi_{{ $a->no_akreditasi }}">CENCEL</button>
                        <button type="submit" hidden id="simpan_edit_akreditasi_{{ $a->no_akreditasi }}"></button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
    {{-- end edit akreditasi --}}
@endsection
@section('css')
    <style>
        .close-edit-akreditasi {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close-edit-akreditasi:hover,
        .close-edit-akreditasi:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
        .content-edit-akreditasi{
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 40%;
            border-radius: 7px;
        }
        .edit-akreditasi{
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
        }
        .close-tambah-mapel {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close-tambah-mapel:hover,
        .close-tambah-mapel:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
        .content-tambah-mapel{
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 23%;
            border-radius: 7px;
        }
        .tambah-mapel{
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
        }
        .count:before {
            counter-increment: section;
            content: counter(section);
        }
        .inc{
            counter-reset: section;
        }
        .close-add-mapel {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close-add-mapel:hover,
        .close-add-mapel:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
        .content-add-mapel{
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 40%;
            border-radius: 7px;
        }
        .add-mapel{
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
        }
        .kanan{
            width: 48%;
        }
        .kiri{
            width: 48%;
            margin-right: 4%;
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
        .content_akreditasi{
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 40%;
            border-radius: 7px;
        }
        .add_akreditasi{
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
        }
    </style>
@endsection
@section('js')
    <script>
        function hapus_akreditasi(obj){
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(obj.getAttribute('data-id-hapus')).click()
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
        function cll_edit_akreditasi(obj){
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Data yang diedit akan dikembalikan seperti semula!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(obj.getAttribute('data-id-ccl-edit-akreditasi')).style.display = 'none'
                    document.getElementById(obj.getAttribute('data-id-res')).click()
                }
            })
        }
        function simpan_edit_akreditasi(obj){
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Pastikan data yang diisi sudah benar!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(obj.getAttribute('data-id-save')).click()
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
        function close_edit_akreditasi(obj){
            document.getElementById(obj.getAttribute('data-id-form-edit')).style.display = 'none'
        }
        function edit_akreditasi(obj){
            document.getElementById(obj.getAttribute('data-id-form')).style.display = 'block'
        }
        function plus_akreditas(obj){
            document.getElementById('nomapel').value = obj.getAttribute('data-nomapel')
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Anda mau memasukan akreditasi ini ke mapel!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('submit-tambah-akreditas').click()
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
        function tutup_tambah_mapel(){
            document.getElementById('tambah-mapel-akreditasi').style.display = 'none'
        }
        function tambah_mapel_akreditasi(obj){
            document.getElementById('tambah-mapel-akreditasi').style.display = 'block'
            document.getElementById('noakreditasi').value = obj.getAttribute('data-noakreditas')
        }
        function hapus_mapel_akreditas(obj){
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(obj.getAttribute('data-id-hapus')).click()
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
        function add_mapel_akreditasi(obj){
            var noakr = obj.getAttribute('data-no-akreditasi')
            var idbody = document.getElementById(obj.getAttribute('data-id-body'))
            idbody.innerHTML = ""
            var db = "http://localhost:8000/json/data/akreditasi/sekolah"
            var md = { method : "Get" }
            fetch(db, md)
            .then(res => res.json())
            .then((json)=>{
                var ary = json
                var ftr = ary.filter(function(i){
                    return i.no_akreditasi == noakr
                })
                ftr.forEach((itm)=>{
                    var opid = document.getElementById(obj.getAttribute('data-id-body'))
                    var inop = `
                            <tr>
                                <td class="count"></td>
                                <td>${itm.nama_mapel}</td>
                                <td>
                                    <center>
                                        <button class="btn btn-danger" onclick="hapus_mapel_akreditas(this)" data-id-hapus="hapus_akreditas_${itm.no_mapel}"><i class="fa fa-trash" style="color: white;"></i></button>
                                        <a href="/hapus/mapel/akreditas/${itm.no_mapel}" id="hapus_akreditas_${itm.no_mapel}" hidden></a>
                                    </center>
                                </td>
                            </tr>
                        `
                    opid.innerHTML += inop
                })
            })
        }
        function close_add_mapel(obj){
            document.getElementById(obj.getAttribute('data-id-close')).style.display = 'none'
        }
        function tambah_mapel(obj){
            document.getElementById(obj.getAttribute('data-id-add')).style.display = 'block'
        }
        function simpan_add(){
            var namaakreditasi = document.getElementById('namaakreditasi').value
            var min_a = document.getElementById('nilai_terendah_a').value
            var max_a = document.getElementById('nilai_tertinggi_a').value
            var min_b = document.getElementById('nilai_terendah_b').value
            var max_b = document.getElementById('nilai_tertinggi_b').value
            var min_c = document.getElementById('nilai_terendah_c').value
            var max_c = document.getElementById('nilai_tertinggi_c').value
            var min_d = document.getElementById('nilai_terendah_d').value
            var max_d = document.getElementById('nilai_tertinggi_d').value
            if(namaakreditasi == ""){
                document.getElementById('namaakreditasi').focus()
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Nama akreditasi tidak boleh kosong!',
                    showConfirmButton: false,
                    timer: 1000
                })
            } else if (min_a == ""){
                document.getElementById('nilai_terendah_a').focus()
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Min - peringkat tertinggi tidak boleh kosong!',
                    showConfirmButton: false,
                    timer: 1000
                })
            } else if (max_a == ""){
                document.getElementById('nilai_tertinggi_a').focus()
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Max - peringkat tertinggi tidak boleh kosong!',
                    showConfirmButton: false,
                    timer: 1000
                })
            } else if (min_b == ""){
                document.getElementById('nilai_terendah_b').focus()
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Min - peringkat ke-dua tidak boleh kosong!',
                    showConfirmButton: false,
                    timer: 1000
                })
            } else if (max_b == ""){
                document.getElementById('nilai_tertinggi_b').focus()
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Max - peringkat ke-dua tidak boleh kosong!',
                    showConfirmButton: false,
                    timer: 1000
                })
            } else if (min_c == ""){
                document.getElementById('nilai_terendah_c').focus()
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Min - peringkat ke-tiga tidak boleh kosong!',
                    showConfirmButton: false,
                    timer: 1000
                })
            } else if (max_c == ""){
                document.getElementById('nilai_tertinggi_c').focus()
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Max - peringkat ke-tiga tidak boleh kosong!',
                    showConfirmButton: false,
                    timer: 1000
                })
            } else if (min_d == ""){
                document.getElementById('nilai_terendah_d').focus()
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Min - peringkat terakhir tidak boleh kosong!',
                    showConfirmButton: false,
                    timer: 1000
                })
            } else if (max_d == ""){
                document.getElementById('nilai_tertinggi_d').focus()
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Max - peringkat terakhir tidak boleh kosong!',
                    showConfirmButton: false,
                    timer: 1000
                })
            } else {
                document.getElementById('submit-hiden').innerHTML = `<button type="submit" id="sv-add" hidden></button>`
                Swal.fire({
                    title: 'Anda Yakin?',
                    text: "Pastikan data yang diisi sudah benar!",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('sv-add').click()
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
        }
        function ccl_add(){
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Data yang diisi akan hilang!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('add-akreditasi').style.display = 'none'
                    document.getElementById('res-add').click()
                }
            })
        }
        function tambah_akreditasi(){
            document.getElementById('add-akreditasi').style.display = 'block'
            document.getElementById('namaakreditasi').focus()
        }
        function close_add(){
            document.getElementById('add-akreditasi').style.display = 'none'
        }
        function min_d(){
            document.getElementById('nilai_tertinggi_d').focus()
        }
        function max_c(){
            document.getElementById('nilai_terendah_d').focus()
        }
        function min_c(){
            document.getElementById('nilai_tertinggi_c').focus()
        }
        function max_b(){
            document.getElementById('nilai_terendah_c').focus()
        }
        function min_b(){
            document.getElementById('nilai_tertinggi_b').focus()
        }
        function max_a(){
            document.getElementById('nilai_terendah_b').focus()
        }
        function min_a(){
            document.getElementById('nilai_tertinggi_a').focus()
        }
        function nama_akreditasi(){
            document.getElementById('nilai_terendah_a').focus()
        }
    </script>
@endsection
