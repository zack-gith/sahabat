<?= $this->extend('layout/templatel') ?>
<?= $this->section('content'); ?>
<div class="container">

    <div class="section-headers">
        <h3 class="section-titles mb-3"><img src="<?= base_url(); ?>/assets/img/icon/dishub.png" style="width:60px;" alt="IMG"></h3>
        <h3 class="section-titles">Dokumen Permohonan Pertimbangan Teknis </h3>
        <h3 class="section-titles">Izin Penyelenggaraan Angkutan Orang Dalam Trayek AKDP</h3>
        <?php
        if ($step4['status'] == 1) {
            $tatus = "Pengurusan Baru";
        }
        if ($step4['status'] == 2) {
            $tatus = "Perpanjangan";
        }
        ?>
        <h3 class="section-titles text-danger">(<?= $tatus ?>)</h3>
    </div>

    <!-- step -->
    <div class="row" style="margin-bottom:-30px;">
        <div class="col-md-12">

            <ul class="stepper stepper-horizontal">

                <li class="secondary wow fadeInLeft">
                    <a href="/rekomendasi/step11/<?= $step4['kode_booking'] ?>">
                        <span class="circle">1</span>
                        <span class="label">Step 1</span>
                    </a>
                </li>

                <li class="secondary wow fadeInLeft">
                    <a href="/rekomendasi/step2/<?= $step4['kode_booking'] ?>">
                        <span class="circle">2</span>
                        <span class="label">Step 2</span>
                    </a>
                </li>

                <li class="secondary wow fadeInLeft">
                    <a href="/rekomendasi/step3/<?= $step4['kode_booking'] ?>">
                        <span class="circle">3</span>
                        <span class="label">Step 3</span>
                    </a>
                </li>

                <li class="warning wow fadeInLeft">
                    <a href="#">
                        <span class="circle">4</span>
                        <span class="label">Step 4</span>
                    </a>
                </li>

                <li class="secondary wow fadeInLeft">
                    <a href="/rekomendasi/step5/<?= $step4['kode_booking'] ?>">
                        <span class="circle">5</span>
                        <span class="label">Step 5</span>
                    </a>
                </li>

                <li class="secondary wow fadeInLeft">
                    <a href="/rekomendasi/step6/<?= $step4['kode_booking'] ?>">
                        <span class="circle">6</span>
                        <span class="label">Step 6</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>

    <div class="row mb-5 wow fadeInRight">
        <div class="col-sm-12 mb-3 mb-md-0">
            <div class="cards px-4 pt-3">
                <div class="card-body">
                    <h4 class="text-dark font-weight-bold card-title">Step 4 - Buku KIR </h4>
                    <p class="card-text">Isi data sesuai dengan dokumen yang di upload</p>

                    <!-- Form -->
                    <form method="POST" class="needs-validation md-form text-left" style="color: #757575;" action="/rekomendasi/update4/<?= $step4['id'] ?>" enctype="multipart/form-data" novalidate>

                        <input name="img_kir_lama" type="hidden" value="<?= $step4['img_kir'] ?>">
                        <input name="kode_booking" type="hidden" value="<?= $step4['kode_booking'] ?>">

                        <div class="file-field">
                            <div class="btn btn-primary btn-sm float-left">
                                <span><i class="fa fa-image mr-1"></i> Pilih File Dokumen</span>
                                <input type="file" name="img_kir" id="uploadImage" onchange="PreviewImage()">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Buku KIR" value="<?= $step4['img_kir'] ?>">
                            </div>
                            <div class="kacili" style="margin-left:160px;">
                                <?= $validation->getError('img_kir') ?>
                            </div>
                        </div>


                        <?php
                        if ($step4['img_kir']) {
                            $img = $step4['img_kir'];
                        } else {
                            $img = "default.png";
                        }
                        ?>

                        <div class="md-form">
                            <img id="uploadPreview" src="<?= base_url(); ?>/img/img_kir/<?= $img ?>" style="width:250px;" alt="IMG">
                            <label for="form1"></label>
                        </div>

                        <div class="md-form">
                            <input name="nomor_kir" type="text" id="form2" class="form-control" value="<?= $step4['nomor_kir'] ?>" required>
                            <label for="form2">Nomor KIR</label>
                            <div class="invalid-feedback">
                                Nomor KIR harus di isi
                            </div>
                        </div>

                        <div class="md-form form-row">
                            <div class="col">
                                <input name="kapasitas_angkutan" type="number" id="form2" class="form-control" value="<?= $step4['kapasitas_angkutan'] ?>" required>
                                <label for="form2">Daya Angkut</label>
                                <div class="invalid-feedback">
                                    Kapasitas angkutan harus di isi
                                </div>
                            </div>
                            <div class="col">
                                <label for="form2">Orang</label>
                                <div class="invalid-feedback">
                                    Kapasitas angkutan harus di isi
                                </div>
                            </div>
                            <div class="col">
                                <input name="kapasitas_angkutan1" type="number" id="form2" class="form-control" value="<?= $step4['kapasitas_angkutan'] ?>" required>
                                <label for="form2">Daya Angkut</label>
                                <div class="invalid-feedback">
                                    Kapasitas angkutan harus di isi
                                </div>
                            </div>
                            <div class="col">
                                <label for="form2">Kg Barang</label>
                                <div class="invalid-feedback">
                                    Kapasitas angkutan harus di isi
                                </div>
                            </div>
                        </div>

                        <div class="md-form mt-5">
                            <input name="uji_berkala_berlaku" placeholder="Uji berkala berlaku sampai dengan" type="text" id="date-picker-example" class="form-control datepicker" value="<?= $step4['uji_berkala_berlaku'] ?>" required>
                            <label for="date-picker-example">Uji berkala berlaku sampai dengan</label>
                            <div class="invalid-feedback">
                                Uji berkala berlaku harus di isi
                            </div>
                        </div>

                        <div class="buttons mt-5">
                            <button type="button" class="btn btn-md btn-dark"><i class="fa fa-arrow-left mr-1"></i> Sebelumnya</button>
                            <button type="submit button" class="btn btn-md btn-primary">Simpan & Lanjutkan <i class="fa fa-arrow-right ml-1"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?= $this->endSection(); ?>