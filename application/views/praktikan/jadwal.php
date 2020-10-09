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
              <?= $this->session->flashdata('message'); ?>
            </div>
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
                      <th scope="col">Modul</th>
                      <th scope="col">Jadwal</th>
                      <th scope="col">Keterangan</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Modul</th>
                      <th scope="col">Jadwal</th>
                      <th scope="col">Keterangan</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php $i = 0;
                    $start = 0;
                    foreach ($modul as $m) :
                    ?>
                      <tr>
                        <th scope="row"><?= $start + 1; ?></th>
                        <td><?= $m['name']; ?></td>
                        <?php
                        if ($i < count($list)) {
                          if ($m['modul'] == $list[$i]['modul_id']) { ?>
                            <td><?= str_replace("T", " | ", $list[$i]['jadwal']); ?></td>
                            <td><?php if ($list[$i]['is_approved'] == null) {
                                  echo "";
                                } elseif ($list[$i]['is_approved'] == 1) {
                                  echo "Perubahan Jadwal Disetujui";
                                } elseif ($list[$i]['is_approved'] == 2) {
                                  echo "Perubahan Jadwal Ditolak";
                                } elseif ($list[$i]['is_approved'] == 0) {
                                  echo "Menunggu Persetujuan";
                                }
                                ?></td>
                            <td>
                              <?php $jadwal = strtotime(str_replace("T", " ", $list[$i]['jadwal']));
                              $now = time();
                              if ($jadwal > $now) : ?>
                                <!-- <a href="<?= base_url('praktikan/reqjadwal/') . $list[$i]['id']; ?>" class="badge badge-pill badge-primary reqJadwalPraktikan" data-id="<?= $list[$i]['id']; ?>" data-toggle="modal" data-target="#JadwalEdit">
                                  <i class=" fas fa-fw fa-edit"></i>
                                  Ubah Jadwal
                                </a> -->
                              <?php endif; ?>
                            </td>
                          <?php
                            $i++;
                          } else { ?>
                            <td>Belum ada jadwal</td>
                            <td></td>
                            <td></td>
                          <?php }
                        } else { ?>
                          <td>Belum ada jadwal</td>
                          <td></td>
                          <td></td>
                        <?php } ?>
                      </tr>
                    <?php $start++;
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
  </div>
</div>

<div class="modal fade" id="JadwalEdit" tabindex="-1" role="dialog" aria-labelledby="JadwalEditLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="JadwalEditLabel">Ajukan Perubahan Jadwal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('praktikan/reqjadwal') ?>" method="post">
          <div class="form-group">
            <input class="form-control" type="number" name="id" id="id" hidden>
            <input class="form-control" type="text" name="modul" id="modul" hidden>
          </div>
          <div class="form-group">
            <label for="name">Nama Lengkap</label>
            <input type="text" class="form-control edit" id="name" name="name" readonly>
          </div>
          <div class="form-group">
            <label for="nrp">NRP</label>
            <input type="text" class="form-control edit" id="nrp" name="nrp" readonly>
          </div>
          <div class="form-group">
            <label for="modul">Modul</label>
            <select class="form-control" name="modul_id" id="modul_id" disabled>
              <?php foreach ($modul as $m) : ?>
                <option value="<?= $m['modul'] ?>"><?= $m['name'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="jadwal">Jadwal Lama</label>
            <input type="datetime-local" class="form-control" id="jadwal_old" name="jadwal_old" readonly>
          </div>
          <div class="form-group">
            <label for="jadwal">Jadwal Baru</label>
            <input type="datetime-local" class="form-control" id="jadwal_new" name="jadwal_new">
          </div>
          <div class="form-group">
            <label for="ket">Alasan Pengajuan Perubahan Jadwal</label>
            <input type="text" class="form-control" id="ket" name="ket">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Ajukan</button>
      </div>
      </form>
    </div>
  </div>
</div>