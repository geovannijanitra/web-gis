<?= $this->extend('admin/layout/template') ?>


<?= $this->section('content') ?>

<div class="panel panel-default">
    <div class="d-sm-flex align-items-center justify-content-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Toko</h1>
    </div>
</div>


<div class="col-sm-5">

    <div class="panel panel-default">
        <div class="panel-heading">
            Data Toko
        </div>
        <div class="panel-body">
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
                <input name="nama_toko" class="form-control" placeholder="Nama Tempat">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input name="alamat" class="form-control" placeholder="Alamat">
            </div>
            <div class="form-group">
                <label>Latitude</label>
                <input name="lat" id="lat" class="form-control" placeholder="Latitude">
            </div>
            <div class="form-group">
                <label>Longitude</label>
                <input name="long" id="long" class="form-control" placeholder="Longitude">
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <input name="deskripsi" class="form-control" placeholder="Deskripsi">
            </div>
            <div class="form-group">
                <label>Foto</label>
                <input type="file" name="foto" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>



            <?php
            echo form_close(); ?>
        </div>
    </div>

</div>

<script>
    var curLocation = [0, 0];
    if (curLocation[0] == 0 && curLocation[1] == 0) {
        curLocation = [-7.961259, 112.625808];
    }

    const map = L.map('map').setView([-7.961259, 112.625808], 14);

    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    // const marker = L.marker([-7.961259, 112.625808]).addTo(map)
    //   .bindPopup('<b>Hello world!</b><br />I am a popup.').openPopup();

    // const circle = L.circle([51.508, -0.11], {
    //   color: 'red',
    //   fillColor: '$fgg',
    //   fillOpacity: 0.5,
    //   radius: 500
    // }).addTo(map).bindPopup('I am a circle.');

    map.attributionControl.setPrefix(false);

    var marker = new L.marker(curLocation, {
        draggable: 'true',
    });

    marker.on('dragend', function(event) {
        var position = marker.getLatLng();
        marker.setLatLng(position, {
            draggable: 'true'
        }).bindPopup(position).update();
        $("#lat").val(position.lat);
        $("#long").val(position.lng).keyup();
    })

    $("#lat, #long").change(function() {
        var position = [parseInt($("#lat").val()), parseInt($('#long').val())];
        marker.setLatLng(position, {
            draggable: 'true'
        }).bindPopup(position).update();
        map.panTo(position);
    });

    map.addLayer(marker);
</script>

<?= $this->endSection() ?>