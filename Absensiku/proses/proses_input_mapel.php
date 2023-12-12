<?php
include "connect.php";
$mapel = (isset($_POST['mapel'])) ? htmlentities($_POST['mapel']) : "";

if (!empty($_POST['input_mapel_validate'])) {
    $select = mysqli_query($conn, "SELECT * FROM tb_mapel WHERE mapel = '$mapel'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Mata Pelajaran yang dimasukkan telah ada");
        window.location="../matapelajaran"</script>';
    } else {
        $query = mysqli_query($conn, "INSERT INTO tb_mapel (mapel) values ('$mapel')");
        if ($query) {
            $message = '<script>alert("Data berhasil dimasukkan");
        window.location="../matapelajaran"</script>';
        } else {
            $message = '<script>alert("Data gagal dimasukkan");
            window.location="../matapelajaran"</script>';
        }
    }
}
echo $message;
?>