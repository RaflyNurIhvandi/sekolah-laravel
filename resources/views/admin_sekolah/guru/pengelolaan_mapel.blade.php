@extends('admin_sekolah.layout.index')

@section('head_identitas')
    @foreach($data as $i)
        {{ $i->nama_sekolah }}
    @endforeach
@endsection
@section('konten')
    <h3>
        Pengelolaan Mapel
        <b>
            @foreach($data as $i)
                {{ $i->nama_sekolah }}
            @endforeach
        </b>
    </h3>
    <button type="button" class="btn btn-secondary btn-sm mt-3" style="width: 180px;" onclick="add_mapel_school()">Tambah Mata Pelajaran</button>
    <div class="add_mapel" id="add-mapel">
        <div class="content_add_mapel">
            <span class="close" onclick="close_add_mapel()">&times;</span>
            <h4 class="mt-2">Tambah Mata Pelajaran</h4>
            <form action="/tambah/mapel/admin_sekolah" class="mt-3" method="POST">
                @csrf
                @foreach($data as $i)
                    <input type="hidden" name="npsn" value="{{ $i->npsn }}">
                @endforeach
                <div class="mb-3">
                    <label for="namamapel" class="form-label">Nama Mapel</label>
                    <input type="text" name="namamapel" id="namamapel" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="namaguru" class="form-label">Nama Guru</label>
                    <select name="namaguru" id="namaguru" class="form-select">
                        <option selected disabled>Pilih Guru</option>
                        @foreach($guru as $g)
                            <option value="{{ $g->no_anggota }}">{{ $g->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="subjekmapel" class="form-label">Subjek Mapel</label>
                    <textarea name="subjekmapel" id="subjekmapel" class="form-control" rows="2"></textarea>
                </div>
                <div class="mb-3">
                    <label for="deskripsimapel" class="form-label">Deskripsi Mapel</label>
                    <textarea name="deskripsimapel" id="deskripsimapel" class="form-control" rows="3"></textarea>
                </div>
                <div class="mb-3 mt-4">
                    <button type="button" class="btn btn-secondary btn-sm" style="width: 100px;" onclick="save_add()">SIMPAN</button>
                    <button type="reset" class="btn btn-secondary btn-sm" style="width: 100px;" id="res-add-mapel">RESET</button>
                    <button type="button" class="btn btn-secondary btn-sm" style="width: 100px;" onclick="ccl_add()">CENCEL</button>
                    <button type="submit" id="simpan-add" hidden></button>
                </div>
            </form>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-header">
            <i class="fa fa-calendar me-2"></i>
            @foreach($data as $i)
                Pengelolaan Mapel <b>{{ $i->nama_sekolah }}</b>
            @endforeach
        </div>
        <div class="card-body">
            <table id="tableMapel" class="table-striped">
                <thead>
                    <tr>
                        <th>No Mapel</th>
                        <th>Nama Mapel</th>
                        <th>No Guru</th>
                        <th>Deskripsi Mapel</th>
                        <th>Tools</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mapel as $m)
                        <tr>
                            <td>{{ $m->no_mapel }}</td>
                            <td>{{ $m->nama_mapel }}</td>
                            <td>{{ $m->no_guru_mapel }}</td>
                            <td>{{ $m->subjek_mapel }}</td>
                            <td>
                                <center>
                                    <button type="button" class="btn btn-sm" onclick="edit_mapel(this)" data-id-edit-mapel="edit_{{ $m->no_mapel }}"><i class="fa fa-pencil fa-lg" style="color: rgb(6, 255, 6);"></i></button>
                                    <button type="button" class="btn btn-sm" onclick="delete_mapel(this)" data-id-delete="delete_{{ $m->no_mapel }}"><i class="fa fa-trash fa-lg" style="color: rgb(255, 0, 0);"></i></button>
                                    <a href="/delete/mapel/{{ $m->no_mapel }}" id="delete_{{ $m->no_mapel }}"></a>
                                </center>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @foreach($mapel as $m)
        <div class="modal_edit_mapel" id="edit_{{ $m->no_mapel }}">
            <div class="content_edit_mapel">
                <span class="close_edit_mapel" onclick="close_edit_mapel(this)" data-close-edit-mapel="edit_{{ $m->no_mapel }}">&times;</span>
                <h4 class="mt-2">Edit Mata Pelajaran</h4>
                <form action="/update/mapel/{{ $m->no_mapel }}" class="mt-3" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="namamapel" class="form-label">Nama Mapel</label>
                        <input type="text" class="form-control" name="namamapel" id="namamapel" value="{{ $m->nama_mapel }}">
                    </div>
                    <div class="mb-3">
                        <label for="namaguru" class="form-label">Nama Guru</label>
                        <select name="namaguru" id="namaguru" class="form-select">
                            @foreach($guru as $g)
                                @if($g->no_anggota == $m->no_guru_mapel)
                                    <option value="{{ $g->no_anggota }}" selected disabled>{{ $g->nama }}</option>
                                @endif
                                <option value="{{ $g->no_anggota }}">{{ $g->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="subjekmapel" class="form-label">Subjek Mapel</label>
                        <textarea class="form-control" name="subjekmapel" id="subjekmapel" rows="2">{{ $m->subjek_mapel }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="desmapel" class="form-label">Deskripsi Mapel</label>
                        <textarea class="form-control" name="desmapel" id="desmapel" rows="3">{{ $m->deskripsi_mapel }}</textarea>
                    </div>
                    <div class="mb-3 mt-4">
                        <button type="button" class="btn btn-secondary btn-sm" style="width: 100px;" onclick="simpan_update_mapel(this)" data-id-update="update_mapel_{{ $m->no_mapel }}">SIMPAN</button>
                        <button type="reset" class="btn btn-secondary btn-sm" style="width: 100px;" id="res_update_mapel_{{ $m->no_mapel }}">RESET</button>
                        <button type="button" class="btn btn-secondary btn-sm" style="width: 100px;" onclick="close_update_mapel(this)" data-id-close="edit_{{ $m->no_mapel }}" data-id-reset="res_update_mapel_{{ $m->no_mapel }}">CLOSE</button>
                        <button type="submit" id="update_mapel_{{ $m->no_mapel }}" hidden></button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection
@section('css')
    <style>
        .content_edit_mapel{
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 40%;
            border-radius: 7px;
        }
        .modal_edit_mapel{
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
        .close_edit_mapel {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close_edit_mapel:hover,
        .close_edit_mapel:focus {
            color: #000;
            text-decoration: none;
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
        .content_add_mapel{
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 40%;
            border-radius: 7px;
        }
        .add_mapel{
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
        function delete_mapel(obj){
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
        function close_update_mapel(obj){
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Data yang diperbarui akan kembali seperti semula!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(obj.getAttribute('data-id-close')).style.display = 'none'
                    document.getElementById(obj.getAttribute('data-id-reset')).click()
                }
            })
        }
        function simpan_update_mapel(obj){
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
                    document.getElementById(obj.getAttribute('data-id-update')).click()
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Data berhasil diupdate',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        }
        function close_edit_mapel(obj){
            document.getElementById(obj.getAttribute('data-close-edit-mapel')).style.display = 'none'
        }
        function edit_mapel(obj){
            document.getElementById(obj.getAttribute('data-id-edit-mapel')).style.display = 'block'
        }
        function ccl_add(){
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Data yang diisi pada form akan hilang",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('add-mapel').style.display = 'none'
                    document.getElementById('res-add-mapel').click()
                }
            })
        }
        function save_add(){
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
                    document.getElementById('simpan-add').click()
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
        function close_add_mapel(){
            document.getElementById('add-mapel').style.display = 'none'
        }
        function add_mapel_school(){
            document.getElementById('add-mapel').style.display = 'block'
        }
    </script>
@endsection
