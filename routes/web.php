<?php

use App\Http\Controllers\AdminGuruController;
use App\Http\Controllers\AdminSekolahController;
use App\Http\Controllers\AdminWebController;
use App\Http\Controllers\AkreditasiController;
use App\Http\Controllers\FoterController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\DaftarkanSekolahController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\DaftarGuruController;
use App\Http\Controllers\DaftarJadwalController;
use App\Http\Controllers\DaftarSiswaController;
use App\Http\Controllers\FormDaftarSiswaController;
use App\Http\Controllers\GoSchoolController;
use App\Http\Controllers\InputNilaiSiswaController;
use App\Http\Controllers\JadwalPelajaranController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\PenerimaanSiswaController;
use App\Http\Controllers\ProfileSekolahController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\StatusSiswaController;
use App\Http\Controllers\TugasController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// index
Route::get('/', [IndexController::class, 'index']);

// auth
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// admin web
Route::get('/adminweb', [AdminWebController::class, 'adminweb']);
Route::get('/daftar/team', [AdminWebController::class, 'daftarteam']);
Route::get('/icon/sekolah', [AdminWebController::class, 'iconsekolah']);
Route::get('/foter/sekolah', [AdminWebController::class, 'fotersekolah']);

// admin sekolah
Route::get('/admin/profile/sekolah', [AdminSekolahController::class, 'profilesekolah']);
Route::get('/admin/fasilitas', [AdminSekolahController::class, 'fasilitassekolah']);
Route::get('/admin/daftar/guru', [AdminSekolahController::class, 'daftarguru']);
Route::get('/admin/jadwal/pelajaran', [AdminSekolahController::class, 'jadwalpelajaran']);
Route::get('/admin/sekolah/daftar_siswa', [AdminSekolahController::class, 'daftarsiswa']);
Route::get('/admin/sekolah/penerimaan_siswa', [AdminSekolahController::class, 'penerimaansiswa']);
Route::get('/admin/sekolah/jurusan', [AdminSekolahController::class, 'jurusan']);
Route::get('/admin/sekolah/kelas', [AdminSekolahController::class, 'kelas']);
Route::get('/admin/sekolah/pengelolaan_guru', [AdminSekolahController::class, 'mapel']);
Route::get('/admin/sekolah/akreditas_sekolah', [AdminSekolahController::class, 'akreditasi']);

// daftar guru
Route::get('/lihat/data/guru/{no_anggota}', [DaftarGuruController::class, 'lihatguru']);
Route::get('/daftar/pendaftaran/guru', [DaftarGuruController::class, 'pendaftaranguru']);
Route::get('/terima/guru/{no_anggota}', [DaftarGuruController::class, 'terimaguru']);
Route::get('/tolak/guru/{no_anggota}', [DaftarGuruController::class, 'tolakguru']);

// admin sekolah
Route::put('/update/data/sekolah/{kode_sekolah}', [ProfileSekolahController::class, 'updatedata']);
Route::put('/update/gambar/profile/sekolah/{no_gambar_profile}', [ProfileSekolahController::class, 'updategambar']);

// team
Route::post('/save/team', [TeamController::class, 'saveteam']);
Route::get('/edit/{kode_team}', [TeamController::class, 'editteam']);
Route::put('/update/team/{kode_team}', [TeamController::class, 'updateteam']);
Route::get('/delete/{kode_team}', [TeamController::class, 'delete']);

//icon
Route::post('/save/icon', [TeamController::class, 'saveicon']);
Route::get('/edit/icon/{id}', [TeamController::class, 'editicon']);
Route::put('/update/icon/{id}', [TeamController::class, 'updateicon']);
Route::get('/delete/icon/{id}', [TeamController::class, 'deleteicon']);

// fotter
Route::get('/edit/foter/{id}', [FoterController::class, 'editfoter']);
Route::put('/update/foter/{id}', [FoterController::class, 'updatefoter']);

// fotter icon
Route::get('/edit/foter1/{id}', [FoterController::class, 'editfoter1']);
Route::put('/update/foter1/{id}', [FoterController::class, 'updatefoter1']);
Route::get('/edit/team/{kode_team}', [TeamController::class, 'editteam']);

//contact
Route::get('/contact', [ContactController::class, 'index']);
Route::post('/store/contact', [ContactController::class, 'store']);

// profile
Route::post('/tambah/profile', [HomeController::class, 'tambahprofile']);
Route::put('/edit/profile/{no_anggota}', [HomeController::class, 'editprofile']);

// daftar kan sekolah
Route::get('/daftar/sekolah', [DaftarkanSekolahController::class, 'formdaftar']);
Route::get('/daftar/admin/sekolah', [DaftarkanSekolahController::class, 'daftaradmin']);

