@extends('admin_sekolah.layout.index')

@section('head_identitas')
    @foreach($data as $i)
        {{ $i->nama_sekolah }}
    @endforeach
@endsection
@section('konten')
    <h3>
        Daftar Guru
        <b>
            @foreach($data as $i)
                {{ $i->nama_sekolah }}
            @endforeach
        </b>
    </h3>
    <div class="mt-4">
        <a href="/daftar/pendaftaran/guru" class="mb-3 btn btn-secondary btn-sm" style="width: 200px;">DAFTAR PERMINTAAN</a>
        <div class="card">
            <div class="card-header">
                @foreach($data as $i)
                    <i class="fa fa-calendar me-2"></i>Daftar Guru {{ $i->nama_sekolah }}
                @endforeach
            </div>
            <div class="card-body">
                <table id="tableDaftarGuru" class="table-striped">
                    <thead>
                        <tr>
                            <th>No Anggota</th>
                            <th>Nama</th>
                            <th>No HP</th>
                            <th>Email</th>
                            <th>Tempat, Tanggal Lahir</th>
                            <th>Genre</th>
                            <th>Keahlian</th>
                            <th>Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($daftar_guru as $g)
                            <tr>
                                <td>{{ $g->no_anggota }}</td>
                                <td>{{ $g->nama }}</td>
                                <td>{{ $g->no_hp }}</td>
                                <td>{{ $g->email }}</td>
                                <td>{{ $g->tempat_lahir }}, {{ $g->tanggal_lahir }}</td>
                                <td>{{ $g->genre }}</td>
                                <td>{{ $g->keahlian }}</td>
                                <td>
                                    <center>
                                        <a href="/lihat/data/guru/{{ $g->no_anggota }}" class="btn btn-success btn-sm" style="width: 70px;">LIHAT</a>
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

@endsection
