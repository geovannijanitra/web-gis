<?= $this->extend('admin/layout/template') ?>


<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Alfamart</h6>
        </div>
        <div class="card-body">
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
            echo form_open_multipart('admin/TokoController/update/' . $toko['id']); ?>

            <div class="form-group">
                <label>Nama Tempat</label>
                <input name="nama_toko" value="<?= $toko['nama_toko']; ?>" class="form-control" placeholder="Nama Tempat" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input name="alamat" value="<?= $toko['alamat']; ?>" class="form-control" placeholder="Alamat" autocomplete="off">
            </div>
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
            <div class="form-group">
                <label>Latitude</label>
                <input name="lat" id="lat" value="<?= $toko['lat']; ?>" class="form-control" placeholder="Latitude" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Longitude</label>
                <input name="long" id="long" value="<?= $toko['long']; ?>" class="form-control" placeholder="Longitude" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <input name="deskripsi" value="<?= $toko['deskripsi']; ?>" class="form-control" placeholder="Deskripsi" autocomplete="off">
            </div>
            <div class="form-group">
                <img src="<?= base_url('foto/' . $toko['foto']); ?>" width="100px" alt=""><br>
                <label>Ubah Foto</label>
                <input type="file" name="foto" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>



            <?php
            echo form_close(); ?>
        </div>








        <script>
            var curLocation = [0, 0];
            if (curLocation[0] == 0 && curLocation[1] == 0) {
                curLocation = [<?= $toko['lat']; ?>, <?= $toko['long']; ?>];
            }

            const map = L.map('map').setView([<?= $toko['lat']; ?>, <?= $toko['long']; ?>], 14);

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