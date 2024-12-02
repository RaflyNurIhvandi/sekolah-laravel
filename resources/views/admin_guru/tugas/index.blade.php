@extends('admin_guru.layout.index')

@section('head_identitas')
    @foreach ($profile as $i)
        {{ $i->nama }}
    @endforeach
@endsection
@section('konten')
    <h3>
        Daftar Tugas
        <b>
            @foreach($profile as $i)
                {{ $i->nama_sekolah }}
            @endforeach
        </b>
    </h3>
@endsection
@section('css')

@endsection
@section('js')

@endsection
