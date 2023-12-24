<?php
include "connect.php";
$idg = (isset($_POST['idg'])) ? htmlentities($_POST['idg']) : "";

if (!empty($_POST['input_guru_validate'])) {
    $query = mysqli_query($conn, "DELETE FROM tb_guru WHERE idg = '$idg' ");
    if ($query) {
        $message = '<script>alert("Data berhasil dihapus");
        window.location="../guru"</script>';
    } else {
        $message = '<script>alert("Data gagal dihapus");
        window.location="../guru"</script>';
    }
}echo $message;
?>