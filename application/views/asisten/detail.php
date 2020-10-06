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
                    <div class="col-auto mr-auto">
                        <a href="" class="btn gradien mb-3 tombolTambahAnggota" data-toggle="modal" data-target="#TambahAnggota">Tambah Anggota</a>
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
                                        <td>
                                            <a href="<?= base_url('asisten/gantikelompok/' . $k['id']); ?>" class="badge badge-pill badge-primary"><i class="fas fa-fw fa-edit"></i>Detail</a>
                                            <a href="<?= base_url('asisten/deleteanggotakelompok/' . $k['id']); ?>" class="badge badge-pill badge-danger" onclick="return confirm('Yakin?');"><i class="fas fa-fw fa-trash-alt"></i>Delete</a>
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
<div class="modal fade" id="TambahAnggota" tabindex="-1" role="dialog" aria-labelledby="TambahAnggotaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TambahAnggotaLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('asisten/tambbahanggota') ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" id="id" name="id">
                        <input type="text" class="form-control" id="no_kelompok" name="no_kelompok" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="modul">NRP</label>
                        <input type="text" class="form-control" id="no_kelompok" name="no_kelompok" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="modul">Nama</label>
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