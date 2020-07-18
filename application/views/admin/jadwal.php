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
            <a href="" class="btn btn-primary mb-3 tampilTambahJadwal" data-toggle="modal" data-target="#JadwalEdit">Tambah Jadwal Baru</a>
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
              <div class="col-md-5 ml-auto">
                <form action="<?= base_url('admin/jadwal') ?>" method="post">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Cari  ...">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="submit" id="cari-jadwal"><i class="fas fa-fw fa-search"></i></button>
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
              <div id="bungkus">

                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama</th>
                      <th scope="col">NRP</th>
                      <th scope="col">Modul</th>
                      <th scope="col">Jadwal</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama</th>
                      <th scope="col">NRP</th>
                      <th scope="col">Modul</th>
                      <th scope="col">Jadwal</th>
                      <th scope="col">Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php $i = 1;
                    foreach ($list as $l) :
                    ?>
                      <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $l['name']; ?></td>
                        <td><?= $l['nrp']; ?></td>
                        <td><?= $l['modul']; ?></td>
                        <td><?= str_replace("T", " | ", $l['jadwal']); ?></td>
                        <td>
                          <a href="<?= base_url('admin/editjadwal/') . $l['id']; ?>" class="badge badge-pill badge-primary tampilEditJadwal" data-id="<?= $l['id']; ?>" data-toggle="modal" data-target="#JadwalEdit">
                            <i class=" fas fa-fw fa-edit"></i>
                            Edit
                          </a>
                          <a href="<?= base_url('admin/deletejadwal/') . $l['id']; ?>" onclick="return confirm('Yakin?');" class="badge badge-pill badge-danger">
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

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->
</div>

<div class="modal fade" id="JadwalEdit" tabindex="-1" role="dialog" aria-labelledby="JadwalEditLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="JadwalEditLabel">Edit Jadwal Praktikan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('admin/editjadwal') ?>" method="post">
          <div class="form-group">
            <input class="form-control" type="number" name="id" id="id" hidden>
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
            <select class="form-control" name="modul" id="modul">
              <?php var_dump($modul);
              foreach ($modul as $m) : ?>
                <option value="<?= $m['modul'] ?>"><?= $m['name'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="jadwal">Jadwal</label>
            <input type="datetime-local" class="form-control" id="jadwal" name="jadwal">
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