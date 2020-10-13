<div class="container-fluid">


  <!-- Begin Page Content -->
  <div class="container-fluid">
    <div class="kotak">
      <div class="card-header">
        <div class="row">
          <div class="col">
            <h6 class="m-0 font-weight-bold "><?= $title; ?></h6>
            <?= $this->session->flashdata('message1'); ?>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <?php if (empty($list)) { ?>
              <div class="alert alert-danger" role="alert">
                Data not found!
              </div>
            <?php } else { ?>
              <div id="bungkus">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama</th>
                      <th scope="col">NRP</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama</th>
                      <th scope="col">NRP</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php $i = 1;
                    foreach ($list as $l) : ?>
                      <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><?= $l['name']; ?></td>
                        <td><?= $l['nrp']; ?></td>
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
  </div>
</div>