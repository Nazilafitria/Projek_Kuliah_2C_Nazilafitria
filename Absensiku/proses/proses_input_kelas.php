<?php
include "connect.php";
$namakelas = (isset($_POST['namakelas'])) ? htmlentities($_POST['namakelas']) : "";

if (!empty($_POST['input_kelas_validate'])) {
    $select = mysqli_query($conn, "SELECT * FROM tb_kelas WHERE namakelas = '$namakelas'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Nama kelas yang dimasukkan telah ada");
        window.location="../kelas"</script>';
    } else {
        $query = mysqli_query($conn, "INSERT INTO tb_kelas (namakelas) values ('$namakelas')");
        if ($query) {
            $message = '<script>alert("Data berhasil dimasukkan");
        window.location="../kelas"</script>';
        } else {
            $message = '<script>alert("Data gagal dimasukkan");
            window.location="../kelas"</script>';
        }
    }
}
echo $message;
?>