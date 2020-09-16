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
                                <?php $i = 0;
                                foreach ($modul as $m) :
                                ?>
                                    <?php if ($i % 3 == 0) { ?>
                                        <div class="row">
                                        <?php } ?>
                                        <div class="col-lg-3">
                                            <div class="card border-left-primary shadow h-100 p-2">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-7">
                                                            <?= $m['name']; ?>
                                                        </div>
                                                        <div class="col-lg-auto">
                                                            <div class="h5 font-weight-bold"><?= $m['modul'] ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if ($i % (3 + 3) == 0) { ?>
                                        </div>
                                    <?php } ?>
                                <?php $i++;
                                endforeach; ?>
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