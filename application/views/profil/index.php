<!-- Begin Page Content -->
<div class="container-fluid">

   <div class="col">
      <div class="row-lg-6">
         <?= $this->session->flashdata('message'); ?>
      </div>
   </div>

   <div class="row justify-content-center mt-5">
      <div class="col-lg-7">
         <div class="kotak">
            <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold"><?= $title; ?></h6>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col">
                     <p class="card-text">Nama :<?= ' ' . $user['name']; ?></p>
                     <p class="card-text">NRP :<?= ' ' . $user['nrp']; ?></p>
                     <p class="card-text">Email :<?= ' ' . $user['email']; ?></p>
                     <p class="card-text">Role :<?= ' ' . $role_id['role']; ?></p>
                     <hr>
                     <p class="card-text"><small class="text-muted">Bergabung sejak <?= date('d F Y', $user['date_created']); ?></small></p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->