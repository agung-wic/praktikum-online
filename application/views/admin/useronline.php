<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="kotak">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold "><?= $title; ?></h6>
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
                                    <input type="text" class="form-control" name="keyword" placeholder="Cari user...">
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
                                    <th scope="col">Email</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">NRP</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $i = 1;
                                foreach ($list as $l) :
                                ?>
                                    <tr>
                                        <th scope="row"><?= $start + 1; ?></th>
                                        <td><?= $l['name']; ?></td>
                                        <td><?= $l['nrp']; ?></td>
                                        <td><?= $l['email']; ?></td>
                                        <td><i class="fas fa-circle" style="color:#2ec1ac"></i></td>
                                    </tr>
                                <?php $start++;
                                endforeach; ?>
                            </tbody>
                        </table>
                    <?php } ?>
                    <div class="mt-2">
                        <?= $this->pagination->create_links(); ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->