// admin sekolah
Route::get('/admin/sekolah', [AdminSekolahController::class, 'index']);
Route::get('/admin/sekolah/profile', [AdminSekolahController::class, 'profile']);
Route::put('/update/foto/profile/{no_anggota}', [AdminSekolahController::class, 'updatepp']);
Route::put('/update/bio/{no_anggota}', [AdminSekolahController::class, 'updatebio']);

//fasilitas umum
Route::post('/save/fasilitas', [FasilitasController::class, 'fasilitas']);
Route::get('/edit/fasilitas/{no_fasilitas}', [FasilitasController::class, 'editumum']);
Route::put('/update/fasilitas/umum/{no_fasilitas}', [FasilitasController::class, 'updfsumum']);
Route::get('/delete/fasilitas/{no_fasilitas}', [FasilitasController::class, 'delete']);

//gambar fasilitas umum
Route::get('/tambah/gambar/{no_fasilitas}', [FasilitasController::class, 'tamgambar']);
Route::put('/update/umum/{no_gambar}', [FasilitasController::class, 'umum']);
Route::post('/save/fasilitas/umum', [FasilitasController::class, 'svgmumu']);
Route::get('/delete/gambar/fasilitas/umum/{no_gambar}', [FasilitasController::class, 'delgm']);
Route::get('/delete/gambar/fasilitas/tambahan/{no_gambar}', [FasilitasController::class, 'delgmfas']);

//fasilitas tambahan
Route::post('/save/tambahan', [FasilitasController::class, 'fastambahan']);
Route::get('/edit/tambahan/{no_fasilitas}', [FasilitasController::class, 'edittambah']);
Route::put('/update/fasilitas/tambahan/{no_fasilitas}', [FasilitasController::class, 'updftambahan']);
Route::get('/delete/tambahan/{no_fasilitas}', [FasilitasController::class, 'deletetambah']);

//gambar fasilitas tambahan
Route::get('/tambah/tambahan/{no_fasilitas}',[FasilitasController::class, 'tamtambahan']);
Route::put('/update/tambahan/{no_gambar}', [FasilitasController::class, 'tambahan']);
Route::post('/save/fasilitas/tambahan', [FasilitasController::class, 'svtambah']);
//
// jadwal pelajaran
Route::post('/tambah/kelas/jadwal', [JadwalPelajaranController::class, 'tambahkelas']);
Route::get('/edit/jadwal/kelas/{no_kelas}', [JadwalPelajaranController::class, 'editkelas']);
Route::put('/update/kelas/{no_kelas}', [JadwalPelajaranController::class, 'updatekelas']);
Route::post('/tambah/jadwal', [JadwalPelajaranController::class, 'tambahjadwal']);
Route::get('/edit/mapel/{no_jadwal}', [JadwalPelajaranController::class, 'editmapel']);
Route::put('/update/mapel/{no_jadwal}', [JadwalPelajaranController::class, 'updatemapel']);
Route::get('/hapus/mapel/{no_jadwal}', [JadwalPelajaranController::class, 'hapusmapel']);
Route::get('/hapus/jadwal/{no_kelas}', [JadwalPelajaranController::class, 'hapuskelas']);
Route::get('/json/data/mapel', [JadwalPelajaranController::class, 'mapelkelas']);
Route::get('/json/data/abjad', [JadwalPelajaranController::class, 'dataabjad']);
Route::get('/json/data/kelas', [JadwalPelajaranController::class, 'datakelas']);

// admin guru
Route::get('/daftar/guru_admin', [AdminGuruController::class, 'daftarguruadmin']);
Route::post('/daftarkan/guru', [AdminGuruController::class, 'daftarkanguru']);
Route::get('/admin/guru', [AdminGuruController::class, 'masukadminguru']);
Route::get('/use/cv/{no_anggota}', [AdminGuruController::class, 'bukacv']);
Route::put('/out/pendaftaran/{no_status}', [AdminGuruController::class, 'out']);
Route::get('/del/profile/{no_anggota}', [AdminGuruController::class, 'delprofile']);
Route::post('/alasan/resign/{no_status}', [AdminGuruController::class, 'kirimresign']);

// daftar guru
Route::get('/admin/guru/daftar_guru', [DaftarGuruController::class, 'daftarguru']);

// daftar jadwal
Route::get('/admin/guru/daftar_jadwal', [DaftarJadwalController::class, 'daftarjadwal']);

// daftar siswa
Route::get('/admin/guru/daftar_siswa', [DaftarSiswaController::class, 'daftarsiswa']);

