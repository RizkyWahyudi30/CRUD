<?php
include 'koneksi.php';
session_start();



$query = "SELECT * FROM tb_siswa;";
$sql = mysqli_query($conn, $query);
$no = 0;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

    <!-- data tables -->
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.css">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"> Latihan CRUD </a>
        </div>
    </nav>

    <!-- judul -->
    <div class="container">
        <h1 class="mt-4">Data Siswa</h1>
        <figure>
            <blockquote class="blockquote">
                <p>Berikut adalah data - data yang telah disimpan di Database.</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                CRUD <cite title="Source Title">Create Read Update Delete</cite>
            </figcaption>
        </figure>
        <a href="kelola.php" type="button" class="btn btn-primary mb-3">
            <i class="fa fa-plus"></i>
            Tambah Data
        </a>

        <?php
        if (isset($_SESSION['eksekusi'])):
            // Tentukan ikon berdasarkan tipe notifikasi
            $icon = "";
            if ($_SESSION['eksekusi']['tipe'] == "success") {
                $icon = "fa-check-circle"; // Ikon ceklis hijau
            } elseif ($_SESSION['eksekusi']['tipe'] == "warning") {
                $icon = "fa-solid fa-triangle-exclamation"; // Ikon warning kuning
            } elseif ($_SESSION['eksekusi']['tipe'] == "danger") {
                $icon = "fa-times-circle"; // Ikon silang merah
            }
        ?>
        <div class="alert alert-<?php echo $_SESSION['eksekusi']['tipe']; ?> alert-dismissible fade show" role="alert">
            <i class="fa <?php echo $icon; ?>"></i>
            <?php echo $_SESSION['eksekusi']['pesan']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
            unset($_SESSION['eksekusi']); // Hapus session setelah ditampilkan
        endif;
        ?>

        <div class="table-responsive">
            <table id="dt" class="table align-middle table-dark table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NISN</th>
                        <th>Nama siswa/i</th>
                        <th>Jenis kelamin</th>
                        <th>Foto siswa/i</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($result = mysqli_fetch_assoc($sql)) {
                    ?>
                    <tr>
                        <td>
                            <?php echo ++$no ?>.
                        </td>
                        <td>
                            <?php echo $result['nisn']; ?>
                        </td>
                        <td>
                            <?php echo $result['nama_siswa']; ?>
                        </td>
                        <td>
                            <?php echo $result['jenis_kelamin']; ?>
                        </td>
                        <td>
                            <img src="img/<?php echo $result['foto_siswa']; ?>" alt="gambar" style="width: 150px" />
                        </td>
                        <td>
                            <?php echo $result['alamat']; ?>
                        </td>
                        <td>
                            <a href="kelola.php ?ubah=<?php echo $result['id_siswa']; ?>" type="button"
                                class="btn btn-warning">
                                <i class="fa fa-pencil"></i>
                                Edit
                            </a>
                            <a href="proses.php?hapus=<?php echo $result['id_siswa']; ?>" type="button"
                                class="btn btn-danger" onclick="return confirm('Apakah yakin ingin menghapus?')">
                                <i class="fa fa-eraser"></i>
                                Hapus
                            </a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- jQuery (wajib untuk DataTables) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script type="text/javascript" src="DataTables/datatables.js"></script>

    <script type="text/javascript">
    new DataTable('#dt');
    </script>
</body>

</html>