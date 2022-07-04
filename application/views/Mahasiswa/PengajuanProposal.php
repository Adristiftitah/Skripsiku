
<?php 
    // if($proposal == null){
    echo form_open_multipart('MahasiswaController/insproposal'); ?>
        <div class="modal-body">
        <label for="">Informasi Mahasiswa</label>
            <div class="row">
                
                <div class="col-md-6 mb-4">
                
                    <input type="text" class="form-control" name="anggota1" placeholder="nama anggota 1" value="<?= $proposal [0] -> namaAng1 ?>">
                </div> 
                <div class="col-md-6 mb-4">
                    <input type="number" class="form-control" name="nim1" placeholder="nim anggota 1" min="1" value="<?= $proposal [0] -> nimAng1 ?>">
                </div>  
                <div class="col-md-6 mb-4">
                    <input type="text" class="form-control" name="anggota2" placeholder="nama anggota 2" value="<?= $proposal [0] -> namaAng2 ?>">
                </div> 
                <div class="col-md-6 mb-4">
                    <input type="number" class="form-control" name="nim2" placeholder="nim anggota 2" min="1" value="<?= $proposal [0] -> nimAng1 ?>">
                </div> 
                <div class="col-md-12 mb-4">
                    <input type="text" class="form-control" name="prodi" placeholder="prodi" value="<?= $proposal [0] -> prodi ?>">
                </div>   
                <div class="col-md-12 mb-4">
                    <input type="text" class="form-control" name="tempat" placeholder="tempat pkl" value="<?= $proposal [0] -> tempat ?>">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="">Tanggal Dimuluai</label>
                    <input type="date" class="form-control" name="durasi" value="<?= $proposal [0] -> tanggalMulai ?>">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="">Tanggal Berakhir</label>
                    <input type="date" class="form-control" name="exp_durasi" value="<?= $proposal [0] -> tanggalAkhir ?>">
                </div>                               
                <div class="col-md-12 mb-4">
                <?php if($proposal == null) {?>
                    <input type="file" class="form-control" accept="application/pdf" name="file" required/>
                    <?php }else{ ?>
                    <input type="text" class="form-control" value="<?= $proposal [0] -> file_pengajuan ?>">
                <?php } ?>
                </div>
                <?php if($proposal != null) {?>
                
                <div class="col-md-12 mb-4">
                <label for="">Informasi Pembimbing</label>
                <input type="text" class="form-control" name="tempat" placeholder="Nama Pembimbing" value="<?php foreach ($dosen as $d){
                                                if ($proposal[0]->id_pembimbing == $d->id_dosen){
                                                    echo $d->nama;
                                                }
                                                } ; ?>">
                </div>
                <div class="col-md-12 mb-4">
                <input type="text" class="form-control" name="tempat" placeholder="NIP Pembimbing" value="<?php foreach ($dosen as $d){
                                                if ($proposal[0]->id_pembimbing == $d->id_dosen){
                                                    echo $d->nip;
                                                }
                                                } ; ?>">
                </div>
                <div class="col-md-12 mb-4">
                <input type="text" class="form-control" name="tempat" placeholder="Nomor Pembimbing" value="<?php foreach ($dosen as $d){
                                                if ($proposal[0]->id_pembimbing == $d->id_dosen){
                                                    echo $d->nomortelpon;
                                                }
                                                } ; ?>">
                </div>
                <?php } ?>
            </div>
            
        <?php if($proposal == null) {?>
        <input type="submit"  class="btn btn-primary btn-user" name="submit" value="Tambah Data" id="submit"/>
                   
        <button type="button" class="btn btn-danger btn-user" data-dismiss="modal">Batal</button>
        <?php } ?>
        <hr>
    </div>
                                        
<?php 
    echo form_close(); 
    // } else {
?>

     
