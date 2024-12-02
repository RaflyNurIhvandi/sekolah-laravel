window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
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
});
