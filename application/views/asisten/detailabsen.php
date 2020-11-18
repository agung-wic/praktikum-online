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
                                                echo '<td><p class="badge badge-pill badge-success"><i class="fas fa-check"></i></p></td>';
                                                echo '<td>' . $absensi[$cek]['keterangan'] . '</td>';
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
                                            <a href="<?= base_url('asisten/hadir/') ?>" class="badge badge-pill badge-primary tampilModalUbah" data-toggle="modal" data-target="#UserEdit">
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


<div class="modal fade" id="UserEdit" tabindex="-1" role="dialog" aria-labelledby="UserEditLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="UserEditLabel">Edit Absen Praktikan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('asisten/editabsen') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nrp">NRP</label>
                        <input type="text" class="form-control" id="nrp" name="nrp" readonly>
                    </div>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-success">
                            <input type="radio" name="options" id="option1" autocomplete="off" checked>Hadir
                        </label>
                        <label class="btn btn-danger">
                            <input type="radio" name="options" id="option2" autocomplete="off">Tidak Hadir
                        </label>
                    </div>
                    <div class="form-group">
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