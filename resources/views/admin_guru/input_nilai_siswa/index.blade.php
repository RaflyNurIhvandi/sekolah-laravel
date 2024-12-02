@extends('admin_guru.layout.index')

@section('head_identitas')
    @foreach ($profile as $i)
        {{ $i->nama }}
    @endforeach
@endsection
@section('konten')
    <h3>
        Input Nilai Siswa
        <b>
            @foreach($profile as $i)
                {{ $i->nama_sekolah }}
            @endforeach
        </b>
    </h3>
    <div class="kotak mt-5">
        <form action="/input/nilai/siswa" method="POST">
            @csrf
            <div class="d-flex">
                <div class="kiri">
                    <div class="mb-4">
                        <div class="d-flex">
                            <div class="in-kiri mt-2">
                                <label for="" class="form-label float-end"><b>JURUSAN</b></label>
                            </div>
                            <div class="in-kanan">
                                <select name="jurusan" id="pilih-jurusan" class="form-select" onchange="pilih_jurusan()">
                                    <option selected disabled>Pilih Jurusan</option>
                                    @foreach($jurusan as $j)
                                        <option value="{{ $j->no_jurusan }}">{{ $j->nama_jurusan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="d-flex">
                            <div class="in-kiri mt-2">
                                <label for="" class="form-label float-end"><b>KELAS</b></label>
                            </div>
                            <div class="in-kanan">
                                <div class="d-flex">
                                    <select name="kelas" id="pilih-kelas" class="form-select" style="width: 67%; margin-right: 3%;" onchange="pilih_kelas()">
                                        <option selected disabled>Pilih Kelas</option>
                                    </select>
                                    <select name="abjad" id="pilih-abjad" class="form-select" style="width: 30%;" onchange="pilih_abjad()">
                                        <option selected disabled>Abjad</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="d-flex">
                            <div class="in-kiri mt-2">
                                <label for="" class="form-label float-end"><b>NAMA</b></label>
                            </div>
                            <div class="in-kanan" id="nama-siswa">
                                <select name="nama_siswa" id="pilih-siswa" class="form-select">
                                    <option selected disabled>Pilih Siswa</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="d-flex">
                            <div class="in-kiri mt-2">
                                <label for="" class="form-label float-end"><b>GURU MAPEL</b></label>
                            </div>
                            <div class="in-kanan">
                                <select name="nama_guru" id="gurumapel" class="form-select" onchange="pilih_guru_mapel()">
                                    <option selected disabled>Pilih Guru Mapel</option>
                                    @foreach($guru as $g)
                                        <option value="{{ $g->no_anggota }}">{{ $g->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="d-flex">
                            <div class="in-kiri mt-2">
                                <label for="" class="form-label float-end"><b>MATA PELAJARAN</b></label>
                            </div>
                            <div class="in-kanan">
                                <select name="nama_mapel" id="mapel" class="form-select" onchange="nilai_uas_change()">
                                    <option disabled selected>Pilih Mata Pelajaran</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="d-flex">
                            <div class="in-kiri mt-2">
                                <label for="" class="form-label float-end"><b>NILAI ABSEN</b></label>
                            </div>
                            <div class="in-kanan">
                                <input type="text" name="nilai_absen" id="nilai-absen" class="form-control" placeholder="0 - 100">
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="d-flex">
                            <div class="in-kiri mt-2">
                                <label for="" class="form-label float-end"><b>NILAI TUGAS</b></label>
                            </div>
                            <div class="in-kanan">
                                <input type="text" name="nilai_tugas" id="nilai-tugas" class="form-control" placeholder="0 - 100">
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="d-flex">
                            <div class="in-kiri mt-2">
                                <label for="" class="form-label float-end"><b>NILAI KUIS</b></label>
                            </div>
                            <div class="in-kanan">
                                <input type="text" name="nilai_kuis" id="nilai-kuis" class="form-control" placeholder="0 - 100">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kanan">
                    <div class="mb-4">
                        <div class="d-flex">
                            <div class="in-kiri mt-2">
                                <label for="" class="form-label float-end"><b>TAHUN AJARAN</b></label>
                            </div>
                            <div class="in-kanan">
                                <select name="tahun_ajaran" id="tahun_ajaran" class="form-select">
                                    <option disabled selected>- / -</option>
                                    <option value="2023 / 2024">2023 / 2024</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="d-flex">
                            <div class="in-kiri mt-2">
                                <label for="" class="form-label float-end"><b>SEMESTER</b></label>
                            </div>
                            <div class="in-kanan">
                                <select name="semester" id="semester" class="form-select">
                                    <option selected disabled>0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="d-flex">
                            <div class="in-kiri mt-2">
                                <label for="" class="form-label float-end"><b></b></label>
                            </div>
                            <div class="in-kanan">
                                <p>&nbsp;</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="d-flex">
                            <div class="in-kiri mt-2">
                                <label for="" class="form-label float-end"><b>NILAI UTS</b></label>
                            </div>
                            <div class="in-kanan">
                                <input type="text" name="nilai_uts" id="nilai-uts" class="form-control" placeholder="0 - 100">
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="d-flex">
                            <div class="in-kiri mt-2">
                                <label for="" class="form-label float-end"><b>NILAI UAS</b></label>
                            </div>
                            <div class="in-kanan">
                                <input type="text" name="nilai_uas" id="nilai-uas" class="form-control" placeholder="0 - 100" onchange="nilai_uas_change()">
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="d-flex">
                            <div class="in-kiri mt-2">
                                <label for="" class="form-label float-end"><b>NILAI HURUF</b></label>
                            </div>
                            <div class="in-kanan">
                                <input type="text" name="nilai_huruf" id="nilai-huruf" class="form-control" placeholder="A, B, C, D" readonly="readonly">
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="d-flex">
                            <div class="in-kiri mt-2">
                                <label for="" class="form-label float-end"><b>RATA - RATA</b></label>
                            </div>
                            <div class="in-kanan">
                                <input type="text" name="rata_rata" id="rata-rata" class="form-control" placeholder="0" readonly="readonly">
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="d-flex">
                            <div class="in-kiri mt-2">
                                <label for="" class="form-label float-end"><b>KERTERANGAN</b></label>
                            </div>
                            <div class="in-kanan">
                                <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Lulus / Tidak Lulus" readonly="readonly">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3 float-end">
                <button type="reset" class="btn btn-danger btn-sm" style="width: 80px;">RESET</button>
                <button type="button" class="btn btn-success btn-sm" style="width: 80px;" onclick="simpan_input_nilai()">SIMPAN</button>
                <button type="submit" hidden id="sv-input-nilai"></button>
            </div>
        </form>
    </div>
@endsection
@section('css')
    <style>
        .in-kanan{
            width: 65%;
        }
        .in-kiri{
            width: 30%;
            margin-right: 5%;
        }
        .kiri{
            width: 48%;
            height: auto;
            margin-right: 4%;
        }
        .kanan{
            width: 48%;
            height: auto;
        }
    </style>
@endsection
@section('js')
    <script>
        function simpan_input_nilai(){
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Pastikan data yang disimpan sudah benar!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('sv-input-nilai').click()
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
        function nilai_uas_change(){
            var absen = document.getElementById('nilai-absen').value
            var tugas = document.getElementById('nilai-tugas').value
            var kuis = document.getElementById('nilai-kuis').value
            var uts = document.getElementById('nilai-uts').value
            var uas = document.getElementById('nilai-uas').value
            var numabsen = Number(absen)
            var numtugas = Number(tugas)
            var numkuis = Number(kuis)
            var numuts = Number(uts)
            var numuas = Number(uas)
            // =============================================
            var huruf = document.getElementById('nilai-huruf')
            var rata = document.getElementById('rata-rata')
            var ktr = document.getElementById('keterangan')
            // =============================================
            var nil_rata_rata = Math.round((numabsen + numtugas + numkuis + numuts + numuas)/5)
            var mpl = document.getElementById('mapel').value
            var db = "http://localhost:8000/json/daftar/akreditasi"
            var md = { method : "Get" }
            fetch(db, md)
            .then(res => res.json())
            .then((json)=>{
                var ary = json
                var ftr = ary.filter(function(i){
                    return i.no_mapel == mpl
                })
                ftr.forEach((obj)=>{
                    if(nil_rata_rata >= obj.min_a && nil_rata_rata <= obj.max_a){
                        huruf.value = "A"
                        rata.value = nil_rata_rata
                        ktr.value = "Lulus"
                    } else if(nil_rata_rata >= obj.min_b && nil_rata_rata <= obj.max_b){
                        huruf.value = "B"
                        rata.value = nil_rata_rata
                        ktr.value = "Lulus"
                    } else if(nil_rata_rata >= obj.min_c && nil_rata_rata <= obj.max_c){
                        huruf.value = "C"
                        rata.value = nil_rata_rata
                        ktr.value = "Lulus"
                    } else if(nil_rata_rata >= obj.min_d && nil_rata_rata <= obj.max_d){
                        huruf.value = "D"
                        rata.value = nil_rata_rata
                        ktr.value = "Tidak Lulus"
                    } else {
                        huruf.value = "E"
                        rata.value = nil_rata_rata
                        ktr.value = "Tidak Lulus"
                    }
                })
            })
        }
        function pilih_guru_mapel(){
            var mpl = document.getElementById('gurumapel').value
            if(mpl == mpl){
                document.getElementById('mapel').innerHTML = ""
                var mpll = document.getElementById('mapel')
                var opt = `<option disabled selected>Pilih Mata Pelajaran</option>`
                mpll.innerHTML += opt
                var db = "http://localhost:8000/data_json/mapel/admin_guru"
                var md = { method : "Get" }
                fetch(db, md)
                .then(res => res.json())
                .then((json)=>{
                    var ary = json
                    var ftr = ary.filter(function(i){
                        return i.no_guru_mapel == mpl
                    })
                    ftr.forEach((obj)=>{
                        var opid = document.getElementById('mapel')
                        var inop = `<option value="${obj.no_mapel}">${obj.nama_mapel}</option>`
                        opid.innerHTML += inop
                    })
                })
            }
        }
        function pilih_abjad(){
            var jur = document.getElementById('pilih-jurusan').value
            var kel = document.getElementById('pilih-kelas').value
            var abj = document.getElementById('pilih-abjad').value
            if(abj == abj){
                document.getElementById('pilih-siswa').innerHTML = ""
                var selsis = document.getElementById('pilih-siswa')
                var opsis = `<option selected disabled>Pilih Siswa</option>`
                selsis.innerHTML += opsis
                var dbsis = "http://localhost:8000/data_json/daftar_siswa/admin_guru"
                var setsis = { method : "Get" }
                fetch(dbsis, setsis)
                .then(res => res.json())
                .then((json)=>{
                    var arsis = json
                    var ftjur = arsis.filter(function(j){
                        return j.no_jurusan == jur
                    })
                    var ftkls = ftjur.filter(function(k){
                        return k.tingkat == kel
                    })
                    var ftabj = ftkls.filter(function(a){
                        return a.abjad == abj
                    })
                    ftabj.forEach((obj)=>{
                        var opsis2 = document.getElementById('pilih-siswa')
                        var opsis3 = `<option value="${obj.no_siswa}">${obj.nama_siswa}</option>`
                        opsis2.innerHTML += opsis3
                    })
                })
            }
        }
        function pilih_kelas(){
            var jur = document.getElementById('pilih-jurusan').value
            var kel = document.getElementById('pilih-kelas').value
            if(kel == kel){
                document.getElementById('pilih-abjad').innerHTML = ""
                var selkel = document.getElementById('pilih-abjad')
                var optgl = `<option selected disabled>Abjad</option>`
                selkel.innerHTML += optgl
                var dbs = "http://localhost:8000/data_json/abjad_kelas/admin_guru"
                var st = { method : "Get" }
                fetch(dbs, st)
                .then(res => res.json())
                .then((json)=>{
                    var arab = json
                    var filjur = arab.filter(function(i){
                        return i.no_jurusan == jur
                    })
                    var filkel = filjur.filter(function(k){
                        return k.tingkat == kel
                    })
                    filkel.forEach((obj)=>{
                        var op = document.getElementById('pilih-abjad')
                        var opslc = `<option value="${obj.abjad}">${obj.abjad}</option>`
                        op.innerHTML += opslc
                    })
                })
            }
        }
        function pilih_jurusan(){
            var jur = document.getElementById('pilih-jurusan').value
            if(jur == jur){
                document.getElementById('pilih-kelas').innerHTML = ""
                var selct = document.getElementById('pilih-kelas')
                var optunggal = `<option selected disabled>Pilih Kelas</option>`
                selct.innerHTML += optunggal
                var database = "http://localhost:8000/data_json/daftar_kelas/admin_guru"
                var set = { method : "Get"}
                fetch(database, set)
                .then(res => res.json())
                .then((json)=>{
                    var arrkel = json
                    var filterkelas = arrkel.filter(function(i){
                        return i.no_jurusan == jur
                    })
                    var groupBy = (element, key) => {
                        return element.reduce((value, x) => {
                            (value[x[key]] = value[x[key]] || []).push(x)
                            return value;
                        }, {});
                    }
                    var grbkelas = groupBy(filterkelas, 'tingkat')
                    var arkl = Object.entries(grbkelas)
                    arkl.forEach(obj => {
                        var opt = document.getElementById('pilih-kelas')
                        var tr = `<option value="${obj[0]}">${obj[0]}</option>`
                        opt.innerHTML += tr
                    });
                })
            }
        }
    </script>
@endsection
