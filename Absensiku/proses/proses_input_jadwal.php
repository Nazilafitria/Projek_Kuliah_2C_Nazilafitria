<?php
include "connect.php";
$idj = (isset($_POST['idj'])) ? htmlentities($_POST['idj']) : "";
$hari = (isset($_POST['hari'])) ? htmlentities($_POST['hari']) : "";
$kelas = (isset($_POST['kelas'])) ? htmlentities($_POST['kelas']) : "";
$guru = (isset($_POST['guru'])) ? htmlentities($_POST['guru']) : "";
$mapel = (isset($_POST['mapel'])) ? htmlentities($_POST['mapel']) : "";

if (!empty($_POST['input_jadwal_validate'])) {
    $select = mysqli_query($conn, "SELECT * FROM tb_jadwal WHERE idj = '$idj'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("id telah ada");
        window.location="../jadwal"</script>';
    } else {
        $query = mysqli_query($conn, "INSERT INTO tb_jadwal (hari,kelas,guru,mapel) values ('$hari','$kelas','$guru','$mapel')");
        if ($query) {
            $message = '<script>alert("Data berhasil dimasukkan");
        window.location="../jadwal"</script>';
        } else {
            $message = '<script>alert("Data gagal dimasukkan");
            window.location="../jadwal"</script>';
        }
    }
}
echo $message;
?>
