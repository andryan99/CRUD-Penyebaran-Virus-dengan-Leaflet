<?php if ($this->session->flashdata('pesan')){?>
    <div class="alert alert-info alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <?php echo $this->session->flashdata('pesan');?>
    
</div>
<?php 
}
?>
     
<table  class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead >
    <tr class="align-middle">
        <th rowspan="2" class="text-center align-middle">No</th>
        <th rowspan="2" class="text-center">Nama Wilayah</th>
        <th rowspan="2" class="text-center">Provinsi</th>
        <th rowspan="2" class="text-center">Kabupaten</th>
        <th rowspan="2" class="text-center">Kecamatan</th>
        <th rowspan="2" class="text-center">Nama Virus</th>

        <th  class="text-center" colspan="3">Jumlah</th>
        <th rowspan="2" class="text-center">Action</th>
    </tr>
    <tr>
        <th class="text-center">Korban</th>
        <th class="text-center">Meninggal</th>
        <th class="text-center">Sembuh</th>
        
     </tr>
     
     
    </thead>
    <tbody>
        
        <?php $no=1; foreach ($penyebaran as $pnb ) {?>
           <tr>
            <td class="text-center align-middle"><?= $no++?></td>
            <td class="text-center"><?= $pnb->nama_wilayah?></td>
            <td class="text-center"><?= $pnb->provinsi?></td>
            <td class="text-center"><?= $pnb->kabupaten?></td>
            <td class="text-center"><?= $pnb->kecamatan?></td>
            <td class="text-center"><?= $pnb->nama_virus?></td>
            <td class="text-center"><?= $pnb->jml_korban?></td>
            <td class="text-center"><?= $pnb->jml_meninggal?></td>
            <td class="text-center"><?= $pnb->jml_sembuh?></td>
            <td class="text-center">
               <a type="button" class="btn btn-primary" href="<?= base_url('home/edit/'.$pnb->id)?>"><i class="fa fa-edit text-white">  Edit</i></a>
                <a type="button" class="btn btn-danger" href="<?= base_url('home/delete/'.$pnb->id)?>"><i class="fa fa-pencil">  Hapus</i></a>

            </td>
        </tr>
        <?php }?>
        
    </tbody>
</table>
