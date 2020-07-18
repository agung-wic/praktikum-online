<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row justify-content-center">
    <div class="col-lg-6">

    </div>
  </div>

  <div class="row justify-content-center mt-5">
    <div class="col-lg-6">
      <div class="kotak">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold"><?= $title; ?></h6>
        </div>
        <div class="card-body ">
          <?= $this->session->flashdata('message'); ?>
          <form action="<?= base_url('profil/changepassword') ?>" method="post">
            <div class="form-group">
              <label for="current_password">Kata Sandi Lama</label>
              <input type="password" class="form-control" id="current_password" name="current_password">
              <?= form_error('current_password', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="new_password1">Kata Sandi Baru</label>
              <input type="password" class="form-control" id="new_password1" name="new_password1">
              <?= form_error('new_password1', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="new_password2">Ulangi Kata Sandi</label>
              <input type="password" class="form-control" id="new_password2" name="new_password2">
              <?= form_error('new_password2', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group mt-5">
              <button type="submit" class="btn" style="background-color: #707070; color:white">Ubah Kata Sandi</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->