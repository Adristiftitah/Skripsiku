
<?php 
    if($proposal == null){
    echo form_open_multipart('MahasiswaController/insproposal'); ?>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <input type="text" class="form-control" name="anggota1" placeholder="nama anggota 1">
                </div> 
                <div class="col-md-6 mb-4">
                    <input type="text" class="form-control" name="anggota2" placeholder="nama anggota 2">
                </div>  
                <div class="col-md-12 mb-4">
                    <input type="text" class="form-control" name="prodi" placeholder="prodi">
                </div>   
                <div class="col-md-12 mb-4">
                    <input type="text" class="form-control" name="tempat" placeholder="tempat pkl">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="">Tanggal Dimuluai</label>
                    <input type="date" class="form-control" name="durasi" value="<?= date('Y-m-d') ?>">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="">Tanggal Berakhir</label>
                    <input type="date" class="form-control" name="exp_durasi">
                </div>                               
                <div class="col-md-12 mb-4">
                    <input type="file" class="form-control" accept="application/pdf" name="file" required/>
                </div>
            </div>
                                             
        <input type="submit"  class="btn btn-primary btn-user" name="submit" value="Tambah Data" id="submit"/>
                   
        <button type="button" class="btn btn-danger btn-user" data-dismiss="modal">Batal</button>
                       
        <hr>
    </div>
                                        
<?php 
    echo form_close(); 
    } else {
?>

     <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Proposal Mahasiswa</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Prodi</th>
                                <th>Proposal</th>
                                <th>File Pengajuan</th>
                                <th>Upload Balasan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($proposal as $mhs){ ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $mhs->nim; ?></td>
                                <td><?php echo $mhs->nama; ?></td>
                                <td><?php echo $mhs->kelas; ?></td>
                                <td><?php echo $mhs->kodeprodi; ?></td>
                                <td><?php echo $mhs->file_pengajuan; ?></td>
                                <td><a href="<?= base_url('assets/balasan/'.$mhs->file_balasan) ?>"><?php echo $mhs->file_balasan; ?></a></td>
                                <td><?php echo $mhs->file_perusahaan; ?></td>
                            </tr>
                            <?php } ?> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
<?php } ?>