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
                    <?= $this->session->flashdata('message'); ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kelompok</th>
                                    <th scope="col">Jumlah Anggota</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($list as $k) : ?>
                                    <tr>

                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $k['name_praktikan'] ?></td>
                                        <td><?= $k['jumlah'] ?></td>
                                        <td>
                                            <a href="<?= base_url('modul/detail/' . $k['id']); ?>" class="badge badge-pill badge-primary"><i class="fas fa-fw fa-info"></i>Detail</a>
                                            <a href="<?= base_url('modul/editkelompok/' . $k['id']); ?>" data-id="<?= $k['id'] ?>" data-toggle="modal" data-target="#TambahKelompok" class="badge badge-pill badge-primary tombolEditKelompok"><i class="fas fa-fw fa-edit"></i>Edit</a>
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