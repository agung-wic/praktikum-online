<div class="container">
  <div class="col-lg-7">
    <div class="kotak mt-5">
      <!-- Page Heading -->
      <h1 class="mt-2 mb-5" style="text-align: center;"><?= $title ?></h1>

      <?= form_open_multipart(base_url('praktikan/uploadlaporan')) ?>

      <div class="form-group">
        <label for="modul">Pilih Modul</label>
        <select class="form-control" name="modul_id" id="modul_id">
          <?php foreach ($modul as $m) : ?>
            <option value="<?= $m['modul'] ?>"><?= $m['name'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="filelaporan" name="filelaporan">
        <label class="custom-file-label" for="filelaporan">Pilih berkas</label>
      </div>
      </form>
    </div>
  </div>
</div>