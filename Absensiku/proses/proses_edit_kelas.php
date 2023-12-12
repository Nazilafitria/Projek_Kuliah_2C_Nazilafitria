<?php
include "connect.php";
$kode = (isset($_POST['kode'])) ? htmlentities($_POST['kode']) : "";
$namakelas = (isset($_POST['namakelas'])) ? htmlentities($_POST['namakelas']) : "";

if (!empty($_POST['input_kelas_validate'])) {
    $select = mysqli_query($conn, "SELECT * FROM tb_kelas WHERE namakelas = '$namakelas'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Nama Kelas yang dimasukkan telah ada");
        window.location="../kelas"</script>';
    } else {
        $query = mysqli_query($conn, "UPDATE tb_kelas SET namakelas='$namakelas' WHERE kode='$kode' ");
        if ($query) {
            $message = '<script>alert("Data berhasil diupdate");
            window.location="../kelas"</script>';
        } else {
            $message = '<script>alert("Data gagal diupdate");
            window.location="../kelas"</script>';
        }
    }
}
echo $message;
?>