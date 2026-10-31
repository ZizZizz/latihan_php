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

## Cara menjalankan di localhost (XAMPP)
1. Ekstrak folder `latihan_individu` ke `C:\xampp\htdocs\`.
2. Jalankan Apache melalui XAMPP Control Panel.
3. Buka `http://localhost/latihan_individu/` di browser.
4. Pastikan tabel tampil dan baris dengan status MENGULANG berwarna merah.

## Cara mengunggah ke GitHub
1. Buat repository baru bernama `latihan-individu`.
2. Buka terminal di folder project.
3. Jalankan perintah berikut (ganti URL dengan URL repository milik sendiri):
   ```bash
   git init
   git add .
   git commit -m "Menyelesaikan latihan individu nilai mata kuliah"
   git branch -M main
   git remote add origin https://github.com/USERNAME/latihan-individu.git
   git push -u origin main
   ```
4. Ganti `USERNAME` dengan username GitHub sendiri dan pastikan repository sudah berisi `index.php`, `style.css`, dan `README.md`.

## Sebelum dikumpulkan
- Ganti data mata kuliah contoh bila diperlukan.
- Ambil screenshot hasil dari `http://localhost/latihan_individu/`.
- Masukkan URL repository GitHub yang benar dan screenshot asli localhost ke dokumen Word.
