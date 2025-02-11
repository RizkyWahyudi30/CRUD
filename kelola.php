<!DOCTYPE html>

<?php
include 'koneksi.php';
session_start();



$id_siswa = '';
$nisn = '';
$nama_siswa = '';
$jenis_kelamin = '';
$alamat = '';

if (isset($_GET['ubah'])) {
    $id_siswa = $_GET['ubah'];

    $query = "SELECT * FROM tb_siswa WHERE id_siswa = '$id_siswa;'";
    $sql = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($sql);

    $nisn = $result['nisn'];
    $nama_siswa = $result['nama_siswa'];
    $jenis_kelamin = $result['jenis_kelamin'];
    $alamat = $result['alamat'];

    // var_dump($result);

    // die();
}
?>

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
</head>

<body>
    <!-- navbar -->
    <nav class="navbar bg-body-tertiary bg-light mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"> Latihan CRUD </a>
        </div>
    </nav>

    <div class="container">
        <form method="POST" action="proses.php" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $id_siswa; ?>" name="id_siswa">
            <div class="mb-3 row">
                <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
                <div class="col-sm-10">
                    <input required type="text" name="nisn" class="form-control" id="nisn"
                        placeholder="cut the nisn here!" value="<?php echo $nisn; ?>" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama siswa/i</label>
                <div class="col-sm-10">
                    <input required type="text" name="nama_siswa" class="form-control" id="nama"
                        placeholder="name is here" value="<?php echo $nama_siswa; ?>" />
                </div>
            </div>
            <div class=" mb-3 row">
                <label for="jkel" class="col-sm-2 col-form-label">Jenis kelamin</label>
                <div class="col-sm-10">
                    <select required id="jkel" name="jenis_kelamin" class="form-select">
                        <option <?php if ($jenis_kelamin == 'Laki-laki') {
                                    echo "selected";
                                } ?> value="Laki-laki">Laki-laki</option>
                        <option <?php if ($jenis_kelamin == 'Perempuan') {
                                    echo "selected";
                                } ?> value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="foto" class="col-sm-2 col-form-label">Foto siswa/i</label>
                <div class="col-sm-10">
                    <input <?php if (!isset($_GET['ubah'])) {
                                echo "required";
                            } ?> class="form-control" type="file" name="foto" id="foto" accept="image/*" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat lengkap</label>
                <div class="col-sm-10">
                    <textarea required class=" form-control" name="alamat" id="alamat"
                        rows="3"><?php echo $alamat; ?></textarea>
                </div>
            </div>
            <div class="mb-3 row mt-4">
                <div class="col">
                    <?php
                    if (isset($_GET['ubah'])) {
                    ?>
                        <button type="submit" name="aksi" value="edit" class="btn btn-primary">
                            <i class="fa-duotone fa-solid fa-bookmark"></i>
                            Simpan Perubahan
                        </button>
                    <?php
                    } else {
                    ?>
                        <button type="submit" name="aksi" value="add" class="btn btn-primary">
                            <i class="fa-duotone fa-solid fa-bookmark"></i>
                            Tambahkan
                        </button>
                    <?php
                    }
                    ?>
                    <a href="index.php" type="button" class="btn btn-danger">
                        <i class="fa-solid fa-delete-left"></i>
                        Batal
                    </a>
                </div>
            </div>
        </form>
    </div>

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>