<?php
include "connect.php";
$nik = (isset($_POST['nik'])) ? htmlentities($_POST['nik']) : "";
$name = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "";
$jk = (isset($_POST['jk'])) ? htmlentities($_POST['jk']) : "";
$alamat = (isset($_POST['alamat'])) ? htmlentities($_POST['alamat']) : "";
$password = md5('password');

if (!empty($_POST['input_guru_validate'])) {
    $select = mysqli_query($conn, "SELECT * FROM tb_guru WHERE nik = '$nik'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("NIK yang dimasukkan telah ada");
        window.location="../guru"</script>';
    } else {
        $query = mysqli_query($conn, "INSERT INTO tb_guru (nik,nama,jk,alamat,password) values ('$nik','$name','$jk','$alamat','$password')");
        if ($query) {
            $message = '<script>alert("Data berhasil dimasukkan");
        window.location="../guru</script>';
        } else {
            $message = '<script>alert("Data gagal dimasukkan");
            window.location="../guru</script>';
        }
    }
}
echo $message;
?>