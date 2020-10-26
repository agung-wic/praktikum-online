<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="kotak">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h6 class="m-0 font-weight-bold "><?= $title . " - " . $nama_modul['name'] . " - " . $nama_kelompok['no_kelompok']; ?></h6>
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

                                        if ($cek < count($absensi)) {
                                            if ($k['nrp'] == $absensi[$cek]['nrp']) {
                                                echo '<td><p class="badge badge-pill badge-success"><i class="fas fa-check"></i></p></td>';
                                                $cek++;
                                            } else {
                                                echo '<td></td>';
                                            }
                                        }
                                        ?>

                                    </tr>
                                    <?php $i++; ?>
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