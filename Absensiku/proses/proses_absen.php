<?php
session_start();
include "connect.php";
$kodeabsen = (isset($_POST['kodeabsen'])) ? htmlentities($_POST['kodeabsen']) : "";

if (!empty($_POST['absen_validate'])) {
        $query = mysqli_query($conn, "UPDATE absen SET status=2 WHERE kodeabsen='$kodeabsen'");
        if ($query) {
            $message = '<script>alert("Telah Mengabsen");
                        window.location="../absensiku"</script>';
        } else {
            $message = '<script>alert("Gagal proses data")
                        window.location="../absensiku"</script>';
        }
    }
echo $message;
?>