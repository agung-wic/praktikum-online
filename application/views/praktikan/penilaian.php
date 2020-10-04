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
                <?php $i = 0;
                $start = 1;
                foreach ($modul as $m) :

                ?>
                  <tr>
                    <th scope="row"><?= $start; ?></th>
                    <td><?= $m['modul']; ?></td>
                    <?php if ($i < count($list)) {
                      if ($list[$i]['is_acc'] == 0) {
                        $list[$i]['nilai'] = NULL;
                      }
                      if ($m['id'] == $list[$i]['modul_id']) { ?>
                        <td><?= $list[$i]['asisten']; ?></td>
                        <td>
                          <a href="<?= base_url('assets/laporan/') . $list[$i]['laporan']; ?>" download class="badge badge-pill badge-warning">
                            <i class=" fas fa-fw fa-download"></i>
                            Unduh
                          </a>
                        </td>
                        <td><?= date("Y-m-d H:i:s", $llist[$i]['laporan_time']); ?></td>
                        <td><?= $llist[$i]['nilai']; ?></td>
                      <?php $i++;
                      } else { ?>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    <?php }
                    } ?>
                  </tr>
                <?php $start++;
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