// input nilai siswa
Route::get('/admin/guru/input_nilai_siswa', [InputNilaiSiswaController::class, 'index']);
Route::get('/data_json/daftar_siswa/admin_guru', [InputNilaiSiswaController::class, 'daftarsiswa']);
Route::get('/data_json/daftar_kelas/admin_guru', [InputNilaiSiswaController::class, 'daftarkelas']);
Route::get('/data_json/abjad_kelas/admin_guru', [InputNilaiSiswaController::class, 'abjadkelas']);
Route::get('/data_json/mapel/admin_guru', [InputNilaiSiswaController::class, 'mapel']);
Route::get('/json/daftar/akreditasi', [InputNilaiSiswaController::class, 'daftarakr']);
Route::post('/input/nilai/siswa', [InputNilaiSiswaController::class, 'inputnilai']);

// tugas
Route::get('/admin/guru/tugas', [TugasController::class, 'tugas']);

// daftar siswa
Route::get('/daftar/siswa', [FormDaftarSiswaController::class, 'indexform']);
Route::post('/form/siswa/daftar', [FormDaftarSiswaController::class, 'formdaftar']);
Route::get('/masuk/sekolah', [FormDaftarSiswaController::class, 'masuksekolah']);
Route::get('/lihat/sekolah/{kode_sekolah}', [FormDaftarSiswaController::class, 'lihatsekolah']);
Route::get('/daftar/sekolah/{kode_sekolah}', [FormDaftarSiswaController::class, 'daftarsekolah']);
Route::post('/daftar/sekolah/siswa', [FormDaftarSiswaController::class, 'daftarsekolahsiswa']);

// penerimaan siswa
Route::get('/terima/semua/siswa/{npsn}', [PenerimaanSiswaController::class, 'terimasemuasiswa']);
Route::get('/lihat/siswa/{no_siswa}', [PenerimaanSiswaController::class, 'lihatsiswa']);
Route::get('/terima/siswa/{no_siswa}/{jurusan_siswa}', [PenerimaanSiswaController::class, 'terimasiswa']);
Route::get('/tolak/siswa/{no_siswa}', [PenerimaanSiswaController::class, 'tolaksiswa']);

// daftar kelas
Route::post('/tambah/daftar_kelas/sekolah', [KelasController::class, 'addkelas']);
Route::get('/delete/kelas/{no_kelas}', [KelasController::class, 'delkelas']);
Route::put('/update/edit/kelas/{no_kelas}', [KelasController::class, 'updatekelas']);

// jurusan
Route::post('/tambah/jurusan_sekolah', [JurusanController::class, 'tambahjurusan']);
Route::put('/update/jurusan/{no_jurusan}', [JurusanController::class, 'updatejurusan']);
Route::put('/tambah/kelas/jurusan', [JurusanController::class, 'tambahkelas']);
Route::get('/hapus/jurusan/sekolah/{no_jurusan}', [JurusanController::class, 'hapusjurusan']);

// siswa
Route::get('/lihat/data/siswa/{no_siswa}', [SiswaController::class, 'lihatsiswa']);
Route::get('/keluarkan/siswa/{no_siswa}', [SiswaController::class, 'keluarkansiswa']);
Route::get('/data_json/daftar_siswa', [SiswaController::class, 'database']);

// pengelolaan mapel
Route::post('/tambah/mapel/admin_sekolah', [MapelController::class, 'tambahmapel']);
Route::post('/update/mapel/{no_mapel}', [MapelController::class, 'updatemapel']);
Route::get('/delete/mapel/{no_mapel}', [MapelController::class, 'deletemapel']);

// akreditasi sekolah
Route::post('/tambah/akreditasi/nilai_sekolah', [AkreditasiController::class, 'addakre']);
Route::get('/json/data/akreditasi/sekolah', [AkreditasiController::class, 'dataakreditasi']);
Route::get('/hapus/mapel/akreditas/{no_mapel}', [AkreditasiController::class, 'hapusmapel']);
Route::post('/tambah/mapel/akreditas/sekolah', [AkreditasiController::class, 'addmapel']);
Route::put('/edit/akreditasi/nilai_sekolah/{no_akreditasi}', [AkreditasiController::class, 'editakreditasi']);
Route::get('/hapus/akreditasi/sekolah/{no_akreditasi}', [AkreditasiController::class, 'hapusakreditasi']);

// tampilan status siswa
Route::get('/status/pendaftaran/siswa', [StatusSiswaController::class, 'index']);
Route::get('/cetak/bukti/penerimaan/{no_siswa}', [StatusSiswaController::class, 'cetak']);

// go school
Route::get('/go_school/{no_siswa}', [GoSchoolController::class, 'index']);
