@extends('admin_sekolah.layout.index')

@section('head_identitas')
    @foreach($data as $i)
        {{ $i->nama_sekolah }}
    @endforeach
@endsection
@section('konten')

    <h3>
        Daftar Siswa
        <b>
            @foreach($data as $i)
                {{ $i->nama_sekolah }}
            @endforeach
        </b>
    </h3>
    <div class="card mt-4">
        <div class="card-header">
            <i class="fa fa-calendar me-2"></i>
            @foreach($data as $i)
                Daftar Siswa <b>{{ $i->nama_sekolah }}</b>
            @endforeach
        </div>
        <div class="card-body">
            <div class="d-flex" style="width: 40%;">
                <select id="kelas" class="form-select me-3" onchange="pilih_kelas(); ambil_kelas()">
                    <option value="">Pilih Kelas</option>
                    @foreach($kelas as $kls => $K)
                        <option value="{{ $kls }}">{{ $kls }}</option>
                    @endforeach
                </select>
                <select id="jurusan" class="form-select me-3" onchange="pilih_jurusan(); ambil_kelas()">
                    <option value="">Pilih Jurusan</option>
                    @foreach($jurusan as $j)
                        <option value="{{ $j->no_jurusan }}">{{ $j->nama_jurusan }}</option>
                    @endforeach
                </select>
                <select id="abjad" class="form-select me-3" onchange="pilih_abjad(); ambil_kelas()">
                    <option value="">Pilih Abjad</option>
                    @foreach($abjad as $abj => $a)
                        <option value="{{ $abj }}">{{ $abj }}</option>
                    @endforeach
                </select>
                <input hidden type="text" name="" id="selected" data-select-kelas="" data-select-jurusan="" data-select-abjad="">
            </div>
        </div>
        <div style="padding: 1.3%;">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID Siswa</th>
                        <th>Nama Siswa</th>
                        <th>NISN</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat / Tanggal Lahir</th>
                        <th>Agama</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Tools</th>
                    </tr>
                </thead>
                <tbody id="table-body">

                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('css')
