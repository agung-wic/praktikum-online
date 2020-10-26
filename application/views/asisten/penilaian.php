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
                    <div class="col-auto mr-auto">
                        <a href="" class="btn gradien mb-3 tombolTambahKelompok" data-toggle="modal" data-target="#TambahKelompok">Tambah Kelompok</a>
                    </div>
                    <div class="col-1">
                        <a href="" class="btn gradien mb-3" data-toggle="modal" data-target="#KelompokAddFile"><i class="fas fa-file-csv"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kelompok</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($kelompok as $k) : ?>
                                    <tr>

                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $k['no_kelompok'] ?></td>
                                        <td>
                                            <a href="<?= base_url('asisten/penilaian_detail/' . $k['id']); ?>" class="badge badge-pill badge-primary"><i class="fas fa-fw fa-info"></i>Detail</a>
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