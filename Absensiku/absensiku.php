<?php
include "proses/connect.php";

$query = mysqli_query($conn, "SELECT * FROM absen 
LEFT JOIN tb_mapel ON  tb_mapel.idm = absen.kodeabsen
LEFT JOIN tb_kelas ON tb_kelas.kode = absen.kode
LEFT JOIN tb_jadwal ON tb_jadwal.idj = absen.idj 
ORDER BY jam desc");

while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>

<div class="col-lg-9 mt-2 ">
    <div class="card">
        <div class="card-header">
            Absensiku
        </div>
        <div class="card-body">
        </div>
        <?php
        if (empty($result)) {
            echo "Data Menu Tidak Ada";
        } else {
            foreach ($result as $row) {
        ?>

<!-- Modal Terima Dapur-->
<div class="modal fade" id="tidakabsen<?php echo $row['kodeabsen'] ?>" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" novalidate action="proses/proses_tidakabsen.php"
                            method="POST">
                            <input type="hidden" name="kodeabsen" value="<?php echo $row['kodeabsen'] ?>">
                            Tidak akan Mengabsen?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" name="tidakabsen_validate"
                            value="12345">Yakin</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End modal terima dapur -->

        <!-- Modal absen-->
        <div class="modal fade" id="absen<?php echo $row['kodeabsen'] ?>" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Absen</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" novalidate action="proses/proses_absen.php"
                            method="POST">
                            <input type="hidden" name="kode" value="<?php echo $row['kodeabsen'] ?>">
                            Apakah yakin akan mengabsen?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" name="absen_validate" value="12345">Yakin</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end modal absen-->

        <?php
            }
            ?>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr class="text-nowap">
                        <th scope="col">Kode</th>
                        <th scope="col">Hari</th>
                        <th scope="col">Mata Pelajaran</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $kodeabsen = 201;
                        foreach ($result as $row) {
                            if($row['status'] !=2 ){
                        ?>
                    <tr>
                        <td><?php echo $kodeabsen++ ?></td>
                        <td><?php echo $row['hari'] ?></td>
                        <td><?php echo $row['mapel'] ?></td>
                        <td><?php echo $row['namakelas'] ?></td>
                        <td>
                            <?php
                                        if($row['status']==1){
                                            echo"<span class='badge text-bg-warning'>Belum Absen</span>";
                                        }elseif($row["status"]== 2){
                                            echo"<span class='badge text-bg-primary'>Sudah Absen</span>";
                                        }
                            ?>
                        </td>

                        <td>
                            <div class="d-flex">
                            <button
                                    class="<?php echo (!empty($row['status'])) ? "btn btn-secondary btn-sm me-1 disabled" : "btn btn-primary btn-sm me-1"; ?>"
                                    data-bs-toggle="modal"
                                    data-bs-target="#tidakabsen<?php echo $row['kodeabsen'] ?>">Tidak Absen</button>
                                <button
                                    class="<?php echo (empty($row['status']) || $row['status'] != 1) ? "btn btn-secondary btn-sm me-1 disabled" : "btn btn-success btn-sm me-1"; ?>"
                                    data-bs-toggle="modal"
                                    data-bs-target="#absen<?php echo $row['kodeabsen'] ?>">Absen</button>
                            </div>
                        </td>
                    </tr>
                    <?php
                        }
                    }
                        ?>
                </tbody>
            </table>
        </div>
        <?php
        }
        ?>
    </div>
</div>
</div>
