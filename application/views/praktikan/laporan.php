<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-5">
      <div class="kotak mt-5">
        <!-- Page Heading -->
        <form action="<?= base_url('praktikan/uploadlaporan/') ?>" method="post">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold"><?= $title; ?> Praktikum</h6>
          </div>
          <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
            <div class="row">
              <div class="col-lg">
                <div class="form-group">
                  <input type="text" class="form-control" id="cek" name="cek" value="<?= $cek; ?>" hidden>
                  <input type="text" class="form-control" id="cek_modul" name="cek_modul" value="<?= $cek_modul; ?>" hidden>
                </div>
                <div class="form-group">
                  <label for="modul_id">Pilih Modul</label>
                  <select class="form-control" name="modul_id" id="modul_id">
                    <?php foreach ($modul as $m) : ?>
                      <option value="<?= $m['modul'] ?>"><?= $m['name'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control " id="link" name="link" placeholder="Tulis link laporan...">
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="row justify-content-end">
              <div class="form-group">
                <div class="col-lg">
                  <button type="submit" class="btn gradien">Unggah</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>