<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="kotak">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h6 class="m-0 font-weight-bold "><?= $title; ?></h6>
                    </div>
                </div>
                <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <?= $this->session->flashdata('message1'); ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kelompok</th>
                                    <th scope="col">Jumlah Asisten</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($kelompok as $k) : ?>
                                    <tr>

                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $k['no_kelompok'] ?></td>
                                        <?php
                                        $cek = 0;
                                        if ($cek < count($jumlah_asisten)) {
                                            var_dump($jumlah_asisten);
                                            if ($k['id'] == $jumlah_asisten[$cek]['id']) {
                                                echo "<td>" . $jumlah_asisten[$cek]['jumlah'] . "</td>";
                                                $cek++;
                                            } else {
                                                echo "<td>0</td>";
                                            }
                                        }
                                        ?>
                                        <td>
                                            <a href="<?= base_url('modul/detailmanajemenasisten/' . $id_modul . '/' . $k['id']); ?>" class="badge badge-pill badge-primary"><i class="fas fa-fw fa-info"></i>Detail</a>
                                        </td>
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



<!-- Modal -->
<div class="modal fade" id="TambahKelompok" tabindex="-1" role="dialog" aria-labelledby="TambahKelompokLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TambahKelompokLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('asisten/tambahkelompok') ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" id="id" name="id">
                        <input type="text" class="form-control" id="no_kelompok" name="no_kelompok" placeholder="">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>