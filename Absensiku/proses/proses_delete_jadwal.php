<?php
include "connect.php";
$idj = (isset($_POST['idj'])) ? htmlentities($_POST['idj']) : "";

if (!empty($_POST['delete_jadwal_validate'])) {
    $query = mysqli_query($conn, "DELETE FROM tb_jadwal WHERE idj = '$idj' ");
    if ($query) {
        $message = '<script>alert("Data berhasil dihapus");
        window.location="../jadwal"</script>';
    } else {
        $message = '<script>alert("Data gagal dihapus");
        window.location="../jadwal"</script>';
    }
}echo $message;
?>