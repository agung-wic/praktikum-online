<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-5">
      <div class="kotak mt-5">
        <!-- Page Heading -->
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold"><?= $title; ?> Praktikum</h6>
        </div>
        <div class="card-body">
          <div class="row">
            <?= $this->session->flashdata('message'); ?>
            <?= form_open_multipart(base_url('praktikan/uploadlaporan')) ?>
            <div class="col-lg">
              <div class="form-group">
                <input type="text" class="form-control" id="cek" name="cek" value="<?= $cek; ?>" hidden>
                <input type="text" class="form-control" id="cek_modul" name="cek_modul" value="<?= $cek_modul; ?>" hidden>
                <label for="modul">Pilih Modul</label>
                <select <?= ($cek_modul) ? "disabled" : ""; ?> class="form-control" name="modul_id" id="modul_id">
                  <?php if ($cek_modul) {
                    var_dump($cek_modul);
                    die; ?>
                    <option value="<?= $cek_modul ?>" selected><?= $cek_nama_modul['name']; ?></option>
                  <?php } else { ?>
                    <?php foreach ($modul as $m) : ?>
                      <option value="<?= $m['modul'] ?>"><?= $m['name'] ?></option>
                  <?php endforeach;
                  } ?>
                </select>
              </div>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="filelaporan" name="filelaporan">
                <label class="custom-file-label" for="filelaporan">Pilih berkas</label>
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