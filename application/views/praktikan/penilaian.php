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
                  <th scope="col">Waktu Unggah</th>
                  <th scope="col">Nilai</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Modul</th>
                  <th scope="col">Asisten</th>
                  <th scope="col">Laporan</th>
                  <th scope="col">Waktu Unggah</th>
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
                    <td><?= $m['name']; ?></td>
                    <?php if ($i < count($list)) {
                      if ($m['modul'] == $list[$i]['modul_id']) {
                    ?>
                        <td><?= $list[$i]['asisten']; ?></td>
                        <td>
                          <a href="<?= base_url('praktikan/unduh/') . $list[$i]['laporan']; ?>" class="badge badge-pill badge-warning">
                            <i class=" fas fa-fw fa-download"></i>
                            Unduh
                          </a>
                        </td>
                        <td><?= date("Y-m-d H:i:s", $list[$i]['laporan_time']); ?></td>
                        <?php if ($list[$i]['is_acc'] == 1) { ?>
                          <td><a href="#" class="badge badge-pill badge-primary tampilDetailNilai" data-role="praktikan" data-id="<?= $list[$i]['id']; ?>" data-toggle="modal" data-target="#NilaiEdit">
                              <i class=" fas fa-fw fa-info"></i>
                              Detail
                            </a>
                          </td>
                        <?php }
                        $i++;
                      } else { ?>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      <?php }
                    } else { ?>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    <?php } ?>
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


<div class="modal fade" id="NilaiEdit" tabindex="-1" role="dialog" aria-labelledby="NilaiEditLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="NilaiEditLabel">Edit Nilai Praktikan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('asisten/editnilai') ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input class="form-control" type="text" name="id" id="id" hidden>
            <input class="form-control" type="text" name="modul_id" id="modul_id" hidden>
          </div>
          <div class="form-group hapus">
            <label for="name">Nama Lengkap</label>
            <input type="text" class="form-control " id="name" name="name" disabled>
          </div>
          <div class="form-group hapus">
            <label for="nrp">NRP</label>
            <input type="text" class="form-control " id="nrp" name="nrp" disabled>
          </div>
          <div class="form-group hapus">
            <label for="modul">Modul</label>
            <input type="text" class="form-control " id="modul" name="modul" disabled>
          </div>
          <div class="form-group">
            <label for="resume">Resume</label>
            <input type="number" min="0" max="25" class="form-control" id="resume" name="resume">
          </div>
          <div class="form-group">
            <label for="pretest">Pretest</label>
            <input type="number" min="0" max="5" class="form-control" id="pretest" name="pretest">
          </div>
          <div class="form-group">
            <label for="uji_lisan">Uji Lisan</label>
            <input type="number" min="0" max="10" class="form-control" id="uji_lisan" name="uji_lisan">
          </div>
          <div class="form-group">
            <label for="praktikum">Praktikum</label>
            <input type="number" min="0" max="10" class="form-control" id="praktikum" name="praktikum">
          </div>
          <div class="form-group">
            <label for="postest">Postest</label>
            <input type="number" min="0" max="5" class="form-control" id="postest" name="postest">
          </div>
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="laporan">Laporan</label>
                <div class="row">
                  <div class="col-3">
                    <span>Format</span>
                  </div>
                  <div class="col-auto">
                    <input type="number" min="0" max="10" class="form-control mb-1" id="format" name="format" placeholder="Format Penulisan">
                  </div>
                </div>
                <div class="row">
                  <div class="col-3">
                    <span>Bab</span>
                  </div>
                  <div class="col-auto">
                    <input type="number" min="0" max="25" class="form-control mb-1" id="bab" name="bab" placeholder="Bab 3, 3, 4">
                  </div>
                </div>
                <div class="row">
                  <div class="col-3">
                    <span>Kesimpulan</span>
                  </div>
                  <div class="col-auto">
                    <input type="number" min="0" max="10" class="form-control" id="kesimpulan" name="kesimpulan" placeholder="Kesimpulan">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="laporan">Nilai Akhir</label>
                <div class="row">
                  <div class="col-auto">
                    <input type="number" min="0" max="100" class="form-control mb-1" id="nilai_akhir" name="nilai_akhir" disabled>
                  </div>
                </div>
                <div class="row">
                  <div class="col-auto">
                    <input type="text" class="form-control mb-1" id="nilai_akhir_abjad" name="nilai_akhir_abjad" disabled>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Edit</button>
        </div>
      </form>
    </div>
  </div>
</div>