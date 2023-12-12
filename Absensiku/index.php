            <?php 
            if(isset($_GET['x']) && $_GET['x']=='home'){
                $page = "home.php";
                include "main.php";
            }elseif(isset($_GET['x']) && $_GET['x']=='santri'){
                $page = "santri.php";
                include "main.php";
            }elseif(isset($_GET['x']) && $_GET['x']=='guru'){
                $page = "guru.php";
                include "main.php";
            }elseif(isset($_GET['x']) && $_GET['x']=='kelas'){
                $page = "kelas.php";
                include "main.php";
            }elseif(isset($_GET['x']) && $_GET['x']=='matapelajaran'){
                $page = "matapelajaran.php";
                include "main.php";
            }elseif(isset($_GET['x']) && $_GET['x']=='jadwal'){
                $page = "jadwal.php";
                include "main.php";
            }elseif(isset($_GET['x']) && $_GET['x']=='user'){
                $page = "user.php";
                include "main.php";
            }elseif(isset($_GET['x']) && $_GET['x']=='rekapabsensi'){
                $page = "rekapabsensi.php";
                include "main.php";
            }elseif(isset($_GET['x']) && $_GET['x']=='absensiku'){
                $page = "absensiku.php";
                include "main.php";
            }elseif(isset($_GET['x']) && $_GET['x']=='jadwalguru'){
                $page = "jadwalguru.php";
                include "main.php";
            }elseif(isset($_GET['x']) && $_GET['x']=='login'){
                include "login.php";
            }elseif(isset($_GET['x']) && $_GET['x']=='logout'){
                include "proses/proses_logout.php";
            }else{
                $page = "home.php";
                include "main.php";
            }
            ?>