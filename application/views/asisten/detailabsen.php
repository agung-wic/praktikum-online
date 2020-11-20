<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="kotak">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h6 class="m-0 font-weight-bold "><?= $nama_modul['name'] . " - " . $nama_kelompok['no_kelompok']; ?></h6>
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">NRP</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Hadir</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($kelompok as $k) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $k['nrp'] ?></td>
                                        <td><?= $k['name'] ?></td>
                                        <?php
                                        $cek = 0;
                                        $masuk = 0;

                                        while ($cek < count($absensi)) {
                                            if ($k['nrp'] == $absensi[$cek]['nrp']) {
                                                if ($k['status'] == 0) {
                                                    echo '<td><p class="badge badge-pill badge-success"><i class="fas fa-check"></i></p></td>';
                                                    echo '<td>' . $absensi[$cek]['keterangan'] . '</td>';
                                                } else {
                                                    echo '<td><p class="badge badge-pill badge-alert"><i class="fas fa-cross"></i></p></td>';
                                                    echo '<td>' . $absensi[$cek]['keterangan'] . '</td>';
                                                }
                                                $masuk = 1;
                                                break;
                                            } else {
                                                $cek++;
                                            }
                                        }
                                        if ($masuk == 0) {
                                            echo '<td><p class="badge badge-pill badge-success" style="opacity:0%"><i class="fas fa-check"></i></p></td>';
                                            echo '<td>Belum Absen</td>';
                                        }
                                        ?>

                                        <?php $i++; ?>
                                        <td>
                                            <a href="<?= base_url('asisten/hadir/') ?>" class="badge badge-pill badge-primary tampilModalAbsen" data-kelompok="<?= $nama_kelompok['id']; ?>" data-modul="<?= $nama_modul['modul']; ?>" data-nrp="<?= $k['nrp']; ?>" data-toggle="modal" data-target="#AbsenEdit">
                                                <i class=" fas fa-fw fa-edit"></i>
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
</div>


<div class="modal fade" id="AbsenEdit" tabindex="-1" role="dialog" aria-labelledby="AbsenEditLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AbsenEditLabel">Edit Absen Praktikan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('asisten/editabsen') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nrp">NRP</label>
                        <input type="text" class="form-control" id="nrp" name="nrp" readonly>
                        <input type="text" class="form-control" id="modul" name="modul" hidden>
                        <input type="text" class="form-control" id="kelompok" name="kelompok" hidden>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="absen" id="hadir" value="hadir" checked>
                            <label class="form-check-label" for="absen">
                                Hadir
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="absen" id="tidak_hadir" value="tidak_hadir">
                            <label class="form-check-label" for="absen">
                                Tidak Hadir
                            </label>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>