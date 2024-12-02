@extends('admin_sekolah.layout.index')

@section('head_identitas')
    @foreach($data as $i)
        {{ $i->nama_sekolah }}
    @endforeach
@endsection
@section('konten')
    <h3>
        Penerimaan Siswa
        <b>
            @foreach($data as $i)
                {{ $i->nama_sekolah }}
            @endforeach
        </b>
    </h3>
    <button type="button" class="btn btn-secondary btn-sm mt-3" style="width: 170px;" onclick="terima_semua_siswa()">Terima Semua Siswa</button>
    @foreach($pensis as $i)
        <a href="/terima/semua/siswa/{{ $i->npsn }}" id="trim" hidden></a>
    @endforeach
    <div class="card mt-4">
        <div class="card-header">
            <i class="fa fa-calendar me-2"></i>
            @foreach($data as $i)
                Data Siswa yang Mendaftar di <b>{{ $i->nama_sekolah }}</b>
            @endforeach
        </div>
        <div class="card-body">
            <table id="penerimaanSiswa" class="table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>No Pendaftaran</th>
                        <th>NISN</th>
                        <th>Jenis Kelamin</th>
                        <th>No HP</th>
                        <th>Email</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Pas Foto</th>
                        <th>Tools</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pensis as $i)
                        <tr>
                            <td>{{ $i->nama_siswa }}</td>
                            <td>{{ $i->no_siswa }}</td>
                            <td>{{ $i->nisn }}</td>
                            <td>{{ $i->jenis_kelamin_siswa }}</td>
                            <td>{{ $i->no_hp_siswa }}</td>
                            <td>{{ $i->email_siswa }}</td>
                            <td>{{ $i->tempat_lahir_siswa }}, {{ $i->tanggal_lahir_siswa }}</td>
                            <td>
                                <img src="/pendaftaran_siswa/pas_foto_siswa/{{ $i->gambar_siswa }}" width="127.5" height="165">
                            </td>
                            <td>
                                <div class="text-center mt-3">
                                    <a href="/lihat/siswa/{{ $i->no_siswa }}"><i class="fa fa-eye fa-xl" style="cursor: pointer; color: rgb(78, 78, 78);"></i></a>
                                </div>
                                <div class="text-center mt-3">
                                    <button class="btn" onclick="terima_siswa(this)" value="terima_{{ $i->no_siswa }}"><i class="fa fa-check fa-2xl" style="cursor: pointer; color: rgb(0, 202, 0)"></i></button>
                                    <a href="/terima/siswa/{{ $i->no_siswa }}/{{ $i->jurusan_siswa }}" id="terima_{{ $i->no_siswa }}"></a>
                                </div>
                                <div class="text-center mt-3">
                                    <button class="btn" onclick="tolak_siswa(this)" value="tolak_{{ $i->no_siswa }}"><i class="fa fa-times fa-2xl" style="cursor: pointer; color: rgb(255, 0, 0)"></i></button>
                                    <a href="/tolak/siswa/{{ $i->no_siswa }}" id="tolak_{{ $i->no_siswa }}"></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('css')

@endsection
@section('js')
    <script>
        function tolak_siswa(obj){
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Anda ingin menolak siswa ini!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(obj.getAttribute('value')).click()
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Siswa telah diterima',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        }
        function terima_siswa(obj){
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Anda ingin menerima siswa ini!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(obj.getAttribute('value')).click()
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Siswa telah diterima',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        }
        function terima_semua_siswa(){
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Terima semua siswa yang mendaftar!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('trim').click()
                    Swal.fire({
                        icon: 'success',
                        title: 'Semua siswa telah diterima',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        }
    </script>
@endsection
