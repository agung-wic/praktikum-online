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
                                    <th scope="col">Nama</th>
                                    <th scope="col">NRP</th>
                                    <th scope="col">Asisten</th>
                                    <th scope="col">Laporan</th>
                                    <th scope="col">Waktu</th>
                                    <th scope="col">Nilai</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Acc</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">NRP</th>
                                    <th scope="col">Asisten</th>
                                    <th scope="col">Laporan</th>
                                    <th scope="col">Waktu</th>
                                    <th scope="col">Nilai</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Acc</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($list as $k) : ?>
                                    <tr>

                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $k['name_praktikan'] ?></td>
                                        <td><?= $k['nrp']; ?></td>
                                        <td><?= $k['asisten']; ?></td>
                                        <td>
                                            <?php if ($k['laporan'] != NULL) { ?>
                                                <a href="<?= $k['laporan']; ?>" target="_blank" class="badge badge-pill badge-warning">
                                                    <i class=" fas fa-fw fa-download"></i>
                                                    Unduh
                                                </a>
                                            <?php } ?>
                                        </td>
                                        <td><?= ($k['laporan_time'] != NULL) ? date("Y-m-d H:i:s", $k['laporan_time']) : ""; ?></td>
                                        <td><a href="#" class="badge badge-pill badge-primary tampilDetailNilai" data-role="<?= $cekrole ?>" data-id="<?= $k['id']; ?>" data-toggle="modal" data-target="#NilaiEdit">
                                                <i class=" fas fa-fw fa-info"></i>
                                                Detail
                                            </a>
                                        </td>
                                        <td><a href="<?= base_url('asisten/editnilai/') . $k['id'] . "/" . $id_kelompok ?>" class="badge badge-pill badge-primary tampilModalNilai" data-id="<?= $k['id']; ?>" data-toggle="modal" data-target="#NilaiEdit">
                                                <i class=" fas fa-fw fa-edit"></i>
                                                Edit
                                            </a>
                                            <a href="<?= base_url('asisten/accnilai/') . $k['id'] . "/" . $id_kelompok  ?>" class="badge badge-pill badge-success">
                                                <i class="far fa-check-square"></i>
                                                Acc
                                            </a>
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