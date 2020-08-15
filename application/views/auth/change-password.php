<div id="particles-js">
    <div class="container" style="position:absolute">
        <!-- Logo -->
        <div class="row-lg justify-content-center my-3 text-center">
            <div class="col-lg big-icon">
                <i class="fas fa-key fa-5x"></i>
            </div>
        </div>

        <!-- Judul -->
        <h4 class="p-3">Formulir Perubahan Kata Sandi</h4>

        <!-- Form -->
        <?= $this->session->flashdata('message'); ?>
        <form class="user" method="post" action="<?= base_url('auth/changepassword'); ?>">
            <div class="form-group">
                <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Masukkan kata sandi baru" style="margin-top: 35px; background-color: #f6f6f6; border-top: 0; border-bottom: 1px solid #6a6a6a; border-left: 1px solid #6a6a6a; border-right: 0;">
                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi kata sandi" style="margin-top: 35px; background-color: #f6f6f6; border-top: 0; border-bottom: 1px solid #6a6a6a; border-left: 1px solid #6a6a6a; border-right: 0;">
                <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <button type="submit" class="btn" style="display: block; margin: auto; background-color: #6a6a6a; color: white; border-top-left-radius: 25px;
                border-top-right-radius: 25px;
                border-bottom-left-radius: 25px;
                border-bottom-right-radius: 25px;">
                Ubah Kata Sandi
            </button>
        </form>
    </div>
</div>