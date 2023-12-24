<?php
include "connect.php";
$ids = (isset($_POST['ids'])) ? htmlentities($_POST['ids']) : "";

if (!empty($_POST['input_santri_validate'])) {
    $query = mysqli_query($conn, "DELETE FROM tb_santri WHERE ids = '$ids' ");
    if ($query) {
        $message = '<script>alert("Data berhasil dihapus");
        window.location="../santri"</script>';
    } else {
        $message = '<script>alert("Data gagal dihapus");
        window.location="../santri"</script>';
    }
}echo $message;
?>