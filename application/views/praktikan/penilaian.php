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
                  <th scope="col">Modul</th>
                  <th scope="col">Asisten</th>
                  <th scope="col">Laporan</th>
                  <th scope="col">Waktu</th>
                  <th scope="col">Nilai</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Modul</th>
                  <th scope="col">Asisten</th>
                  <th scope="col">Laporan</th>
                  <th scope="col">Waktu</th>
                  <th scope="col">Nilai</th>
                </tr>
              </tfoot>
              <tbody>
                <?php $i = 1;
                foreach ($list as $l) :
                  if ($l['is_acc'] == 0) {
                    $l['nilai'] = NULL;
                  }
                ?>
                  <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $l['modul']; ?></td>
                    <td><?= $l['asisten']; ?></td>
                    <td>
                      <a href="<?= echo base_url . 'praktikan/download/'; ?>" download class="badge badge-pill badge-warning">
                        <i class=" fas fa-fw fa-download"></i>
                        Unduh
                      </a>
                    </td>
                    <td><?= date("Y-m-d H:i:s", $l['laporan_time']); ?></td>
                    <td><?= $l['nilai']; ?></td>
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