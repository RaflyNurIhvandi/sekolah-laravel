@extends('admin_sekolah.layout.index')

@section('head_identitas')
    @foreach ($data as $i)
        {{ $i->nama_sekolah }}
    @endforeach
@endsection
@section('konten')
    <h3>
        Jadwal Pelajaran
        <b>
            @foreach ($data as $i)
                {{ $i->nama_sekolah }}
            @endforeach
        </b>
    </h3>
    @foreach ($kelas as $i)
        <h5 class="mt-3">Kelas : {{ $i->tingkat_kelas }} {{ $i->abjad_kelas }}</h5>
    @endforeach
    <div class="card" style="width: 50%;">
        <div class="card-header">
            <i class="fa fa-calendar me-2"></i>
            @foreach($mapel as $i)
                Jadwal Hari :&nbsp;
                @if($i->hari == 'senin')
                    <b>Senin</b>
                @elseif($i->hari == 'selasa')
                    <b>Selasa</b>
                @elseif($i->hari == 'rabu')
                    <b>Rabu</b>
                @elseif($i->hari == 'kamis')
                    <b>Kamis</b>
                @elseif($i->hari  = 'jumat')
                    <b>Jum'at</b>
                @else
                    <b>Sabtu</b>
                @endif
            @endforeach
        </div>
        <div class="card-body">
            @foreach($mapel as $i)
                <form action="/update/mapel/{{ $i->no_jadwal }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="hari" class="form-label">Hari</label>
                        <select name="hari" id="hari" class="form-select">
                            @if($i->hari == 'senin')
                                <option value="senin" selected>Senin</option>
                                <option value="selasa">Selasa</option>
                                <option value="rabu">Rabu</option>
                                <option value="kamis">Kamis</option>
                                <option value="jumat">Jum'at</option>
                                <option value="sabtu">Sabtu</option>
                            @elseif($i->hari == 'selasa')
                                <option value="senin">Senin</option>
                                <option value="selasa" selected>Selasa</option>
                                <option value="rabu">Rabu</option>
                                <option value="kamis">Kamis</option>
                                <option value="jumat">Jum'at</option>
                                <option value="sabtu">Sabtu</option>
                            @elseif($i->hari == 'rabu')
                                <option value="senin">Senin</option>
                                <option value="selasa">Selasa</option>
                                <option value="rabu" selected>Rabu</option>
                                <option value="kamis">Kamis</option>
                                <option value="jumat">Jum'at</option>
                                <option value="sabtu">Sabtu</option>
                            @elseif($i->hari == 'kamis')
                                <option value="senin">Senin</option>
                                <option value="selasa">Selasa</option>
                                <option value="rabu">Rabu</option>
                                <option value="kamis" selected>Kamis</option>
                                <option value="jumat">Jum'at</option>
                                <option value="sabtu">Sabtu</option>
                            @elseif($i->hari == 'jumat')
                                <option value="senin">Senin</option>
                                <option value="selasa">Selasa</option>
                                <option value="rabu">Rabu</option>
                                <option value="kamis">Kamis</option>
                                <option value="jumat" selected>Jum'at</option>
                                <option value="sabtu">Sabtu</option>
                            @else
                                <option value="senin">Senin</option>
                                <option value="selasa">Selasa</option>
                                <option value="rabu">Rabu</option>
                                <option value="kamis">Kamis</option>
                                <option value="jumat">Jum'at</option>
                                <option value="sabtu" selected>Sabtu</option>
                            @endif
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="no" class="form-label">Urutan ke / No</label>
                        <input type="text" class="form-control" name="no" id="no" value="{{ $i->no_urut_jadwal }}">
                    </div>
                    <div class="mb-3 d-flex">
                        <div style="width: 49%; margin-right: 2%;">
                            <label for="mulaijam" class="form-label">Mulai Jam</label>
                            <input type="text" name="mulaijam" id="mulaijam" class="form-control" value="{{ $i->jam_mulai }}">
                        </div>
                        <div style="width: 49%;">
                            <label for="selesaijam" class="form-label">Selesai Jam</label>
                            <input type="text" name="selesaijam" id="selesaijam" class="form-control" value="{{ $i->jam_selesai }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="namaguru" class="form-label">Nama Guru</label>
                        <input type="text" name="namaguru" id="namaguru" class="form-control" value="{{ $i->nama_guru }}">
                    </div>
                    <div class="mb-3">
                        <label for="mapel" class="form-label">Mata Pelajaran</label>
                        <input type="text" name="mapel" id="mapel" class="form-control" value="{{ $i->mapel }}">
                    </div>
                    <div class="mt-3">
                        <button type="button" class="btn btn-success btn-sm me-2" style="width: 100px;" onclick="simpanmapel()">Simpan</button>
                        <button type="button" class="btn btn-danger btn-sm" style="width: 100px;" onclick="kembalimapel()">Kembali</button>
                        <button type="submit" id="simpan-mapel" hidden></button>
                        <a href="/edit/jadwal/kelas/{{ $i->no_kelas }}" id="back-mapel" hidden></a>
                    </div>
                </form>
            @endforeach
        </div>
    </div>
@endsection
@section('css')
@endsection
@section('js')
    <script>
        function kembalimapel(){
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Data yang sudah diisi akan hilang!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('back-mapel').click()
                }
            })
        }
        function simpanmapel(){
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
                    document.getElementById('simpan-mapel').click()
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
