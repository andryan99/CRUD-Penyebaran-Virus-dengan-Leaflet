<div id="map" style="height: 500px"></div>

<script>
    var map = L.map('map').setView([-2.408050, 116.931549], 5);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    
    maxZoom: 18,
    id: 'mapbox/dark-v10',
    }).addTo(map);

    
    <?php foreach ($pemetaan as $pmt ) {?>

        L.circle([<?= $pmt->latitude?>, <?= $pmt->longitude?>], 
        {radius: <?=$pmt->radius*500 ?>,
        color: '<?= $pmt->warna?>',
        fillColor: '<?= $pmt->warna?>',
        fillOpacity: 0.5
        }
        
        ).bindPopup("<h5><b>Virus : <?= $pmt->nama_virus?></b><br><br>Wilayah : <?= $pmt->nama_wilayah?><br><br><?= $pmt->provinsi?>, <?= $pmt->kabupaten?>, <?= $pmt->kecamatan?><br><br>Jumlah Korban : <?= $pmt->jml_korban?><br><br>Jumlah Meninggal : <?= $pmt->jml_meninggal?><br><br>Jumlah Sembuh : <?= $pmt->jml_sembuh?></h5>").addTo(map);
  <?php   }?>
    
    
    
</script>