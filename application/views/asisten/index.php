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
                          <a href="<?= base_url('asisten/penilaian/') . $m['modul']; ?>" class="badge badge-pill badge-info">
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