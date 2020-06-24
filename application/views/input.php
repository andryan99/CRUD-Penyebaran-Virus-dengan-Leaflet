<div class="col-sm-7">

<div class="progress progress-striped active">
  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="99" aria-valuemin="0" aria-valuemax="100" style="width:100%">
    <span class="sr-only">100% Complete (success)</span>
  </div>
</div>


<div id="map" style="height: 500px"></div>

</div>
<div class="col-sm-5">

<?php if ($this->session->flashdata('pesan')){?>
    <div class="alert alert-info alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <?php echo $this->session->flashdata('pesan');?>
    
</div>
<?php 
}
?>

<?php echo form_open('home/input')?>


    <div class="form-group">
        <label>Nama Wilayah</label>
        <input name="nama_wilayah" class="form-control" placeholder="Nama Wilayah" required>
     
     </div>
  
     <div class="form-group">
        <label>Provinsi</label>
        <input name="provinsi" class="form-control" placeholder="Provinsi" required>
     
     </div>

     <div class="form-group">
        <label>Kabupaten/Kota</label>
        <input name="kabupaten" class="form-control" placeholder="Kabupaten" required>
     
     </div>

     <div class="form-group">
        <label>Kecamatan</label>
        <input name="kecamatan" class="form-control" placeholder="Kecamatan" required>
     
     </div>

     <div class="form-group">
        <label>Nama Virus </label>
        <input name="nama_virus" class="form-control" placeholder="Nama Virus " required>
     
     </div>

     <div class="col-sm-4">
     <div class="form-group">
        <label>Korban</label>
        <input name="jml_korban" class="form-control" placeholder="Jumlah " required>
     </div>
     </div>
     

     <div class="col-sm-4">
     <div class="form-group">
        <label>Meninggal</label>
        <input name="jml_meninggal" class="form-control" placeholder="Jumlah " required>
        </div>
     </div>

     <div class="col-sm-4">
     <div class="form-group">
        <label>Sembuh</label>
        <input name="jml_sembuh" class="form-control" placeholder="Jumlah " required>
        </div>
     </div>

     <div class="col-sm-6">
     <div class="form-group">
        <label>Latitude</label>
        <input name="latitude" id="Latitude" class="form-control" placeholder="Latitude" required readonly>
        </div>
     </div>

     <div class="col-sm-6">
     <div class="form-group">
        <label>Longitude</label>
        <input name="longitude" id="Longitude" class="form-control" placeholder="Longitude" required readonly>
        </div>
     </div>

     <div class="col-sm-6">
     <div class="form-group">
        <label>Radius</label>
        <select name="radius"  class="form-control">
            <option value="10">10</option>
            <option value="50">50</option>
            <option value="100">100</option>
            <option value="150">150</option>
            <option value="200">200</option>
        </select>
        </div>
     </div>

     <div class="col-sm-6">
     <div class="form-group">
        <label>Warna</label>
        <select name="warna"  class="form-control">
            <option value="red">Merah</option>
            <option value="blue">Biru</option>
            <option value="yellow">Kuning</option>
            <option value="green">Hijau</option>
            
        </select>
        </div>
     </div>

     <div class="form-group">
    <button type="submit" class="btn btn-primary"><i class="fa fa-save">  Simpan</i></button> &nbsp;&nbsp;&nbsp;
    <button type="reset" class="btn btn-warning"><i class="fa fa-pencil">  Reset</i></button>
     </div>


 <?php echo form_close()?>
</div>

<script>

var curLocation=[0,0];
if (curLocation[0]==0 && curLocation[1]==0) {
	curLocation =[-2.408050, 116.931549];	
}

    var map = L.map('map').setView([-2.408050, 116.931549], 5);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    
    maxZoom: 18,
    id: 'mapbox/streets-v11',
}).addTo(map);


map.attributionControl.setPrefix(false);

var marker = new L.marker(curLocation, {
	draggable:'true'
});

marker.on('dragend', function(event) {
var position = marker.getLatLng();
marker.setLatLng(position,{
	draggable : 'true'
	}).bindPopup(position).update();
	$("#Latitude").val(position.lat);
	$("#Longitude").val(position.lng).keyup();
});

$("#Latitude, #Longitude").change(function(){
	var position =[parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
	marker.setLatLng(position, {
	draggable : 'true'
	}).bindPopup(position).update();
	map.panTo(position);
});
map.addLayer(marker);
</script>