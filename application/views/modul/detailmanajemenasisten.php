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
                        <a href="" class="btn gradien mb-3 tombolTambahAsisten" data-id="<?= $no_kelompok ?>" data-toggle="modal" data-target="#TambahAnggota">Tambah Asisten</a>
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($kelompok as $k) : ?>
                                    <tr>

                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $k['nrp'] ?></td>
                                        <td><?= $k['name'] ?></td>
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
                <form action="<?= base_url('modul/tambahasisten') ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" id="id" name="id">
                        <input type="hidden" id="id_modul" name="id_modul" value="<?= $this->uri->segment(2); ?>">
                        <input type="hidden" id="no" name="no" value="<?= $this->uri->segment(3); ?>">
                        <input type="hidden" class="form-control" id="no_kelompok" name="no_kelompok" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="nrp_asisten">NRP</label>
                        <input type="text" class="form-control" id="nrp_asisten" name="nrp" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" disabled>
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