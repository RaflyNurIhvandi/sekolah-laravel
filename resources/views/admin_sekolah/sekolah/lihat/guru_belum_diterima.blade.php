@extends('admin_sekolah.layout.index')

@section('head_identitas')
    @foreach ($data as $i)
        {{ $i->nama_sekolah }}
    @endforeach
@endsection
@section('konten')
    <h3>
        Data Pendaftaran Guru
        <b>
            @foreach($data as $i)
                {{ $i->nama_sekolah }}
            @endforeach
        </b>
    </h3>
    <div class="mt-4">
        <div class="card">
            <div class="card-header">
                @foreach($data as $i)
                    <i class="fa fa-calendar me-2"></i>Daftar Guru yang mendaftar di {{ $i->nama_sekolah }}
                @endforeach
            </div>
            <div class="card-body">
                <table id="daftarGuruBelumDiterima" class="table-striped">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>No HP</th>
                            <th>Email</th>
                            <th>Tempat, Tanggal Lahir</th>
                            <th>Genre</th>
                            <th>Keahlian</th>
                            <th>Gambar</th>
                            <th>Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($guru as $g)
                            <tr>
                                <td>{{ $g->nama }}</td>
                                <td>{{ $g->no_hp }}</td>
                                <td>{{ $g->email }}</td>
                                <td>{{ $g->tempat_lahir }}, {{ $g->tanggal_lahir }}</td>
                                <td>{{ $g->genre }}</td>
                                <td>{{ $g->keahlian }}</td>
                                <td>
                                    <center>
                                        @foreach($foto as $f)
                                            @if($f->no_anggota == $g->no_anggota)
                                                <img src="/gambar/pas_foto_guru/{{ $f->gambar }}" alt="" width="80" style="border: 5px solid white;">
                                            @endif
                                        @endforeach
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <button type="button" class="btn btn-success btn-sm" style="width: 100px;" onclick="terima_guru(this)" data-id-tr="tr_gr_{{ $g->no_anggota }}">TERIMA</button>
                                        <button type="button" class="btn btn-secondary btn-sm" style="width: 100px;" onclick="tolak_guru(this)" data-id-tl="tl_gr_{{ $g->no_anggota }}">TOLAK</button>
                                        <a href="/terima/guru/{{ $g->no_anggota }}" id="tr_gr_{{ $g->no_anggota }}" hidden></a>
                                        <a href="/tolak/guru/{{ $g->no_anggota }}" id="tl_gr_{{ $g->no_anggota }}" hidden></a>
                                    </center>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('css')
@endsection
@section('js')
    <script>
        function tolak_guru(obj){
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Anda ingin menolak guru ini!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(obj.getAttribute('data-id-tl')).click()
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Guru telah ditolak',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        }
        function terima_guru(obj){
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Anda ingin menerima guru ini!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(obj.getAttribute('data-id-tr')).click()
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Guru berhasil diterima',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        }
    </script>
@endsection
