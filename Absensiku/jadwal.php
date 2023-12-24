<?php
include "proses/connect.php";
date_default_timezone_set('Asia/Jakarta');
$query = mysqli_query($conn, "SELECT * FROM tb_jadwal GROUP BY idj ORDER BY jam DESC");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>

<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header bg-dark">
            Data Jadwal
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#ModalTambahUser"> Tambah Jadwal</button>
                </div>
            </div>

            <!-- Modal Tambah Baru-->
            <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Jadwal</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_jadwal.php" method="POST">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" idj="hari" placeholder="Nama Hari" name="hari" required>
                                            <label for="hari">Hari</label>
                                            <div class="invalid-feedback">
                                                Masukkan Hari
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" idj="kelas" placeholder="kelas" name="kelas" required>
                                            <label for="kelas">Kelas</label>
                                            <div class="invalid-feedback">
                                                Masukkan Kelas
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" idj="guru" placeholder="Nama guru" name="guru" required>
                                            <label for="guru">Nama guru</label>
                                            <div class="invalid-feedback">
                                                Masukkan Nama Guru
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" idj="mapel" placeholder="Mata Pelajaran" name="mapel" required>
                                            <label for="mapel">Mata Pelajaran</label>
                                            <div class="invalid-feedback">
                                                Masukkan Mata Pelajaran
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success" name="input_jadwal_validate" value="1234">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal Tambah Baru-->

            <?php
            if (empty($result)) {
                echo "Data Jadwal Tidak Ada";
            } else {
                foreach ($result as $row) {
            ?>

                    <!-- Modal Edit-->
                    <div class="modal fade" id="ModalEdit<?php echo $row['idj'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Jadwal</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_edit_jadwal.php" method="POST">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" idj="hari" placeholder="hari" name="hari" required value="<?php echo $row['hari'] ?>">
                                                    <label for="hari">Hari</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Hari
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" idj="kelas" placeholder="kelas" name="kelas" required value="<?php echo $row['kelas'] ?>">
                                                    <label for="kelas">Kelas</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Kelas
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" idj="guru" placeholder="Nama guru" name="guru" required value="<?php echo $row['guru'] ?>">
                                                    <label for="guru">Nama Guru</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Nama Guru
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" idj="mapel" placeholder="mapel" name="mapel" required value="<?php echo $row['mapel'] ?>">
                                                    <label for="mapel">Mata Pelajaran</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Mata Pelajaran
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success" name="edit_jadwal_validate" value="1234">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal Edit-->

                    <!-- Modal Delete-->
                    <div class="modal fade" id="ModalDelete<?php echo $row['idj'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data Jadwal</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_delete_jadwal.php" method="POST">
                                        <input type="hidden" value="<?php echo $row['idj'] ?>" name="idj">
                                        <div class="col-lg-12">
                                            Apakah Anda Ingin Menghapus Jadwalnya?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger" name="delete_jadwal_validate" value="1234">Hapus</button>
                                            </class=>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal Delete-->
                <?php
                }
                ?>
                <div class="table-responsive">
                    <table class="table table-hover table-secondary">
                        <thead>
                            <tr class="text-nowrap">
                                <th scope="col">No</th>
                                <th scope="col">Hari</th>
                                <th scope="col">Jam</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Guru</th>
                                <th scope="col">Mata Pelajaran</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($result as $row) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $no++ ?></th>
                                    <td><?php echo $row['hari'] ?></td>
                                    <td><?php echo $row['jam'] ?></td>
                                    <td><?php echo $row['kelas'] ?></td>
                                    <td><?php echo $row['guru'] ?></td>
                                    <td><?php echo $row['mapel'] ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['idj'] ?>"><i class="bi bi-pencil-square"></i></button>
                                            <button class="btn btn-danger btn-sm me-1 " data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['idj'] ?>"><i class="bi bi-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            <?php
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
</div>
</div>
</div>