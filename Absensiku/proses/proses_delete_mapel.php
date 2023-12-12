<?php
include "connect.php";
$idm = (isset($_POST['idm'])) ? htmlentities($_POST['idm']) : "";

if (!empty($_POST['input_mapel_validate'])) {
    $query = mysqli_query($conn, "DELETE FROM tb_mapel WHERE idm = '$idm' ");
    if ($query) {
        $message = '<script>alert("Data berhasil dihapus");
        window.location="../matapelajaran"</script>';
    } else {
        $message = '<script>alert("Data gagal dihapus");
        window.location="../matapelajaran"</script>';
    }
}echo $message;
?>