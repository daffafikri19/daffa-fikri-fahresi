<?php

include './connect.php';

function getData($conn)
{
    $result = $conn->query("SELECT * FROM db_mhs");
    return $result;
}

$mahasiswa = getData($conn);
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="w-full h-full p-4">
        <div class="card rounded-md shadow-sm">
            <div class="card-body">
                <h5 class="card-title text-center">List Mahasiswa</h5>
                <a class="btn btn-primary" href="tambah-mahasiswa.php">Tambah Data</a>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Jurusan</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($mahasiswa->num_rows > 0): ?>
                                <?php $no = 1; ?>
                                <?php while ($rows = $mahasiswa->fetch_assoc()): ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $rows['nim']; ?></td>
                                        <td><?php echo $rows['nama']; ?></td>
                                        <td><?php echo $rows['jurusan']; ?></td>
                                        <td><?php echo $rows['alamat']; ?></td>
                                        <td><?php echo $rows['gender']; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-outline-primary">Edit</button>
                                            <button type="button" class="btn btn-outline-danger">Hapus</button>
                                        </td>
                                    </tr>
                                <?php endwhile ?>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>