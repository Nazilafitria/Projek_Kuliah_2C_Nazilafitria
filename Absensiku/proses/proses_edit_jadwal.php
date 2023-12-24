<?php
include "connect.php";
$idj = (isset($_POST['idj'])) ? htmlentities($_POST['idj']) : "";
$hari = (isset($_POST['hari'])) ? htmlentities($_POST['hari']) : "";
$kelas = (isset($_POST['kelas'])) ? htmlentities($_POST['kelas']) : "";
$guru = (isset($_POST['guru'])) ? htmlentities($_POST['guru']) : "";
$mapel = (isset($_POST['mapel'])) ? htmlentities($_POST['mapel']) : "";


if (!empty($_POST['edit_jadwal_validate'])) {
    $select = mysqli_query($conn, "SELECT * FROM tb_jadwal WHERE idj = '$idj'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("id telah ada");
        window.location="../jadwal"</script>';
    } else {
        $query = mysqli_query($conn, "UPDATE tb_jadwal SET hari='$hari', kelas='$kelas', guru='$guru', mapel='$mapel' WHERE idj='$idj' ");
        if ($query) {
            $message = '<script>alert("Data berhasil diupdate");
            window.location="../jadwal"</script>';
        } else {
            $message = '<script>alert("Data gagal diupdate");
            window.location="../jadwal"</script>';
        }
    }
}
echo $message;
?>