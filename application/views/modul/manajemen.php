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
                        <a href="" class="btn gradien mb-3" data-toggle="modal" data-target="#KelompokAsistenAddFile"><i class="fas fa-file-csv"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="row mx-1">
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                        <div class="row mx-1">
                            <?= $this->session->flashdata('message1'); ?>
                        </div>
                        <?php if (empty($list)) { ?>
                            <div class="alert alert-danger" role="alert">
                                Data not found!
                            </div>
                        <?php } else { ?>
                            <div id="bungkus">
                                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($modul as $m) :
                                        ?>
                                            <tr>
                                                <th scope="row"><?= $i; ?></th>
                                                <td><?= $m['modul'] ?>. <?= $m['name']; ?></td>
                                                <td>
                                                    <a href="<?= base_url('modul/manajemenasisten/') . $m['modul']; ?>" class="badge badge-pill badge-info">
                                                        <i class="fas fa-users"></i>
                                                        Detail
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php $i++;
                                        endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
</div>

<div class="modal fade" id="KelompokAsistenAddFile" tabindex="-1" role="dialog" aria-labelledby="KelompokAsistenAddFileLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="KelompokAsistenAddFileLabel">Unggah Kelompok Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Berkas csv harus memiliki format sebagai berikut:</h6>
                <ol>
                    <li>Kolom pertama = NRP Mahasiswa dengan 0 sebagai angka pertama</li>
                    <li>Kolom kedua = Id Modul</li>
                    <li>Kolom ketiga = Nama Kelompok</li>

                </ol>
                <?= form_open_multipart(base_url('modul/addfilekelompokasisten')) ?>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="filekelompokasisten" name="filekelompokasisten">
                    <label class="custom-file-label" for="filekelompokasisten">Pilih berkas</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>