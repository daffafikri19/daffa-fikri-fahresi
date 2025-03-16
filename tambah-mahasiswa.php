<?php

include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $gender = $_POST['gender'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

    if (empty($nim) || empty($nama) || empty($gender) || empty($jurusan) || empty($alamat)) {
        $error = "Semua field harus diisi!";
    } else {
        $stmt = $conn->prepare("INSERT INTO db_mhs (nim, nama, gender, jurusan, alamat) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nim, $nama, $gender, $jurusan, $alamat);

        if ($stmt->execute()) {
            $success = "Data berhasil ditambahkan!";
            header("Location: tabel-mahasiswa.php");
            exit();
        } else {
            $error = "Error: " . $conn->error;
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <div class="card rounded-md shadow-sm">
            <div class="card-body">
                <h5 class="card-title text-center mb-4">Tambah Mahasiswa</h5>

                <?php
                if (isset($error)) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
                if (isset($success)) {
                    echo "<div class='alert alert-success'>$success</div>";
                }
                ?>

                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="number" class="form-control" id="nim" name="nim" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Gender</label>
                        <div class="btn-group d-block" role="group">
                            <input type="radio" class="btn-check" name="gender" id="laki" value="Laki-laki" required>
                            <label class="btn btn-outline-primary" for="laki">Laki-laki</label>

                            <input type="radio" class="btn-check" name="gender" id="perempuan" value="Perempuan">
                            <label class="btn btn-outline-primary" for="perempuan">Perempuan</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <select class="form-select" id="jurusan" name="jurusan" required>
                            <option value="">Pilih Jurusan</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Teknik Komputer">Teknik Komputer</option>
                            <option value="Manajemen Informatika">Manajemen Informatika</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea type="text" class="form-control" id="alamat" name="alamat" required></textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="#" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
mysqli_close($conn);
?>