@endsection
@section('js')
    <script>
        var look = window.location.href
        if(look == look){
            @foreach($datasiswa as $s)
                    var table = document.getElementById('table-body')
                    table.innerHTML += `
                        <tr>
                            <td>{{ $s->no_siswa }}</td>
                            <td>{{ $s->nama_siswa }}</td>
                            <td>{{ $s->nisn }}</td>
                            <td>{{ $s->jenis_kelamin_siswa }}</td>
                            <td>{{ $s->tempat_lahir_siswa }} {{ $s->tanggal_lahir_siswa }}</td>
                            <td>{{ $s->agama_siswa }}</td>
                            <td>{{ $s->tingkat }} {{ $s->abjad }}</td>
                            <td>{{ $s->nama_jurusan }}</td>
                            <td><a href="/lihat/data/siswa/{{ $s->no_siswa }}"><i class="fa fa-eye fa-lg" style="color: rgb(9, 255, 0)"></i></a></td>
                        </tr>
                    `
                @endforeach
        }
        function pilih_kelas(){
            var kelas = document.getElementById('kelas').value
            document.getElementById('selected').setAttribute('data-select-kelas', kelas)
        }
        function pilih_jurusan(){
            var jurusan = document.getElementById('jurusan').value
            document.getElementById('selected').setAttribute('data-select-jurusan', jurusan)
        }
        function pilih_abjad(){
            var abjad = document.getElementById('abjad').value
            document.getElementById('selected').setAttribute('data-select-abjad', abjad)
        }
        function ambil_kelas(){
            var selkelas = document.getElementById('selected')
            var valkelas = selkelas.getAttribute('data-select-kelas')
            var valjurusan = selkelas.getAttribute('data-select-jurusan')
            var valabjad = selkelas.getAttribute('data-select-abjad')
            if (valkelas == "" && valjurusan == "" && valabjad == ""){
                document.getElementById('table-body').innerHTML = ""
                @foreach($datasiswa as $s)
                    var table = document.getElementById('table-body')
                    table.innerHTML += `
                        <tr>
                            <td>{{ $s->no_siswa }}</td>
                            <td>{{ $s->nama_siswa }}</td>
                            <td>{{ $s->nisn }}</td>
                            <td>{{ $s->jenis_kelamin_siswa }}</td>
                            <td>{{ $s->tempat_lahir_siswa }} {{ $s->tanggal_lahir_siswa }}</td>
                            <td>{{ $s->agama_siswa }}</td>
                            <td>{{ $s->tingkat }} {{ $s->abjad }}</td>
                            <td>{{ $s->nama_jurusan }}</td>
                            <td><a href="/lihat/data/siswa/{{ $s->no_siswa }}"><i class="fa fa-eye fa-lg" style="color: rgb(9, 255, 0)"></i></a></td>
                        </tr>
                    `
                @endforeach
            } else if (valkelas == valkelas && valjurusan == "" && valabjad == ""){
                document.getElementById('table-body').innerHTML = ""
                var database = "http://localhost:8000/data_json/daftar_siswa"
                var set = { method : "Get"}
                fetch(database, set)
                    .then(res => res.json())
                    .then((json)=>{
                        var arrsis = json
                        var filterkelas = arrsis.filter(function(i){
                            return i.tingkat == valkelas
                        })
                        var table = document.getElementById('table-body')
                        filterkelas.forEach((obj)=>{
                            var tds = ''
                            tds = `
                            <td>${ obj.no_siswa }</td>
                            <td>${ obj.nama_siswa }</td>
                            <td>${ obj.nisn }</td>
                            <td>${ obj.jenis_kelamin_siswa }</td>
                            <td>${ obj.tempat_lahir_siswa } ${ obj.tanggal_lahir_siswa }</td>
                            <td>${ obj.agama_siswa }</td>
                            <td>${ obj.tingkat } ${ obj.abjad }</td>
                            <td>${ obj.nama_jurusan }</td>
                            <td><a href="/lihat/data/siswa/${ obj.no_siswa }"><i class="fa fa-eye fa-lg" style="color: rgb(9, 255, 0)"></i></a></td>
                            `
                            var tr = `<tr>${tds}</td>`
                            table.innerHTML += tr
                        })
                    })
            } else if (valkelas == "" && valjurusan == valjurusan && valabjad == ""){
                document.getElementById('table-body').innerHTML = ""
                var database = "http://localhost:8000/data_json/daftar_siswa"
                var set = { method : "Get"}
                fetch(database, set)
                    .then(res => res.json())
                    .then((json)=>{
                        var arrsis = json
                        var filterjurusan = arrsis.filter(function(i){
                            return i.jurusan_siswa == valjurusan
                        })
                        var table = document.getElementById('table-body')
                        filterjurusan.forEach((obj)=>{
                            var tds = ''
                            tds = `
                            <td>${ obj.no_siswa }</td>
                            <td>${ obj.nama_siswa }</td>
                            <td>${ obj.nisn }</td>
                            <td>${ obj.jenis_kelamin_siswa }</td>
                            <td>${ obj.tempat_lahir_siswa } ${ obj.tanggal_lahir_siswa }</td>
                            <td>${ obj.agama_siswa }</td>
                            <td>${ obj.tingkat } ${ obj.abjad }</td>
                            <td>${ obj.nama_jurusan }</td>
                            <td><a href="/lihat/data/siswa/${ obj.no_siswa }"><i class="fa fa-eye fa-lg" style="color: rgb(9, 255, 0)"></i></a></td>
                            `
                            var tr = `<tr>${tds}</td>`
                            table.innerHTML += tr
                        })
                    })
            } else if (valkelas == "" && valjurusan == "" && valabjad == valabjad){
                document.getElementById('table-body').innerHTML = ""
                var database = "http://localhost:8000/data_json/daftar_siswa"
                var set = { method : "Get"}
                fetch(database, set)
                    .then(res => res.json())
                    .then((json)=>{
                        var arrsis = json
                        var filterabjad = arrsis.filter(function(i){
                            return i.abjad == valabjad
                        })
                        var table = document.getElementById('table-body')
                        filterabjad.forEach((obj)=>{
                            var tds = ''
                            tds = `
                            <td>${ obj.no_siswa }</td>
                            <td>${ obj.nama_siswa }</td>
                            <td>${ obj.nisn }</td>
                            <td>${ obj.jenis_kelamin_siswa }</td>
                            <td>${ obj.tempat_lahir_siswa } ${ obj.tanggal_lahir_siswa }</td>
                            <td>${ obj.agama_siswa }</td>
                            <td>${ obj.tingkat } ${ obj.abjad }</td>
                            <td>${ obj.nama_jurusan }</td>
                            <td><a href="/lihat/data/siswa/${ obj.no_siswa }"><i class="fa fa-eye fa-lg" style="color: rgb(9, 255, 0)"></i></a></td>
                            `
                            var tr = `<tr>${tds}</td>`
                            table.innerHTML += tr
                        })
                    })
            } else if (valkelas == valkelas && valjurusan == valjurusan && valabjad == ""){
                document.getElementById('table-body').innerHTML = ""
                var database = "http://localhost:8000/data_json/daftar_siswa"
                var set = { method : "Get"}
                fetch(database, set)
                    .then(res => res.json())
                    .then((json)=>{
                        var arrsis = json
                        var filterkls = arrsis.filter(function(i){
                            return i.tingkat == valkelas
                        })
                        var filterjrs = filterkls.filter(function(j){
                            return j.jurusan_siswa == valjurusan
                        })
                        var table = document.getElementById('table-body')
                        filterjrs.forEach((obj)=>{
                            var tds = ''
                            tds = `
                            <td>${ obj.no_siswa }</td>
                            <td>${ obj.nama_siswa }</td>
                            <td>${ obj.nisn }</td>
                            <td>${ obj.jenis_kelamin_siswa }</td>
                            <td>${ obj.tempat_lahir_siswa } ${ obj.tanggal_lahir_siswa }</td>
                            <td>${ obj.agama_siswa }</td>
                            <td>${ obj.tingkat } ${ obj.abjad }</td>
                            <td>${ obj.nama_jurusan }</td>
                            <td><a href="/lihat/data/siswa/${ obj.no_siswa }"><i class="fa fa-eye fa-lg" style="color: rgb(9, 255, 0)"></i></a></td>
                            `
                            var tr = `<tr>${tds}</td>`
                            table.innerHTML += tr
                        })
                    })
            } else if (valkelas == "" && valjurusan == valjurusan && valabjad == valabjad){
                document.getElementById('table-body').innerHTML = ""
                var database = "http://localhost:8000/data_json/daftar_siswa"
                var set = { method : "Get"}
                fetch(database, set)
                    .then(res => res.json())
                    .then((json)=>{
                        var arrsis = json
                        var filterjur = arrsis.filter(function(i){
                            return i.jurusan_siswa == valjurusan
                        })
                        var filterabj = filterjur.filter(function(a){
                            return a.abjad == valabjad
                        })
                        var table = document.getElementById('table-body')
                        filterabj.forEach((obj)=>{
                            var tds = ''
                            tds = `
                            <td>${ obj.no_siswa }</td>
                            <td>${ obj.nama_siswa }</td>
                            <td>${ obj.nisn }</td>
                            <td>${ obj.jenis_kelamin_siswa }</td>
                            <td>${ obj.tempat_lahir_siswa } ${ obj.tanggal_lahir_siswa }</td>
                            <td>${ obj.agama_siswa }</td>
                            <td>${ obj.tingkat } ${ obj.abjad }</td>
                            <td>${ obj.nama_jurusan }</td>
                            <td><a href="/lihat/data/siswa/${ obj.no_siswa }"><i class="fa fa-eye fa-lg" style="color: rgb(9, 255, 0)"></i></a></td>
                            `
                            var tr = `<tr>${tds}</td>`
                            table.innerHTML += tr
                        })
                    })
            } else if (valkelas == valkelas && valjurusan == "" && valabjad == valabjad){
                document.getElementById('table-body').innerHTML = ""
                var database = "http://localhost:8000/data_json/daftar_siswa"
                var set = { method : "Get"}
                fetch(database, set)
                    .then(res => res.json())
                    .then((json)=>{
                        var arrsis = json
                        var filterkl = arrsis.filter(function(i){
                            return i.tingkat == valkelas
                        })
                        var filterabjd = filterkl.filter(function(a){
                            return a.abjad == valabjad
                        })
                        var table = document.getElementById('table-body')
                        filterabjd.forEach((obj)=>{
                            var tds = ''
                            tds = `
                            <td>${ obj.no_siswa }</td>
                            <td>${ obj.nama_siswa }</td>
                            <td>${ obj.nisn }</td>
                            <td>${ obj.jenis_kelamin_siswa }</td>
                            <td>${ obj.tempat_lahir_siswa } ${ obj.tanggal_lahir_siswa }</td>
                            <td>${ obj.agama_siswa }</td>
                            <td>${ obj.tingkat } ${ obj.abjad }</td>
                            <td>${ obj.nama_jurusan }</td>
                            <td><a href="/lihat/data/siswa/${ obj.no_siswa }"><i class="fa fa-eye fa-lg" style="color: rgb(9, 255, 0)"></i></a></td>
                            `
                            var tr = `<tr>${tds}</td>`
                            table.innerHTML += tr
                        })
                    })
            } else {
                document.getElementById('table-body').innerHTML = ""
                var database = "http://localhost:8000/data_json/daftar_siswa"
                var set = { method : "Get"}
                fetch(database, set)
                    .then(res => res.json())
                    .then((json)=>{
                        var arrsis = json
                        var f1 = arrsis.filter(function(i){
                            return i.tingkat == valkelas
                        })
                        var f2 = f1.filter(function(j){
                            return j.jurusan_siswa == valjurusan
                        })
                        var f3 = f2.filter(function(a){
                            return a.abjad == valabjad
                        })
                        var table = document.getElementById('table-body')
                        f3.forEach((obj)=>{
                            var tds = ''
                            tds = `
                            <td>${ obj.no_siswa }</td>
                            <td>${ obj.nama_siswa }</td>
                            <td>${ obj.nisn }</td>
                            <td>${ obj.jenis_kelamin_siswa }</td>
                            <td>${ obj.tempat_lahir_siswa } ${ obj.tanggal_lahir_siswa }</td>
                            <td>${ obj.agama_siswa }</td>
                            <td>${ obj.tingkat } ${ obj.abjad }</td>
                            <td>${ obj.nama_jurusan }</td>
                            <td><a href="/lihat/data/siswa/${ obj.no_siswa }"><i class="fa fa-eye fa-lg" style="color: rgb(9, 255, 0)"></i></a></td>
                            `
                            var tr = `<tr>${tds}</td>`
                            table.innerHTML += tr
                        })
                    })
            }
        }
        var chek = 'Adel Pantjoro'
        var datafilter = jsondatasiswa.filter( el => el.nama_siswa == chek)
        console.log(datafilter);
        var table = document.getElementById('table-body')
        datafilter.forEach((obj)=>{
            var tds = ''
            tds = `
            <td>${obj.nama_siswa}</td>
            <td>${obj.no_siswa}</td>
            <td><a href="/lihat/data/siswa/${obj.no_siswa}"><i class="fa fa-eye fa-lg" style="color: rgb(9, 255, 0)"></i></a></td>
            `
            var tr = `<tr>${tds}</td>`
            table.innerHTML += tr
        })
    </script>
@endsection
