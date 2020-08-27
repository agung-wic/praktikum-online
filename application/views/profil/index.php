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
                     <img class="my-3" name="main" style="display: block; margin: auto; background-color: #6a6a6a; color: white; border-top-left-radius: 25px;
                border-top-right-radius: 25px;
                border-bottom-left-radius: 25px;
                border-bottom-right-radius: 25px;" id="main" width="85%%" src="http://10.122.10.43:8081/">
                     <p class="card-text">Nama :<?= ' ' . $user['name']; ?></p>
                     <p class="card-text">NRP :<?= ' ' . $user['nrp']; ?></p>
                     <p class="card-text">Email :<?= ' ' . $user['email']; ?></p>
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