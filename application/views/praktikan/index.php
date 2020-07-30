<div class="container">

    <div class="kotak mt-5">
        <!-- Page Heading -->
        <img class="mx-auto d-block pt-5" src="<?php echo base_url(); ?>assets/img/logoits.png" alt="Logo ITS" width="150px">

        <h1 class=" m-0 font-weight-bold text-center pt-5"><?= $title; ?></h1>
        <!-- Page Content -->
        <section class="py-5">
            <div class="container">
                <?php $i = 1;
                foreach ($pengumuman as $l) :
                ?>
                    <!-- <tr>
                        <th><?= $l['judul']; ?></th>
                        <td><?= $l['isi']; ?></td>
                        <td><?= $l['name']; ?></td>
                    </tr> -->
                    <div class="card" style="width: auto;">
                        <div class="card-body">
                            <h2 class="card-title text-center p-3 pb-4"><?= $l['judul']; ?></h2>
                            <p class="card-text"><?= $l['isi']; ?></p>
                        </div>
                    </div>
                    <div class="card-footer .bg-secondary" style="background-color:darkgray">
                        <small style="color:white">Diumukan pada tanggal <?= date('d F Y', $l['tanggal']) ?> Oleh </small>
                        <b style="color:white"><?= $l['name'] ?></b>
                    </div>
                    <br>
                <?php $i++;
                endforeach; ?>
            </div>
        </section>
    </div>
</div>