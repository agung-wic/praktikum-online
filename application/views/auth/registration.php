<div class="container">
    <!-- Logo -->
    <div class="row-lg justify-content-center my-3 text-center">
        <div class="col-lg big-icon">
            <i class="fas fa-user-plus fa-5x"></i>
        </div>
    </div>
    <!-- Judul -->
    <h4>Formulir Pendaftaran Praktikum</h4>

    <!-- Form -->
    <form class="user" method="post" action="<?= base_url('auth/registration'); ?>">
        <div class="form-group">
            <input class="form-control" type="text" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>" style="margin-top: 35px; background-color: #f6f6f6; border-top: 0px; border-bottom: 1px solid #6a6a6a; border-left: 1px solid #6a6a6a; border-right: 0px;">
            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <input class="form-control" type="text" id="name" name="name" placeholder="Nama" value="<?= set_value('name'); ?>" style="margin-top: 25px; background-color: #f6f6f6; border-top: 0px; border-bottom: 1px solid #6a6a6a; border-left: 1px solid #6a6a6a; border-right: 0px;">
            <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <input class="form-control" type="text" id="nrp" name="nrp" placeholder="NRP" value="<?= set_value('nrp'); ?>" style="margin-top: 25px; background-color: #f6f6f6; border-top: 0px; border-bottom: 1px solid #6a6a6a; border-left: 1px solid #6a6a6a; border-right: 0px;">
            <?= form_error('nrp', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <input class="form-control" type="password" id="password1" name="password1" placeholder="Password" style="margin-top: 25px; background-color: #f6f6f6; border-top: 0px; border-bottom: 1px solid #6a6a6a; border-left: 1px solid #6a6a6a; border-right: 0px;">
            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <input class="form-control" type="password" id="password2" name="password2" placeholder="Konfirmasi Password" style="margin-top: 25px; background-color: #f6f6f6; border-top: 0px; border-bottom: 1px solid #6a6a6a; border-left: 1px solid #6a6a6a; border-right: 0px;">
        </div>
        <div class="p-3"> <button type="submit" class="btn" style="display: block; margin: auto; background: linear-gradient(40deg, rgba(111,140,252,1) 8%, rgba(47,200,201,1) 100%); color: white; border-top-left-radius: 25px;
                border-top-right-radius: 25px;
                border-bottom-left-radius: 25px;
                border-bottom-right-radius: 25px;
                padding-left:15%;
                padding-right:15%">Daftar
            </button>
        </div>
        <h6 class="text-center">
            <u><a href="<?= base_url('auth/login'); ?>" style=" color: #6a6a6a; font-size: small;">Sudah punya akun? Masuk!</a></u>
        </h6>
    </form>
</div>