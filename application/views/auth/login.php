<div id="particles-js">
    <div class="container" style="position:absolute">
        <!-- Logo -->
        <img class="logo" src="<?php echo base_url(); ?>assets/img/logoits.png" alt="Logo ITS">

        <!-- Judul -->
        <h4 class="pt-3">Praktikum Laboratorium Fisika</h4>
        <h6 class="pb-4">Institut Teknologi Sepuluh Nopember</h6>


        <!-- Form -->
        <?= $this->session->flashdata('message') ?>
        <form class="user" method="post" action="<?= base_url('auth'); ?>">
            <div class="form-group">
                <input class="form-control" type="text" id="nrp" name="nrp" placeholder="NRP" value="<?= set_value('nrp'); ?>" style="margin-top: 35px; background-color: #f6f6f6; border-top: 0; border-bottom: 1px solid #6a6a6a; border-left: 1px solid #6a6a6a; border-right: 0;">
                <?= form_error('nrp', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <input class="form-control" type="password" id="password" name="password" placeholder="Password" style="margin-top: 35px; 
            background-color: #f6f6f6; 
            border-top: 0; 
            border-bottom: 1px solid #6a6a6a; 
            border-left: 1px solid #6a6a6a; 
            border-right: 0;">
                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <button type="submit" class="btn" style="display: block; margin: auto; background-color: #6a6a6a; color: white; border-top-left-radius: 25px;
                border-top-right-radius: 25px;
                border-bottom-left-radius: 25px;
                border-bottom-right-radius: 25px;
                padding-left:15%;
                padding-right:15%">Login
            </button>
        </form>
        <h6 class="text-center pt-4">
            <a href="<?= base_url('auth/forgotpassword'); ?>" style="color: #6a6a6a; font-size: small;">Lupa Password?</a>
        </h6>
        <h6 class="text-center">
            <u><a href="<?= base_url('auth/registration'); ?>" style=" color: #6a6a6a; font-size: small;">Daftar Praktikum</a></u>
        </h6>
    </div>
</div>