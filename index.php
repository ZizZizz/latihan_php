<?php
// Latihan Individu: Pengolahan nilai mata kuliah dan perhitungan IPS

$matkul = [
    ["nama" => "Algoritma dan Pemrograman", "sks" => 3, "nilai" => 88],
    ["nama" => "Struktur Data", "sks" => 3, "nilai" => 76],
    ["nama" => "Basis Data", "sks" => 3, "nilai" => 65],
    ["nama" => "Matematika Diskrit", "sks" => 2, "nilai" => 54],
    ["nama" => "Jaringan Komputer", "sks" => 3, "nilai" => 92],
    ["nama" => "Pemrograman Web", "sks" => 3, "nilai" => 48],
];

function hitungBobot($nilai) {
    if ($nilai >= 85) return ["huruf" => "A", "bobot" => 4.0];
    if ($nilai >= 75) return ["huruf" => "B", "bobot" => 3.0];
    if ($nilai >= 65) return ["huruf" => "C", "bobot" => 2.0];
    if ($nilai >= 50) return ["huruf" => "D", "bobot" => 1.0];
    return ["huruf" => "E", "bobot" => 0.0];
}

$totalSks = 0;
$totalMutu = 0;
foreach ($matkul as &$mk) {
    $hasil = hitungBobot($mk["nilai"]);
    $mk["huruf"] = $hasil["huruf"];
    $mk["bobot"] = $hasil["bobot"];
    $mk["status"] = $hasil["bobot"] >= 2.0 ? "LULUS" : "MENGULANG";
    $totalSks += $mk["sks"];
    $totalMutu += $mk["sks"] * $mk["bobot"];
}
unset($mk);

$ips = $totalSks > 0 ? $totalMutu / $totalSks : 0;
$batasSks = $ips >= 3.00 ? 24 : 20;
function formatAngka($angka) {
    return number_format($angka, 2, ",", ".");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Individu - Nilai Mata Kuliah</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="container">
        <header class="hero">
            <span class="eyebrow">SISTEM AKADEMIK SEDERHANA</span>
            <h1>Rekap Nilai Mata Kuliah</h1>
            <p>Ringkasan nilai, status kelulusan, dan Indeks Prestasi Semester.</p>
        </header>

        <section class="summary-grid" aria-label="Ringkasan akademik">
            <article class="summary-card">
                <span class="summary-label">Jumlah Mata Kuliah</span>
                <strong><?= count($matkul) ?></strong>
                <span class="summary-note">mata kuliah terdaftar</span>
            </article>
            <article class="summary-card">
                <span class="summary-label">Total SKS</span>
                <strong><?= $totalSks ?></strong>
                <span class="summary-note">SKS semester ini</span>
            </article>
            <article class="summary-card highlight">
                <span class="summary-label">IPS</span>
                <strong><?= formatAngka($ips) ?></strong>
                <span class="summary-note">Indeks Prestasi Semester</span>
            </article>
        </section>

        <section class="panel">
            <div class="section-heading">
                <div>
                    <h2>Daftar Nilai</h2>
                    <p>Nilai huruf dan bobot dihitung otomatis oleh fungsi <code>hitungBobot()</code>.</p>
                </div>
                <span class="pill"><?= count($matkul) ?> mata kuliah</span>
            </div>
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Mata Kuliah</th>
                            <th>SKS</th>
                            <th>Nilai Angka</th>
                            <th>Nilai Huruf</th>
                            <th>Bobot</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($matkul as $i => $mk): ?>
                        <tr class="<?= $mk["status"] === "MENGULANG" ? "repeat-row" : "" ?>">
                            <td><?= $i + 1 ?></td>
                            <td class="course-name"><?= htmlspecialchars($mk["nama"], ENT_QUOTES, "UTF-8") ?></td>
                            <td><?= $mk["sks"] ?></td>
                            <td><?= $mk["nilai"] ?></td>
                            <td><span class="grade grade-<?= strtolower($mk["huruf"]) ?>"><?= $mk["huruf"] ?></span></td>
                            <td><?= number_format($mk["bobot"], 1, ",", ".") ?></td>
                            <td><span class="status <?= $mk["status"] === "MENGULANG" ? "status-repeat" : "status-pass" ?>"><?= $mk["status"] ?></span></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <p class="legend"><span class="legend-dot"></span> Baris berwarna merah menandakan mata kuliah berstatus MENGULANG.</p>
        </section>

        <section class="bottom-grid">
            <article class="panel calculation">
                <h2>Ringkasan Perhitungan IPS</h2>
                <p>IPS dihitung dari total nilai mutu dibagi total SKS.</p>
                <div class="formula">IPS = Total (SKS × Bobot) ÷ Total SKS</div>
                <div class="calc-row"><span>Total nilai mutu</span><strong><?= formatAngka($totalMutu) ?></strong></div>
                <div class="calc-row"><span>Total SKS</span><strong><?= $totalSks ?></strong></div>
                <div class="calc-row total"><span>IPS Semester</span><strong><?= formatAngka($ips) ?></strong></div>
            </article>
            <article class="panel sks-panel">
                <h2>Jatah SKS Semester Depan</h2>
                <p>Batas SKS ditentukan berdasarkan IPS yang diperoleh.</p>
                <div class="sks-number"><?= $batasSks ?><small> SKS</small></div>
                <span class="status <?= $ips >= 3.00 ? "status-pass" : "status-repeat" ?>">
                    <?= $ips >= 3.00 ? "IPS ≥ 3,00" : "IPS < 3,00" ?>
                </span>
                <p class="small-note">IPS ≥ 3,00: maksimal 24 SKS. IPS di bawah 3,00: maksimal 20 SKS.</p>
            </article>
        </section>
        <footer>Latihan Individu • PHP dan CSS • Data mata kuliah contoh</footer>
    </main>
</body>
</html>
