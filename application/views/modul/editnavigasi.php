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
                    <!-- <div class="col-auto mr-auto">
                        <a href="" class="btn gradien mb-3 tampilTambahModul" data-toggle="modal" data-target="#BuatModul">Buat Modul</a>
                    </div> -->
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
                                                    <a href="<?= base_url('modul/navigasi/') . $m['modul']; ?>" class="badge badge-pill badge-primary tampilEditModul">
                                                        <i class=" fas fa-fw fa-edit"></i>
                                                        Navigasi
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