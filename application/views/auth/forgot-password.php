<div class="container">
    <!-- Logo -->
    <img class="logo" src="<?= base_url('/assets/img/password.png'); ?>">

    <!-- Judul -->
    <h4 class="p-3">Formulir Atur Ulang Kata Sandi</h4>

    <!-- Form -->
    <?= $this->session->flashdata('message'); ?>
    <form class="user" method="post" action="<?= base_url('auth/forgotpassword'); ?>">
        <div class="form-group">
            <input type="text" id="email" name="email" style="margin-top: 35px; background-color: #f6f6f6; border-top: 0; border-bottom: 1px solid #6a6a6a; border-left: 1px solid #6a6a6a; border-right: 0;" class="form-control form-control-user" id="email" name="email" value="<?= set_value('email'); ?>" placeholder="Masukkan alamat email">
            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <button type="submit" class="btn" style="display: block; margin: auto; background-color: #6a6a6a; color: white; border-top-left-radius: 25px;
                border-top-right-radius: 25px;
                border-bottom-left-radius: 25px;
                border-bottom-right-radius: 25px;">
            Atur Ulang Kata Sandi
        </button>
    </form>
    <h6 class="text-center pt-4">
        <a href="<?= base_url('auth'); ?>" style="color: #6a6a6a; font-size: small;">Sudah punya akun? Masuk!</a>
    </h6>
    <h6 class="text-center">
        <u><a href="<?= base_url('auth/registration'); ?>" style="color: #6a6a6a; font-size: small;">Daftar Praktikum</a></u>
    </h6>
</div>