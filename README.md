# Latihan Individu — Rekap Nilai Mata Kuliah

Aplikasi sederhana PHP untuk menampilkan nilai mata kuliah, nilai huruf, bobot, status kelulusan, IPS, dan batas maksimal SKS semester berikutnya.

## Fitur
- Array multidimensi `$matkul` dengan 6 mata kuliah (lebih dari minimum 5).
- Fungsi helper `hitungBobot($nilai)` mengembalikan nilai huruf dan bobot.
- Status LULUS jika bobot >= 2.0; MENGULANG jika bobot < 2.0.
- Baris MENGULANG diberi warna merah.
- IPS dihitung dari `total (SKS × bobot) / total SKS`.
- Maksimal 24 SKS jika IPS >= 3.00; maksimal 20 SKS jika IPS < 3.00.
- Layout responsif menggunakan CSS.

## Rentang nilai yang digunakan
- A: 85–100 (bobot 4.0)
- B: 75–84 (bobot 3.0)
- C: 65–74 (bobot 2.0)
- D: 50–64 (bobot 1.0)
- E: 0–49 (bobot 0.0)

Rentang ini adalah asumsi implementasi karena instruksi hanya menentukan huruf dan bobot, tidak menentukan batas rentang angka.

