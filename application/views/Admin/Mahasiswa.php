<!-- Begin Page Content -->
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
                                            <th>Pembimbing</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; foreach ($pengajuan as $mhs){ ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $mhs->nim; ?></td>
                                            <td><?php echo $mhs->nama; ?></td>
                                            <td><?php echo $mhs->kodeprodi; ?></td>
                                            <td><?php echo $mhs->kelas; ?></td>
                                            <td><a href="<?php echo base_url(); ?>index.php/GeneratePdf/index/<?php echo $mhs->user_id;?>"><?php echo $mhs->file_pengajuan; ?></a></td>
                                            <td><?php echo $mhs->file_balasan; ?></td>
                                            <td><?php foreach ($dosen as $d){
                                                if ($mhs->id_pembimbing == $d->id_dosen){
                                                    echo $d->nama;
                                                }
                                                } ; ?>
                                            </td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#uploadbalasan<?= $mhs->id_pengajuan ?>" class=" btn btn-info">Upload</a>
                                                <a href="#" data-toggle="modal" data-target="#uploadpembimbing<?= $mhs->id_pengajuan ?>" class=" btn btn-info">Tambah Pembimbing</a>
                                            </td>
                                        </tr>
                                        <?php } ?> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
 <!-- /.container-fluid -->
<?php foreach ($pengajuan as $mhs) { ?>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="uploadbalasan<?= $mhs->id_pengajuan ?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <!-- <h4 class="modal-title">Tambah Data</h4> -->
            </div>
            <?php echo form_open_multipart('DashboardAdmin/uploadBalasan'); ?>
            <div class="modal-body">

                <input type="hidden" name="idd" value="<?= $mhs->id_pengajuan ?>">
                <div class="form-group ">
                    <input type="file" class="form-control form-control-user" accept="application/pdf" name="file" required/>
                </div>

                <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="Upload" id="submit" />
                <button class="btn btn-warning btn-user btn-block" data-dismiss="modal"> Back </button>


                <hr>
            </div>

            <?php echo form_close(); ?>

        </div>
    </div>
</div>
<?php } ?>

<?php foreach ($pengajuan as $mhs) { ?>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="uploadpembimbing<?= $mhs->id_pengajuan ?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <!-- <h4 class="modal-title">Tambah Data</h4> -->
            </div>
            <?php echo form_open_multipart('DashboardAdmin/uploadPembimbing'); ?>
            <div class="modal-body">

            <input type="hidden" name="idd" value="<?= $mhs->id_pengajuan ?>">
            <div class="col-md-6 mb-4">
                <label>Dosen Pembimbing</label>
                <select class="form-control" name="dosen">
                    <?php foreach($dosen as $d): ?>
                        <option value="<?php echo $d->id_dosen ?>"><?php echo $d->nama ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="Upload" id="submit" />
            <button class="btn btn-warning btn-user btn-block" data-dismiss="modal"> Back </button>


            <hr>
            </div>

            <?php echo form_close(); ?>

        </div>
    </div>
</div>
<?php } ?>