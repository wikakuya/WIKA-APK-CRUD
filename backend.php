<?php
$file = "data.txt";
$action = $_GET['action'] ?? '';

// Simpan data
if ($action === 'create' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $baris = "$nim|$nama|$jurusan\n";
    file_put_contents($file, $baris, FILE_APPEND);
    exit;
}

// Ambil data
if ($action === 'read') {
    $data = [];
    if (file_exists($file)) {
        $baris = file($file, FILE_IGNORE_NEW_LINES);
        foreach ($baris as $i => $line) {
            list($nim, $nama, $jurusan) = explode("|", $line);
            $data[] = ['id' => $i, 'nim' => $nim, 'nama' => $nama, 'jurusan' => $jurusan];
        }
    }
    header("Content-Type: application/json");
    echo json_encode($data);
}
