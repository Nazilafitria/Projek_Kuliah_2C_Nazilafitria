<?php
session_start();
include "connect.php";
$kodeabsen = (isset($_POST['kodeabsen'])) ? htmlentities($_POST['kodeabsen']) : "";

if (!empty($_POST['tidakabsen_validate'])) {
        $query = mysqli_query($conn, "UPDATE absen SET  status=1 WHERE kodeabsen='$kodeabsen'");
        if ($query) {
            $message = '<script>alert("Berhasil");
                        window.location="../absensiku"</script>';
        } else {
            $message = '<script>alert("Gagal")
                        window.location="../absensiku"</script>';
        }
    }
echo $message;
?>