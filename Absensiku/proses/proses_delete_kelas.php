<?php
include "connect.php";
$kode = (isset($_POST['kode'])) ? htmlentities($_POST['kode']) : "";

if (!empty($_POST['input_kelas_validate'])) {
    $query = mysqli_query($conn, "DELETE FROM tb_kelas WHERE kode = '$kode' ");
    if ($query) {
        $message = '<script>alert("Data berhasil dihapus");
        window.location="../kelas"</script>';
    } else {
        $message = '<script>alert("Data gagal dihapus");
        window.location="../kelas"</script>';
    }
}echo $message;
?>