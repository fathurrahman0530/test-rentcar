 export function hitungJarakTanggal(tanggalAwal, tanggalAkhir) {
    var awal = new Date(tanggalAwal);
    var akhir = new Date(tanggalAkhir);

    // Menghitung selisih dalam milidetik
    var selisih = akhir.getTime() - awal.getTime();

    // Menghitung jumlah hari dari selisih waktu
    var jarakHari = Math.floor(selisih / (1000 * 3600 * 24));

    return jarakHari;
}
