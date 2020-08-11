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
                        <a href="" class="btn btn-primary mb-3 tampilTambahModul" data-toggle="modal" data-target="#BuatModul">Buat Modul</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="row mx-1">

                            <?= $this->session->flashdata('message'); ?>
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
                                                    <a href="<?= base_url('dosen/editModul/') . $m['id']; ?>" class="badge badge-pill badge-primary tampilEditModul" data-id="<?= $m['id']; ?>" data-toggle="modal" data-target="#BuatModul">
                                                        <i class=" fas fa-fw fa-edit"></i>
                                                        Edit
                                                    </a>
                                                    <a href="<?= base_url('dosen/deleteModul/') . $m['id']; ?>" onclick="return confirm('Yakin?');" class="badge badge-pill badge-danger">
                                                        <i class="fas fa-fw fa-trash-alt"></i>
                                                        Delete
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
            <div class="mt-2">
                <?= $this->pagination->create_links(); ?>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
</div>

<div class="modal fade" id="BuatModul" tabindex="-1" role="dialog" aria-labelledby="BuatModulLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="BuatModulLabel">Buat Modul</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('dosen/tambahModul') ?>" method="post">
                    <div class="form-group">
                        <input class="form-control" type="number" name="id" id="id" hidden>
                    </div>
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control edit" id="judul" name="judul">
                    </div>
                    <div class="form-group">
                        <label for="isi">Isi</label>
                        <textarea rows="20" cols="20" id="isi" name="isi" class="form-control edit" style="height:200px"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
            <script>
                tinymce.init({
                    selector: 'textarea'
                });
            </script>
            </form>
        </div>
    </div>
</div>