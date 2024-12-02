@extends('admin_sekolah.layout.index')

@section('head_identitas')
    @foreach($data as $i)
        {{ $i->nama_sekolah }}
    @endforeach
@endsection
@section('konten')
    <h3>
        Profile Sekolah
        <b>
            @foreach($data as $i)
                {{ $i->nama_sekolah }}
            @endforeach
        </b>
    </h3>
    <div class="mt-4">
        @foreach($data as $i)
            <form action="/update/data/sekolah/{{ $i->kode_sekolah }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Sekolah</label>
                    <input type="text" name="namasekolah" id="namasekolah" value="{{ $i->nama_sekolah }}" class="form-control">
                </div>
                <div class="mb-3">
                    <div class="d-flex">
                        <div style="width: 50%; margin-right: 4%;">
                            <label for="tingkat" class="form-label">Tingkat Sekolah</label>
                            <select name="tingkatsekolah" id="tingkatsekolah" class="form-select">
                                @foreach($kelas as $k)
                                    @if($k->grub == $i->grub)
                                        <option value="{{ $i->grub }}" selected>{{ $i->keterangan }}</option>
                                    @endif
                                    <option value="{{ $k->grub }}">{{ $k->keterangan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div style="width: 46%;">
                            <label for="npsn" class="form-label">NPSN</label>
                            <input type="text" name="npsn" id="npsn" class="form-control" value="{{ $i->npsn }}">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="sub" class="form-label">Subjek</label>
                    <textarea name="subjeksekolah" id="subjeksekolah" rows="3" class="form-control">{{ $i->subjek }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="des" class="form-label">Deskripsi Tentang Sekolah</label>
                    <textarea name="des" id="des" rows="5" class="form-control">{{ $i->deskripsi }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat Sekolah</label>
                    <textarea name="alamatsekolah" id="alamatsekolah" class="form-control" rows="3">{{ $i->alamat_sekolah }}</textarea>
                </div>
                <div class="mb-3">
                    <button type="button" class="btn btn-success btn-sm" style="width: 100px;" onclick="sv_update()">SIMPAN</button>
                    <button type="reset" class="btn btn-danger btn-sm" style="width: 100px;">RESET</button>
                    <button type="submit" id="simpan-update" hidden></button>
                </div>
            </form>
        @endforeach
    </div>
    <div class="mt-4">
        @foreach($data as $i)
            <form action="/update/gambar/profile/sekolah/{{ $i->no_gambar_profile }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    @if($i->gambar_profile == "")
                        <button type="button" class="btn btn-secondary btn-sm" style="width: 200px;" onclick="tambah_gbr()">TAMBAH GAMBAR PROFILE</button>
                    @endif
                    <img class="mt-3" src="/gambar/profile_sekolah/{{ $i->gambar_profile }}" alt="" id="prv" width="450" style="border-radius: 7px;" onclick="tambah_gbr()">
                    <input type="file" name="gambar" hidden id="tbh_gambar" onchange="inp_gbr()">
                </div>
                <div class="mb-3">
                    <button type="button" class="btn btn-success btn-sm" style="width: 100px;" onclick="sv_gbr()">SIMPAN</button>
                    <button type="submit" id="sv-gbr" hidden></button>
                </div>
            </form>
        @endforeach
    </div>
@endsection
@section('css')
@endsection
@section('js')
    <script>
        function inp_gbr(){
            document.getElementById('prv').style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById('tbh_gambar').files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("prv").src = oFREvent.target.result;
            };
        }
        function sv_gbr(){
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Pastikan gambar yang diisi sudah benar!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('sv-gbr').click()
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Gambar berhasil disimpan',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        }
        function tambah_gbr(){
            document.getElementById('tbh_gambar').click()
        }
        function sv_update(){
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
                    document.getElementById('simpan-update').click()
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
    </script>
@endsection
