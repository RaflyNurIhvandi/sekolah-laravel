window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }
    const datatab = document.getElementById('datatab');
    if (datatab) {
        new simpleDatatables.DataTable(datatab);
    }
    const tabelDataKelas = document.getElementById('tabelDataKelas');
    if (tabelDataKelas) {
        new simpleDatatables.DataTable(tabelDataKelas);
    }
    const tableJadwalSenin = document.getElementById('tableJadwalSenin');
    if (tableJadwalSenin) {
        new simpleDatatables.DataTable(tableJadwalSenin);
    }
    const tableJadwalSelasa = document.getElementById('tableJadwalSelasa');
    if (tableJadwalSelasa) {
        new simpleDatatables.DataTable(tableJadwalSelasa);
    }
    const tableJadwalRabu = document.getElementById('tableJadwalRabu');
    if (tableJadwalRabu) {
        new simpleDatatables.DataTable(tableJadwalRabu);
    }
    const tableJadwalKamis = document.getElementById('tableJadwalKamis');
    if (tableJadwalKamis) {
        new simpleDatatables.DataTable(tableJadwalKamis);
    }
    const tableJadwalJumat = document.getElementById('tableJadwalJumat');
    if (tableJadwalJumat) {
        new simpleDatatables.DataTable(tableJadwalJumat);
    }
    const tableJadwalSabtu = document.getElementById('tableJadwalSabtu');
    if (tableJadwalSabtu) {
        new simpleDatatables.DataTable(tableJadwalSabtu);
    }
    const penerimaanSiswa = document.getElementById('penerimaanSiswa');
    if (penerimaanSiswa) {
        new simpleDatatables.DataTable(penerimaanSiswa);
    }
    const dataKelasSekolah = document.getElementById('dataKelasSekolah');
    if (dataKelasSekolah) {
        new simpleDatatables.DataTable(dataKelasSekolah);
    }
    const dataJurusan = document.getElementById('dataJurusan');
    if (dataJurusan) {
        new simpleDatatables.DataTable(dataJurusan);
    }
    const tableMapel = document.getElementById('tableMapel');
    if (tableMapel) {
        new simpleDatatables.DataTable(tableMapel);
    }
    const tableAkreditasi = document.getElementById('tableAkreditasi');
    if (tableAkreditasi) {
        new simpleDatatables.DataTable(tableAkreditasi);
    }
    const tableDaftarGuru = document.getElementById('tableDaftarGuru');
    if (tableDaftarGuru) {
        new simpleDatatables.DataTable(tableDaftarGuru);
    }
    const daftarGuruBelumDiterima = document.getElementById('daftarGuruBelumDiterima');
    if (daftarGuruBelumDiterima) {
        new simpleDatatables.DataTable(daftarGuruBelumDiterima);
    }
});
