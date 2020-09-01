<div class="container-fluid">


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="kotak">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold "><?= $title; ?> </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div class="row mx-1">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-1 mt-2">
                                    <label for="show">Show</label>
                                </div>
                                <div class="col-md-2">
                                    <select class="custom-select" name="show" id="show">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="40">40</option>
                                        <option value="50">50</option>
                                    </select>
                                </div>
                                <div class="col-md-2 mt-2">Entries</div>
                            </div>
                        </div>
                        <div class="col-md-5 ml-auto">
                            <form action="<?= base_url('admin') ?>" method="post">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="keyword" placeholder="Cari...">
                                    <div class="input-group-append">
                                        <button class="btn gradien" type="submit"><i class="fas fa-fw fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                    <?php if (empty($list)) { ?>
                        <div class="alert alert-danger" role="alert">
                            Data not found!
                        </div>
                    <?php } else { ?>
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">NRP</th>
                                    <th scope="col">Modul</th>
                                    <th scope="col">Asisten</th>
                                    <th scope="col">Laporan</th>
                                    <th scope="col">Waktu</th>
                                    <th scope="col">Nilai</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">NRP</th>
                                    <th scope="col">Modul</th>
                                    <th scope="col">Asisten</th>
                                    <th scope="col">Laporan</th>
                                    <th scope="col">Waktu</th>
                                    <th scope="col">Nilai</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $i = 1;
                                foreach ($list as $l) :
                                ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $l['name_praktikan']; ?></td>
                                        <td><?= $l['nrp']; ?></td>
                                        <td><?= $l['modul']; ?></td>
                                        <td><?= $l['asisten']; ?></td>
                                        <td>
                                            <a href="<?= base_url('assets/laporan/') . $l['laporan']; ?>" download class="badge badge-pill badge-warning">
                                                <i class=" fas fa-fw fa-download"></i>
                                                Unduh
                                            </a>
                                        </td>
                                        <td><?= date("Y-m-d H:i:s", $l['laporan_time']); ?></td>
                                        <td><?= $l['nilai']; ?></td>
                                        <td>
                                            <?php if ($l['is_acc'] == 0) { ?>
                                                <a href="<?= base_url('dosen/editnilai/') . $l['id']; ?>" class="badge badge-pill badge-primary tampilModalNilaiDosen" data-id="<?= $l['id']; ?>" data-toggle="modal" data-target="#NilaiEdit">
                                                    <i class=" fas fa-fw fa-edit"></i>
                                                    Edit
                                                </a>
                                                <a href="<?= base_url('dosen/accnilai/') . $l['id']; ?>" class="badge badge-pill badge-success">
                                                    <i class="far fa-check-square"></i>
                                                    Acc
                                                </a>
                                            <?php } else { ?>
                                                <span class="badge badge-pill badge-secondary"><i class="fas fa-fw fa-edit"></i>Edit</span>
                                                <span class="badge badge-pill badge-secondary"><i class="far fa-check-square"></i>Acc</span>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php $i++;
                                endforeach; ?>
                            </tbody>
                        </table>
                    <?php } ?>
                    <div class="mt-2">
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
</div>

<div class="modal fade" id="NilaiEdit" tabindex="-1" role="dialog" aria-labelledby="NilaiEditLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="NilaiEditLabel">Edit Nilai Praktikan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('dosen/editnilai') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" type="text" name="id" id="id" hidden>
                        <input class="form-control" type="text" name="modul_id" id="modul_id" hidden>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nrp">NRP</label>
                        <input type="text" class="form-control" id="nrp" name="nrp" readonly>
                    </div>
                    <div class="form-group">
                        <label for="modul">Modul</label>
                        <input type="text" class="form-control" id="modul" name="modul" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nilai">Nilai</label>
                        <input type="number" min="0" max="100" class="form-control" id="nilai" name="nilai">
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