<?= $this->extend('admin/layout/template') ?>


<?= $this->section('content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

<h1 class="h3 mb-2 text-gray-800">Peta</h1>
<p class="mb-4">Peta adalah gambaran permukaan bumi yang ditampilkan pada suatu bidang datar dengan skala tertentu. Peta bisa disajikan dalam berbagai cara yang berbeda, mulai dari peta konvensional yang tercetak hingga peta digital yang tampil di layar komputer. </p>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Denah Alfamart</h6>
    </div>
    <div class="card-body">
    <div id="map" style=" height: 500px;"></div>
                <script>
                    const map = L.map('map').setView([-7.961334, 112.640194], 13);
                    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 19,
                        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                    }).addTo(map);
                    var Myicon = L.icon({
                        iconUrl: '<?= base_url('icon/toko.png') ?>',
                        iconSize: [30, 30],
                    });
                    <?php foreach ($toko as $key => $value) { ?>
                        var marker = L.marker([<?= $value['lat'] ?>, <?= $value['long'] ?>]).addTo(map).bindPopup(
                        '<center><h6><b><?= $value['nama_toko'] ?></b></h6></center><br>' +
                        "<center><img src='<?= base_url('foto/' . $value['foto']) ?>' width='200px'><br/></center>" +
                        "<h6>Alamat: <?= $value['alamat'] ?></h6>");
                        <?php } ?>
                </script>
    </div>
</div>

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
                        <td><img src="<?php echo base_url('foto/'. $value['foto']);?>" width="100px" alt=""></td>
                        <!-- <td><img src="<?php echo base_url('foto/'. $value['foto']);?>" width="100px" alt=""></td> -->
                        <td><?= $value['deskripsi']; ?></td>
                        </tr>
                    <?php  } ?>
            </tbody>
        </div>
    </div>
</div>





    <!-- Page Heading -->

    <!-- Content Row (Buat row baru di bawah row ini kalo mau nambah baris konten baru) -->

</div>
<!-- End of Main Content -->

<?= $this->endSection() ?>