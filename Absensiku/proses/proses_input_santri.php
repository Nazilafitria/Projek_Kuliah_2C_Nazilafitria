<?php
include "connect.php";
$nik = (isset($_POST['nik'])) ? htmlentities($_POST['nik']) : "";
$name = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "";
$jk = (isset($_POST['jk'])) ? htmlentities($_POST['jk']) : "";
$kelas = (isset($_POST['kelas'])) ? htmlentities($_POST['kelas']) : "";
$nohp = (isset($_POST['nohp'])) ? htmlentities($_POST['nohp']) : "";
$alamat = (isset($_POST['alamat'])) ? htmlentities($_POST['alamat']) : "";
$namaayah = (isset($_POST['namaayah'])) ? htmlentities($_POST['namaayah']) : "";
$kerjaayah = (isset($_POST['kerjaayah'])) ? htmlentities($_POST['kerjaayah']) : "";
$namaibu = (isset($_POST['namaibu'])) ? htmlentities($_POST['namaibu']) : "";
$kerjaibu = (isset($_POST['kerjaibu'])) ? htmlentities($_POST['kerjaibu']) : "";
$password = md5('password');

if (!empty($_POST['input_santri_validate'])) {
    $select = mysqli_query($conn, "SELECT * FROM tb_santri WHERE nik = '$nik'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("NIK yang dimasukkan telah ada");
        window.location="../santri"</script>';
    } else {
        $query = mysqli_query($conn, "INSERT INTO tb_santri (nik,nama,jk,kelas,nohp,alamat,namaayah,kerjaayah,namaibu,kerjaibu,password) values ('$nik','$name','$jk','$kelas','$nohp','$alamat','$namaayah','$kerjaayah','$namaibu','$kerjaibu','$password')");
        if ($query) {
            $message = '<script>alert("Data berhasil dimasukkan");
        window.location="../santri</script>';
        } else {
            $message = '<script>alert("Data gagal dimasukkan");
            window.location="../santri</script>';
        }
    }
}
echo $message;
?>