<?= $this->extend('admin/layout/template') ?>


<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Alfamart</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target='#newModal'>
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Baru</a>
    </div>
    <p class="mb-4"> sebuah perusahaan perdagangan ritel yang berkantor pusat di Tangerang. Untuk mendukung kegiatan bisnisnya, hingga akhir tahun 2020, perusahaan ini memiliki 32 pusat distribusi dan 15.400 minimarket yang tersebar di seluruh Indonesia. </p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Alfamart</h6>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Toko</th>
                            <th>Alamat</th>
                            <th>Foto</th>
                            <th>Deskripsi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($toko as $key => $value) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value['nama_toko']; ?></td>
                                <td><?= $value['alamat']; ?></td>
                                <td><img src="<?php echo base_url('foto/' . $value['foto']); ?>" width="100px" alt=""></td>
                                <!-- <td><img src="<?php echo base_url('foto/' . $value['foto']); ?>" width="100px" alt=""></td> -->
                                <td><?= $value['deskripsi']; ?></td>
                                <td>
                                    <a href="<?= base_url('admin/TokoController/edit/' . $value['id']); ?>" type="button" class="btn btn-warning btn-circle"><i class="fas fa-wrench"></i></a>
                                    <p></p>
                                    <a href="<?= base_url('admin/TokoController/delete/' . $value['id']); ?>" type="button" class="btn btn-danger btn-circle" onclick="return confirm('Apakah Yakin Ingin Hapus Data??')"><i class="fas fa-trash"></i></a>
                                </td>
                            <?php  } ?>
                    </tbody>
            </div>
        </div>
    </div>

</div>

<!-- Modal-->
<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Alfamart</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <?php

                $errors = session()->getFlashdata('errors');
                if (!empty($errors)) {
                ?>
                    <div class="alert alert-danger">
                        !!! Ada Kesalahan Input Data:
                        <ul>
                            <?php foreach ($errors as $key => $error) { ?>
                                <li><?= esc($error) ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>



                <?php
                echo form_open_multipart('toko/save'); ?>

                <div class="form-group">
                    <label>Nama Tempat</label>
                    <input name="nama_toko" class="form-control" placeholder="Nama Tempat" autocomplete="off">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input name="alamat" class="form-control" placeholder="Alamat" autocomplete="off">
                </div>
                <div class="form-group">
                    <label>Peta</label>
                    <div id="map" style=" height: 300px;">
                        <script>
                            const map = L.map('map').setView([-7.981334, 112.630194], 13);
                            const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                maxZoom: 19,
                                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                            }).addTo(map);
                            var Myicon = L.icon({
                                iconUrl: '<?= base_url('icon/toko.png') ?>',
                                iconSize: [30, 30],
                            });
                            map.on('click', function(e) {
                                $(".leaflet-marker-icon").remove();
                                $(".leaflet-marker").remove();
                                $(".leaflet-popup").remove();
                                $(".leaflet-popup-pane").remove();
                                var marker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map)
                                document.getElementById("lat").value = e.latlng.lat;
                                document.getElementById("long").value = e.latlng.lng;
                            });
                            $('#newModal').on('shown', function() {
                                setTimeout(function() {
                                    map.invalidateSize();
                                }, 100)
                            });
                        </script>
                    </div>
                </div>
                <div class="form-group">
                    <label>Latitude</label>
                    <input name="lat" id="lat" class="form-control" placeholder="Latitude" autocomplete="off">
                </div>
                <div class="form-group">
                    <label>Longitude</label>
                    <input name="long" id="long" class="form-control" placeholder="Longitude" autocomplete="off">
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <input name="deskripsi" class="form-control" placeholder="Deskripsi" autocomplete="off">
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control">
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                </div>


                <?php
                echo form_close(); ?>
            </div>

        </div>
    </div>
</div>

</div>
<?= $this->endSection() ?>