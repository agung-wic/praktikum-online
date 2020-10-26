<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10  align-self-center">
            <div class="kotak mt-5 p-5">
                <!-- Page Heading -->
                <h1 class="mt-2 mb-5" style="text-align: center;"><?= $title  ?></h1>
                <?php $i = 0;
                $a = 0;
                foreach ($modul as $m) : ?>
                    <div class="card pb-2">
                        <a style="border: none;text-decoration: none;" href="<?= base_url() ?>asisten/absen/<?= $m['modul']; ?>" class="card-header gradien_modul py-3">
                            <h2 class="mb-0">
                                <div class="btn-block text-left collapsed" style="font-size: large; " type="button">
                                    <strong><?= $m['modul'] ?></strong> . <?= $m['name']; ?>
                                </div>
                            </h2>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
</div>