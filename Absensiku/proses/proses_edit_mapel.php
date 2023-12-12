<?php
include "connect.php";
$idm = (isset($_POST['idm'])) ? htmlentities($_POST['idm']) : "";
$mapel = (isset($_POST['mapel'])) ? htmlentities($_POST['mapel']) : "";

if (!empty($_POST['input_mapel_validate'])) {
    $select = mysqli_query($conn, "SELECT * FROM tb_mapel WHERE mapel = '$mapel'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Mata Pelajaran yang dimasukkan telah ada");
        window.location="../matapelajaran"</script>';
    } else {
        $query = mysqli_query($conn, "UPDATE tb_mapel SET mapel='$mapel' WHERE idm='$idm' ");
        if ($query) {
            $message = '<script>alert("Data berhasil diupdate");
            window.location="../matapelajaran"</script>';
        } else {
            $message = '<script>alert("Data gagal diupdate");
            window.location="../matapelajaran"</script>';
        }
    }
}
echo $message;
?>